<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Unit;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Purchase;
use App\Model\PurchaseInfo;
use App\Model\PurchasePayment;
use App\Model\PurchasePaymentDetail;
use Auth;
use DB;
use PDF;
use DateTime;

class PurchaseController extends Controller
{
    public function view()
    {
        $allData = PurchaseInfo::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
        return view('backend.purchase.view-purchase',compact('allData'));
    }

    public function add()
    {
        $data['suppliers']= Supplier::all();
        $data['units']= Unit::all();
        $data['categories']= Category::all();
        return view('backend.purchase.add-purchase',$data);
    }

    public function store(Request $request)
    {
       if ($request->category_id == null) {
           return redirect()->back()->with('error','Sorry ! you do not select any item');
       }else{
            if ($request->paid_amount>$request->estimated_amount) {
               return redirect()->back()->with('error','Sorry...! Paid amount is maximum than Grand Total price ');
            }else{
               $purchase_info = new PurchaseInfo();
               $purchase_info->purchase_no = $request->purchase_no;
               $purchase_info->date = date('Y-m-d',strtotime($request->date));
               $purchase_info->description = $request->description;
               $purchase_info->status = '0';
               $purchase_info->created_by = Auth::user()->id;

               $purchase_info->save();
               DB::transaction(function() use($request,$purchase_info){
                    if ($purchase_info->save()) {
                        $count_category = count($request->category_id);
           
                       for ($i = 0; $i < $count_category; $i++) {
                                $purchase = new Purchase();
                                $purchase->date = date('Y-m-d',strtotime($request->date));
                                $purchase->purchase_info_id = $purchase_info->id;
                                //$purchase->purchase_no = $request->purchase_no[$i];
                                //$purchase->supplier_id = $request->supplier_id[$i];
                                $purchase->category_id = $request->category_id[$i];
                                $purchase->product_id = $request->product_id[$i];
                                $purchase->buying_qty = $request->buying_qty[$i];
                                $purchase->unit_price = $request->unit_price[$i];
                                //$purchase->description = $request->description[$i];
                                $purchase->buying_price = $request->buying_price[$i];
                                $purchase->created_by = Auth::user()->id;
                                $purchase->status = '0';
                                $purchase->save();

                            }
                        $purchase_payment = new PurchasePayment();
                        $purchase_payment_details = new PurchasePaymentDetail();
                        $purchase_payment->purchase_info_id = $purchase_info->id;
                        $purchase_payment->supplier_id = $request->supplier_id;
                        $purchase_payment->paid_status = $request->paid_status;
                        $purchase_payment->total_amount = $request->estimated_amount;
                        if ($request->paid_status == 'full_paid') {
                            $purchase_payment->paid_amount = $request->estimated_amount;
                            $purchase_payment->due_amount = '0';
                            $purchase_payment_details->current_paid_amount = $request->estimated_amount;
                        }elseif($request->paid_status == 'full_due'){
                            $purchase_payment->paid_amount = '0';
                            $purchase_payment->due_amount = $request->estimated_amount;
                            $purchase_payment_details->current_paid_amount = '0';
                        }elseif($request->paid_status == 'partial_paid'){
                            $purchase_payment->paid_amount = $request->paid_amount;
                            $purchase_payment->due_amount = $request->estimated_amount-$request->paid_amount;
                            $purchase_payment_details->current_paid_amount = $request->paid_amount;
                        }
                        $purchase_payment->save();

                        $purchase_payment_details->purchase_info_id = $purchase_info->id;
                        $purchase_payment_details->date = date('Y-m-d',strtotime($request->date));
                        $purchase_payment_details->save();
                    }
               });
            }
                  
       }

       return redirect()->route('purchase.view')->with('success','Data saved successfully');
    }


    public function delete($id)
    {
        $purchase_info =PurchaseInfo::find($id);
        $purchase_info->delete();
        Purchase::where('purchase_info_id',$purchase_info->id)->delete();
        PurchasePayment::where('purchase_info_id',$purchase_info->id)->delete();
        PurchasePaymentDetail::where('purchase_info_id',$purchase_info->id)->delete();

        return redirect()->route('purchase.pending.list')->with('success','Delete data Successfully');
    }

    public function pendingList()
    {
        $allData = PurchaseInfo::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('backend.purchase.view-pending-list',compact('allData'));
    }

    public function approve($id)
    {
        //dd("ok");
        $purchase_info = PurchaseInfo::with(['purchase'])->find($id);
        return view('backend.purchase.purchase-approve',compact('purchase_info'));

        // $purchase = Purchase::where('purchase_info_id',$id)->first();
        // $product = Product::where('id',$purchase->product_id)->first();
        // //dd($product);
        // $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
        // $product->quantity = $purchase_qty;

        // if ($product->save()) {
        //     $purchase_info = PurchaseInfo::find($id);
        //     $purchase_info->status = '1';
        //     $purchase_info->approved_by = Auth::user()->id;
        //     $purchase_info->save();
        //     /*DB::table('purchase_infos')
        //             ->where('id',$id)
        //             ->update(['status'=> 1],['approved_by' => Auth::user()->id]);*/
        // }

        // return redirect()->route('purchase.pending.list')->with('success','Data Approved Successfully');
    }

    public function purchaseAprovalStore(Request $request,$id)
    {
        /*foreach($request->buying_qty as $key => $val)
        {
            $purchase = Purchase::where('id',$key)->first();
            $product = Product::where('id',$purchase->product_id)->first();
            if ($product->quantity < $request->selling_qty[$key]) {
                return redirect()->back()->with('error','Sorry...! You Approve maximum value');
            }
        }*/
        $purchase_info = PurchaseInfo::find($id);
        $purchase_info->approved_by = Auth::user()->id;
        $purchase_info->status = '1';
        DB::transaction(function() use($request,$purchase_info,$id){
            foreach($request->buying_qty as $key => $val)
            {
                $purchase = Purchase::where('id',$key)->first();
                $purchase->status = '1';
                $purchase->save();
                $product = Product::where('id',$purchase->product_id)->first();
                /*$product->quantity = ((float)$product->quantity)-((float)$request->buying_qty[$key]);*/
                $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
                $product->quantity = $purchase_qty;
                $product->save();
            }
            $purchase_info->save();
        });
        return redirect()->route('purchase.pending.list')->with('success','Invoice Successfully Approved');
    }

    public function printPurchaseList()
    {
        $allData = PurchaseInfo::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();
        return view('backend.purchase.print-purchase-list',compact('allData'));

        /*$allData = PurchaseInfo::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->first();
        
        $fdate =date('Y-m-d',strtotime($allData->date));

        $tdate =date("Y-m-d H:i:s");
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        dd($days);*/
    }

    function printPurchase($id) {
        $data['purchase_info'] = PurchaseInfo::with(['Purchase'])->find($id);
        $pdf = PDF::loadView('backend.pdf.purchase-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function purchaseReport()
    {
        return view ('backend.purchase.daily-purchase-report');
    }

    public function purchaseReportPdf(Request $request)
    {
        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        /*$data['allData'] = Purchase::whereBetween('date',[$sdate,$edate])->where('status','1')->orderBy('date','asc')->orderBy('supplier_id')->orderBy('category_id')->orderBy('product_id')->get();*/
        $data['allData'] = PurchaseInfo::whereBetween('date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] = date('Y-m-d',strtotime($request->start_date));
        $data['end_date'] = date('Y-m-d',strtotime($request->end_date));
        $pdf = PDF::loadView('backend.pdf.daily-purchase-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}

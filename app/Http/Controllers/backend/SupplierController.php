<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Product;
use App\Model\Category;
use App\Model\Purchase;
use App\Model\PurchaseInfo;
use App\Model\PurchasePayment;
use App\Model\PurchasePaymentDetail;
use Auth;
use DB;
use PDF;

class SupplierController extends Controller
{
    public function view()
    {
        $allData = Supplier::all();
        return view('backend.supplier.view-supplier',compact('allData'));
    }

    public function add()
    {
        return view('backend.supplier.add-supplier');
    }

    public function store(Request $request)
    {
        $supplier = new Supplier();

        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->address = $request->address;
        $supplier->created_by = Auth::user()->id;
        $supplier->save();

        return redirect()->route('suppliers.view')->with('success','Successfully Data Inserted');
    }

    public function edit($id)
    {
        $editData = Supplier::find($id);
        return view('backend.supplier.edit-supplier',compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $supplier =Supplier::find($id);

        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->address = $request->address;
        $supplier->updated_by = Auth::user()->id;
        $supplier->save();

        return redirect()->route('suppliers.view')->with('success','Update data Successfully');
    }

    public function delete($id)
    {
        $supplier =Supplier::find($id);
        $supplier->delete();

        return redirect()->route('suppliers.view')->with('success','Delete data Successfully');

    }

    public function creditSupplier()
    {
        $allData = PurchasePayment::whereIn('paid_status',['full_due','partial_paid'])->get();
        //dd($allData->toArray());
        return view('backend.supplier.supplier-credit',compact('allData'));
    }

    public function creditSupplierPdf()
    {
        $data['allData'] = PurchasePayment::whereIn('paid_status',['full_due','partial_paid'])->get();
        $pdf = PDF::loadView('backend.pdf.supplier-credit-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function editPurchase($purchase_info_id)
    {
        $purchase_payment = PurchasePayment::where('purchase_info_id',$purchase_info_id)->first();
        //dd($purchase_payment);
        return view('backend.supplier.edit-purchase',compact('purchase_payment'));
    }

    public function updatePurchase(Request $request, $purchase_info_id)
    {
        if ($request->new_paid_amount<$request->paid_amount) {
            return redirect()->back()->with('error','Sorry...! You have paid maximum value');
        }else{
            $purchase_payment = PurchasePayment::where('purchase_info_id',$purchase_info_id)->first();
            $purchase_payment_details = new PurchasePaymentDetail();
            $purchase_payment->paid_status = $request->paid_status;
            if ($request->paid_status=='full_paid') {
                $purchase_payment->paid_amount = PurchasePayment::where('purchase_info_id',$purchase_info_id)->first()['paid_amount']+$request->new_paid_amount;
                $purchase_payment->due_amount = '0';
                $purchase_payment_details->current_paid_amount = $request->new_paid_amount;
            }elseif($request->paid_status=='partial_paid'){
                $purchase_payment->paid_amount = PurchasePayment::where('purchase_info_id',$purchase_info_id)->first()['paid_amount']+$request->paid_amount;
                $purchase_payment->due_amount = PurchasePayment::where('purchase_info_id',$purchase_info_id)->first()['due_amount']-$request->paid_amount;
                $purchase_payment_details->current_paid_amount = $request->paid_amount;
            }
            $purchase_payment->save();
            $purchase_payment_details->purchase_info_id = $purchase_info_id;
            $purchase_payment_details->date = date('Y-m-d',strtotime($request->date));
            $purchase_payment_details->updated_by = Auth::user()->id;
            $purchase_payment_details->save();

            return redirect()->route('suppliers.credit')->with('success','Purchase Successfully Updated');
        }

        /*return redirect()->route('suppliers.credit')->with('success','Invoice Successfully Updated');*/
    }

    public function purchaseDetailsPdf($purchase_info_id)
    {
        $data['purchase_payment'] = PurchasePayment::where('purchase_info_id',$purchase_info_id)->first();
        $pdf = PDF::loadView('backend.pdf.purchase-details-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function paidSupplier()
    {
        $allData = PurchasePayment::where('paid_status','!=','full_due')->get();
        //dd($allData->toArray());
        return view('backend.supplier.supplier-paid',compact('allData'));
    }

    public function paidSupplierPdf()
    {
        $data['allData'] = PurchasePayment::where('paid_status','!=','full_due')->get();
        $pdf = PDF::loadView('backend.pdf.supplier-paid-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function supplierWiseReport()
    {
        $suppliers = Supplier::all();
        return view('backend.supplier.supplier-wise-report',compact('suppliers'));
    }

    public function supplierWiseCredit(Request $request)
    {
        $data['allData'] = PurchasePayment::where('supplier_id',$request->supplier_id)->whereIn('paid_status',['full_due','partial_paid'])->get();
        $pdf = PDF::loadView('backend.pdf.supplier-wise-credit-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function supplierWisePaid(Request $request)
    {
        $data['allData'] = PurchasePayment::where('supplier_id',$request->supplier_id)->where('paid_status','!=','full_due')->get();
        $pdf = PDF::loadView('backend.pdf.supplier-wise-paid-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function supplierWiseBoth(Request $request)
    {
        $data['allData'] = PurchasePayment::where('supplier_id',$request->supplier_id)->get();
        $pdf = PDF::loadView('backend.pdf.supplier-wise-both-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}

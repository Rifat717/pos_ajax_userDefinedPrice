<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Unit;
use App\Model\Supplier;
use App\Model\Category;
use Auth;

class ProductController extends Controller
{
    public function view()
    {
        $allData = Product::all();
        return view('backend.product.view-product',compact('allData'));
    }

    public function add()
    {
        $data['suppliers']= Supplier::all();
        $data['units']= Unit::all();
        $data['categories']= Category::all();
        return view('backend.product.add-product',$data);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->quantity='0';
        $product->created_by = Auth::user()->id;
        $product->save();

        return redirect()->route('products.view')->with('success','Successfully Data Inserted');
    }

    public function edit($id)
    {
        $editData = Product::find($id);
        $suppliers= Supplier::all();
        $units= Unit::all();
        $categories= Category::all();
        return view('backend.product.edit-product',compact('editData','suppliers','units','categories'));
    }

    public function update(Request $request, $id)
    {
        $product =Product::find($id);
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->updated_by = Auth::user()->id;
        $product->save();

        return redirect()->route('products.view')->with('success','Update data Successfully');
    }

    public function delete($id)
    {
        $product =Product::find($id);
        $product->delete();

        return redirect()->route('products.view')->with('success','Delete data Successfully');
    }
}

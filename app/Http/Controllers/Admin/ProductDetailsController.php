<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProductDetails;

class ProductDetailsController extends Controller
{
    public function index()
    {
        $product_details = ProductDetails::latest()->get();
        return view('admin.productDetails.index', compact('product_details'));
    }
    public function create()
    {
        return view('admin.productDetails.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request,[
            'color' => 'required',
            'size' => 'required'
        ]);

        $product_details = new ProductDetails;
        $product_details->color = $request->color;
        $product_details->size = $request->size;

        if ($product_details->save()) {
          return back()->with('success', 'Product deatils successfully saved.');
        }else{
            return back()->with('error', 'Somthing Error Found, Please try again.');
        }
    }

    public function delete($id)
    {
        $product_detail = ProductDetails::findOrFail($id);

        if ($product_detail) {
           $product_detail->delete();
           return back()->with('success','Product details successfully deleted.');
        }else{
            return back()->with('error','Somthing Error Found, Please try again.');
        }
    }
}

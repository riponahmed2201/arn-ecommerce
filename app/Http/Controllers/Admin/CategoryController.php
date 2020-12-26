<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::all();
        // dd($categories);

        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        return view('admin.category.form');
    }

    public function store(Request $request){

        // dd($request->all());

        $this->validate($request,[
            'category_name' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        $categories = new Category;

        $date = Carbon::now()->format("his")+rand(1000,9999);

        if ($image = $request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = $date.'.'.$extension;
            $path = public_path('uploads/category');
            $image->move($path, $imageName);

            $categories->image = $imageName;
        }
        else{
            $categories->image = "Null";
        }

        $categories->category_name = $request->category_name;
        $categories->status = $request->status;

        if ($categories->save()) {
           return back()->with('success','Category information successfully saved.');
        }
        else{
            return back()->with('error','Somthing Error Found, Please try again.');
        }
    }
}

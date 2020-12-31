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

    public function edit($id){
        $category = Category::findOrFail($id);
         return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category_name' => 'required',
            'status' => 'required',
        ]);

        $categories = Category::findOrFail($id);

        $date = Carbon::now()->format("his")+rand(1000,9999);

        if ($image = $request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = $date.'.'.$extension;
            $path = public_path('uploads/category');
            $image->move($path, $imageName);

           if(file_exists('uploads/category/'.$categories->image) AND !empty($categories->image)){
                unlink('uploads/category/'.$categories->image);
            }

            $categories->image = $imageName;
        }
        else{
            $categories->image = $categories->image;
        }

        $categories->category_name = $request->category_name;
        $categories->status = $request->status;

        if ($categories->save()) {
           return redirect('category/index')->with('success','Category information successfully updated.');
        }
        else{
            return back()->with('error','Somthing Error Found, Please try again.');
        }
    }

    public function delete($id)
    {
        // $categories = Category::where('id',$id);
        // $categories = Category::find($id);
        // $categories = DB::table('categories')->findOrFail($id);
         $category = Category::findOrFail($id);
            if($category){
                if(file_exists('uploads/category/'.$category->image) AND !empty($category->image)){
                    unlink('uploads/category/'.$category->image);
                }
                $category->delete();
                return redirect()->back()->with('success','Category information successfully deleted.');
            }else{
                return redirect()->back()->with('error','Something Error Found !, Please try again.');
            }
    }
}

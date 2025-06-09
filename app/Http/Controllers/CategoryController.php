<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function admincategory()  {
        $category = Category::all();
        return view('admin.pages.category',compact('category'));
    }
    public function categoryform()  {
        return view('admin.pages.addcategory');
    }

    public function addcategory(CategoryRequest $request){

        $img_name = time().'.'.$request->cat_image->extension();
        $request->cat_image->move(public_path('myimages'), $img_name);

        $catagory = new Category;
        $catagory-> cat_name = $request['cat_name'];
        $catagory-> cat_image = $img_name;
        $catagory-> cat_description = $request['cat_description'];
        $catagory->save();
        return back();
    }

    public function editcategory($id){
        $category = Category::where('cat_id',$id)->first();
        return view('admin.pages.editcategory',compact('category'));
    }
    public function updatecat($id,Request $request){
         $request->validate([

        'cat_name' => 'required|string|max:255',
        'cat_description' => 'required|string|max:1000',
        'cat_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Max 2MB
        ]);

        $catagory = Category::where('cat_id',$id)->first();

        if(isset($request->cat_image)){
          $img_name = time().'.'.$request->cat_image->extension();
          $request->cat_image->move(public_path('myimages'), $img_name);
          $catagory-> cat_image = $img_name;
        }
        $catagory-> cat_name = $request['cat_name'];
        $catagory-> cat_description = $request['cat_description'];
        $catagory->save();
        return redirect('admin/category');
    }

    public function deletecategory($id){
        Category::find($id)->delete();
        return back();
    }
}

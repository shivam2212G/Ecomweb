<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function adminproduct(){

        $products = DB::table('product')->join('category','product.cat_id','=','category.cat_id')->get();
        return view('admin.pages.product',compact('products'));
    }
    public function productform(){

        $category = Category::all();
        return view('admin.pages.addproduct',compact('category'));
    }
    public function addproduct(ProductRequest $request){

        $img_name = time().'.'.$request->pro_image->extension();
        $request->pro_image->move(public_path('myimages'), $img_name);
        $product = new Product;
        $product-> product_name = $request['pro_name'];
        $product-> product_price = $request['pro_price'];
        $product-> product_image = $img_name;
        $product-> cat_id = $request['pro_category'];
        $product-> product_description = $request['pro_description'];
        $product->save();
        return back();

    }
    public function editproduct($id){
        $product = Product::where('product_id',$id)->first();
        $category = Category::all();
        return view('admin.pages.editproduct',compact('product','category'));
    }

    public function updateproduct($id,Request $request){

         $request->validate([
        'pro_name' => 'required|string|max:255',
        'pro_price' => 'required|numeric|min:0',
        'pro_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'pro_description' => 'required|string|max:1000',
        ]);

        $product = Product::where('product_id',$id)->first();
        if(isset($request->pro_image)){
            $img_name = time().'.'.$request->pro_image->extension();
            $request->pro_image->move(public_path('myimages'), $img_name);
            $product-> product_image = $img_name;
        }
        $product-> product_name = $request['pro_name'];
        $product-> product_price = $request['pro_price'];
        $product-> cat_id = $request['pro_category'];
        $product-> product_description = $request['pro_description'];
        $product->save();
        return redirect('/admin/product');

    }
    public function deleteproduct($id){
        Product::find($id)->delete();
        return back();
    }
}

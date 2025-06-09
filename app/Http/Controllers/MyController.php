<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{

    public function index(){
        $search ="";
        $category = Category::all();
        $catcount = Category::count();
        $products = DB::table('product')->join('category','product.cat_id','=','category.cat_id')->orderBy('product.created_at', 'desc')->take(8)->get();
        return view('user.pages.index',compact('category','search','products','catcount'));
    }
    public function adminindex(){
        return view('admin.pages.dashboard');
    }

    public function allproducts(){
        $search = "";
         $products = DB::table('product')
        ->join('category','product.cat_id','=','category.cat_id')->get();
        return view('user.pages.shop',compact('products','search'));
    }
    public function productbycat($id){

        $search = '';
        $products = DB::table('product')
        ->join('category','product.cat_id','=','category.cat_id')
        ->where('category.cat_id', '=', "$id")->get();

        return view('user.pages.shop',compact('products','search'));
    }

    public function productsearch(Request $request){
         $search = $request['search'] ?? "";
        if($search!=""){

        $products = DB::table('product')
        ->join('category','product.cat_id','=','category.cat_id')
        ->where('product.product_name', 'LIKE', "%{$search}%")->
        orWhere('category.cat_name','LIKE',"%{$search}%")->get();

        }
        else{
            $products = DB::table('product')->join('category','product.cat_id','=','category.cat_id')->get();
        }

        return view('user.pages.shop',compact('products','search'));
    }

    public function adminusers(){
        $users = User::all();
        return view('admin.pages.users',compact('users'));
    }

    public function productview($id){

        $product = Product::where('product_id',$id)->first();
        // return $product;
          return view('user.pages.productview',compact('product'));
    }

}

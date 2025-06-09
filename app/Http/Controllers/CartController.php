<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addtocart($product_id,$user_id){

        $cartarray = Product::where('product_id',$product_id)->first();
        $alredyincart = Cart::where('product_id', $cartarray->product_id)->exists();

        if ($alredyincart) {
            return back();
        }
        else{
        $cart = new Cart;
        $cart -> product_id = $product_id;
        $cart -> id = $user_id;
        $cart -> save();
        return back();
        }
    }
    public function deletecart($id){
        Cart::find($id)->delete();
        return back();
    }
    public function usercart(){
        $carts = DB::table('cart')
        ->join('product','cart.product_id','=','product.product_id')
        ->join('users','cart.id','=','users.id')->get();
        // return $carts;
        return view( 'user.pages.cart',compact('carts'));
    }
}

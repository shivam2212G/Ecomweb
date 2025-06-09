<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function addtowishlist($product_id,$user_id){

        $wisharray = Product::where('product_id',$product_id)->first();
        $alredyinwish = Wishlist::where('product_id', $wisharray->product_id)->exists();

        if ($alredyinwish) {
            return back();
        }
        else{
        $wish = new Wishlist;
        $wish -> product_id = $product_id;
        $wish -> id = $user_id;
        $wish -> save();
        return back();
        }
    }
    public function userwish(){
        $wishlists = DB::table('wishlist')
        ->join('product','wishlist.product_id','=','product.product_id')
        ->join('users','wishlist.id','=','users.id')->get();
        // return $wishlists;
        return view( 'user.pages.wishlist',compact('wishlists'));
    }
    public function deletewish($id){
        Wishlist::find($id)->delete();
        return back();
    }
}

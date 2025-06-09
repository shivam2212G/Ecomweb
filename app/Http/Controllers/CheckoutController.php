<?php

namespace App\Http\Controllers;

use App\Models\Cochild;
use App\Models\Comaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function usercheckout(Request $request){

    $cartSubtotal = $request->input('cart_subtotal');
    $cartTotal = $request->input('cart_total');
    $cartData = json_decode($request->input('cart_data'),true);

    return view('user.pages.checkout', compact('cartSubtotal', 'cartTotal', 'cartData'));
    }

    public function savebill(Request $request){
        $comaster = new Comaster();
        $comaster->fname=$request['fname'];
        $comaster->lname=$request['lname'];
        $comaster->email=$request['email'];
        $comaster->mono=$request['mono'];
        $comaster->addl1=$request['addl1'];
        $comaster->addl2=$request['addl2'];
        $comaster->country=$request['country'];
        $comaster->city=$request['city'];
        $comaster->state=$request['state'];
        $comaster->zipcode=$request['zipcode'];
        $comaster->total=$request['total'];
        $comaster->u_id=$request['u_id'];
        $comaster->save();

        $cochild = new Cochild();
        $cochild->bill_id = $comaster->bill_id;
        $cochild->cart_data = $request['cart_data'];
        $cochild->save();
        $userdata = Comaster::where('u_id',$comaster->u_id)->get();
        return view('user.pages.userhistory',compact('userdata'));
    }

    public function checkouthistory($u_id){
        $userdata = Comaster::where('u_id',$u_id)->get();
        return view('user.pages.userhistory',compact('userdata'));
    }

    public function adminbills(){
        $bills = Comaster::all();
        return view('admin.pages.bills',compact('bills'));
    }

    public function adminbilldetails($bill_id){
        $detail = DB::table('comaster')->join('cochild','comaster.bill_id','=','cochild.bill_id')
        ->where('cochild.bill_id',$bill_id)->get();
        return view('admin.pages.billdetails',compact('detail'));
    }

    public function billbyuser($id){
        $userdata = Comaster::where('u_id',$id)->get();
        // return $userdata;
        return view('admin.pages.userbill',compact('userdata'));
    }

    public function printBill($bill_id)
    {
        $bill = Cochild::where('bill_id', $bill_id)->firstOrFail();
        $cartItems = json_decode($bill->cart_data);

        return view('admin.pages.print', compact('bill', 'cartItems'));
    }



}

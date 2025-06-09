<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $search ="";
        $category = Category::all();
        $catcount = Category::count();
        $products = DB::table('product')->join('category','product.cat_id','=','category.cat_id')->orderBy('product.created_at', 'desc')->take(8)->get();
        return view('user.pages.index',compact('category','search','products','catcount'));
    }
}

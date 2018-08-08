<?php

namespace App\Http\Controllers\frontend;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }
    public function allProduct()
    {
      //  $products = Product::all();
        $products = DB::table('products')->join('products_description', 'products_description.products_id', '=', 'products.products_id')
            ->join('products_attributes', 'products_attributes.products_id', '=', 'products.products_id')
            ->select('products.*', 'products_description.*', 'products_attributes.*')
            ->take(5)
            ->get();

       // dd($products);
        return view('frontend.home',compact('products'));
    }
}

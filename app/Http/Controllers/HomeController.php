<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order_product;
use App\Models\products;

use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function __construct(){
        $router = Route::currentRouteName();
        $arr = explode('.',$router);
        $arr = array_map('ucfirst',$arr);
        $title = implode(' - ',$arr);
        View::share('title', $title);
    }
    public function index(){
        $product  = order_product::select(order_product::raw('id_product'))
       
        ->groupBy('id_product')
        
        ->orderby('total_amount','desc')
        
        ->get();
        $product_offer  = order_product::select(order_product::raw('id_product'))
        ->groupBy('id_product')
        ->orderby('total_amount','desc')
        ->limit(3)
        ->get();
        $product_offer1  = order_product::select(order_product::raw('id_product'))
        ->groupBy('id_product')
        ->orderby('total_amount','desc')
        ->offset(3)
        ->limit(1)
        ->get();
        $product_offer2  = order_product::select(order_product::raw('id_product'))
        ->groupBy('id_product')
        ->orderby('total_amount','desc')
        ->offset(4)
        ->limit(1)
        ->get();
        $product_new = products::where('level',0)
        ->where('amount','>',0)
      
        ->orderby('created_at','desc')
       
 
        ->get();
    
        $product_sale = products::select(order_product::raw('*'))
        
        ->orderby('level','desc')
        ->offset(1)
        ->limit(2)
        ->get();
      
    
        $product_week = products::select(order_product::raw('*'))
     
        ->orderby('level','desc')
      
        ->limit(1)
        ->get();
        $product_newest = products::where('level',0)
        ->where('amount','>',0)
        ->orderby('created_at','desc')
        ->limit(1)
        ->get();
       
        return view('layout/home/index',['product'=> $product,'prof'=> $product_offer ,'prof1'=> $product_offer1,'prof2'=> $product_offer2,'pros'=> $product_sale,'pron'=>$product_new,'pronew'=>$product_newest,'prow'=>$product_week]);
    }
        
    
}

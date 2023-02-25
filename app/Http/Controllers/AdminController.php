<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Route;
use App\Models\products;
use App\Models\order_product;

use App\Models\contacts;
use App\Models\City as cities;
use App\Models\District as districts;
use App\Models\Ward as wards;
use App\Models\orders;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;







class AdminController extends Controller
{
         /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $router = Route::currentRouteName();
        $arr = explode('.',$router);
        $arr = array_map('ucfirst',$arr);
        $title = implode(' - ',$arr);
        View::share('title', $title);
    }
    public function showformcreate ()
    {
        return view('layout.admin.add');
    }
    public function storeformcreate(request $request){
    //     dd($alldata = $request->all());
       
    //     $target_dir = "uploads/";
    //     $product = new products();
    //     $product->slug=$alldata['slug'];
    //     $product->name=$alldata['name'];
    //     $product->price=$alldata['price'];
    //     $product->amount=$alldata['amount'];
    //     $product->save();
    //     $target_file = $target_dir . $imagefile;
     
    //     $uploadOk = 1;
    //     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //     if(isset($_POST["submit"])) {
    //      $check = getimagesize($_FILES["image"]["tmp_name"]);
    //      if($check !== false) {
    //        echo "File is an image - " . $check["mime"] . ".";
    //        $uploadOk = 1;
    //      } else {
           
    //        $uploadOk = 0;
    //      }
    //    }
    //    if (file_exists($target_file)) {
         
    //      $uploadOk = 0;
    //    }
    //    if ($_FILES["image"]["size"] > 1000000000) {
        
    //      $uploadOk = 0;
    //    }
       
    //    // Allow certain file formats
    //    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    //    && $imageFileType != "gif" ) {
        
    //      $uploadOk = 0;
    //    }
       
    //    // Check if $uploadOk is set to 0 by an error
    //    if ($uploadOk == 0) {
         
    //    // if everything is ok, try to upload file
    //    } else {
    //      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    //        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    //      } else {
    //        echo "Sorry, there was an error uploading your file.";
    //      }
    //  }
    //  $product->image=$target_file;
    //    $product->save();

    //    return redirect()->intended('/')->with('success','You have no permission for this page!');
       

    }
    public function admin(){
        $product = products::get();
        $user = User::paginate(8);
        $order = order_product::select(order_product::raw('id_order, sum(total_price) as price ,sum(total_amount) as amount,max(created_at) as date,count(id_order),Max(Status) as status'))
        ->groupBy('id_order')
        ->orderBy('id_order','desc')->paginate(8);
        $total_user = User::select(User::raw('id , count(id) as total_user'))
        ->groupBy('id')->get();
    $new_sale = products::select(products::raw('id, count(id) as sale'))
    ->where('level','>',0)
      ->groupBy('id')->get();
    $total = 0;
    foreach($new_sale as $sale){
      $total+=($sale->sale);
    }
    $pending = order_product::select(order_product::raw('id_order'))
      ->where('Status','pending')
      ->groupBy('id_order')->get();
    $total_pending = 0;
    foreach($pending as $pen){
      $total_pending ++;
    }
   

  
   

        return view('layout.admin.admin',compact('product','user','order','total_user','total','total_pending'));

    }
    public function showformedit(request $request){
    $alldata=$request->all();
    $id =  $alldata['id'];
    $data = products::find($id);
    return view('layout.admin.edit',compact('data'));

    }
    public function storeformedit(request $request){ 
   
   if($request->formValues[0]==""){
    return response()->json([
      'status' => 400,
   ]);
   }
   if($request->formValues[1]==""){
    return response()->json([
      'status' => 400,
   ]);
   }
   if($request->formValues[2]==""){
    return response()->json([
      'status' => 400,
   ]);
   }
   if($request->formValues[3]==""){
    return response()->json([
      'status' => 400,
   ]);
   }
       
  else{
      
     
      $id = $request->id;
     

     $name = $request->formValues[0];
     $price = $request->formValues[1];
     $amount = $request->formValues[2];
     $level = $request->formValues[3];  
     $slug = Str::of($name)->slug('-');
     $sql = products::where('id',$id)->update(['name'=> $name,'price'=>$price,'amount'=> $amount,'level'=>$level,'slug'=>$slug]);
     $product = products::all();
     $item= view('layout.admin.admin_product',compact('product'))->render();
     return response()->json([
           'status' => 200,
           'total' => $item,
        ]);

  
  }
}
    public function processPage(Request $request){
      $_GET['page'] = $_GET['page'] ?? 1;
      $page = $_GET['page'];
      
      $paginate = User::count();
      $one_page = 5;
      $number = ceil($paginate/$one_page);
      switch ($page) {
          case $page > $number:
              $page = $number;
              break;
          case $page < 1:
              $page = 1;
              break;
      }
      $skip = $one_page * ($page - 1);
      $user = User::skip($skip)->take($one_page)->get();

      // if($page == ){
      //     $products = product::orderBy('id', 'desc')->take(5)->get();
      //     return view('admin/product',[
      //         'products' => $products,
      //         'number' => $number,
      //     ]);
      // }
      // $products = product::orderBy('id', 'desc')->skip(5)->take(5)->get();
      return view('layout.admin.admin',compact('user','number','paginate'));
    }
    public function adminProduct (Request $request){

      $product = products::get();
      $productpag = products::paginate(4);
    $product_top = DB::table('order_product')
      ->join('products', 'products.id', '=', 'id_product')
      ->select(DB::raw('products.id,max(image)  as image,max(name)as name,max(price) as price ,max(amount) as amount,sum(order_product.total_amount) as sumamount'))
      ->groupBy('products.id')
      ->orderByDesc('sumamount')
      ->get();

     
   


      return view('layout.admin.admin-product',compact('product','productpag','product_top'));
    }
     public function addToStock(request $request){

    dd($request->all());
     

    //   $name=$request->name;
    //   $target_dir = "uploads/";
      
     
    
    //   $slug = Str::of($name)->slug('-');




      
        
       
    //     $product = new products();
    //     $product->slug=$slug;
    //     $product->name=$request->name;
    //     $product->price= $request->price;
    //     $product->amount= $request->amount;
    //     $product->level= $request->sale;
    //     $product->image = $request->image;
    //     $product->save();
    //     if($request->has('image')){
    //     $input = $request->all();
    //     $input['image'] = time().'.'.$request->image->extension();
    //     $request->image->move(public_path('uploads'), $input['image']);


    //     AjaxImage::create($input);
    //     }
    //     $product->save();
    //    //$product->image=$target_file;
      
    //    $total_product = products::all();
    //    $item= view('layout.admin.productAddToStock',compact('total_product'))->render();
    //    return response()->json([
    //        'total' => $item,
    //     ]);
    
  }
  public function pendingDeny(request $request){
   $id=$request->id;
   $order = order_product::where('id_order',$id)
   ->update(['Status' => 'deny']);
   return response()->json([
     'status' => 200,
   ]);

  }
  public function image (request $request){
   dd($request->all());
  }
  public function imageupload(){
      echo('hi');
     }
  public function im(request $request){
  $name = $request->name;
 
  $price = $request->price;
  $capacity = $request->level;
 
  $slug = Str::of($name)->slug('-');


  
  
 
  $imagefile = basename($_FILES["image"]["name"]);
  $target_dir = "uploads/";

  $room = new products();
  $room->slug=$slug;
  $room->name=$name;
  $room->price=$price;
  $room->level=$capacity;
  $room->amount=$request->amount;
  $room->save();
  $target_file = $target_dir . $imagefile;

  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if(isset($_POST["submit"])) {
   $check = getimagesize($_FILES["image"]["tmp_name"]);
   if($check !== false) {
     echo "File is an image - " . $check["mime"] . ".";
     $uploadOk = 1;
   } else {
     $uploadOk = 0;
   }
 }
 if (file_exists($target_file)) {
   
   $uploadOk = 0;
 }
 if ($_FILES["image"]["size"] > 1000000000) {
  
   $uploadOk = 0;
 }
 
 // Allow certain file formats
 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" ) {
  
   $uploadOk = 0;
 }
 
 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
   
 // if everything is ok, try to upload file
 } else {
   if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
     echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
   } else {
     echo "Sorry, there was an error uploading your file.";
   }
}
$room->image=$target_file;
 $room->save();

 return redirect()->back()->with('success','You was logined success!');
}
 


  public function immme(){

  }
  public function admindelete( request $request){
    $id=$request->id;
    $deleted = products::where('id',$id)->delete();
    $product = products::getproduct();
      
    $html= view('layout.admin.admin_product_tabel',compact('product'))->render();
    $product_paginate = view('layout.admin.admin_product_paginate',compact('product'))->render();
    return response()->json([
             'total' => $html,
             'product_paginate' => $product_paginate,
          ]);
    
  }
  public function postimage(request $request){
 $name = $request->name;
  $price = $request->price;
  $capacity = $request->level;
  $typeroom = $request->typeroom;
  $type=((int)$typeroom);
  $image = $request->image;
  $slug = Str::of($name)->slug('-');


  
  
 
  $imagefile = basename($_FILES["image"]["name"]);
  $target_dir = "uploads/";

  $room = new products();
  $room->slug=$slug;
  $room->name=$name;
  $room->price=$price;
  $room->level=$capacity;

  $room->amount=$request->amount;
  $room->save();
  $target_file = $target_dir . $imagefile;

  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if(isset($_POST["submit"])) {
   $check = getimagesize($_FILES["image"]["tmp_name"]);
   if($check !== false) {
     echo "File is an image - " . $check["mime"] . ".";
     $uploadOk = 1;
   } else {
     
     $uploadOk = 0;
   }
 }
 if (file_exists($target_file)) {
   
   $uploadOk = 0;
 }
 if ($_FILES["image"]["size"] > 1000000000) {
  
   $uploadOk = 0;
 }
 
 // Allow certain file formats
 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" ) {
  
   $uploadOk = 0;
 }
 
 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
   
 // if everything is ok, try to upload file
 } else {
   if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
     echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
   } else {
     echo "Sorry, there was an error uploading your file.";
   }
}
$room->image=$target_file;
 $room->save();

 return redirect()->back()->with('success','You was logined success!');
        }
        public function fetch_data1 (request $request){
        $product = products::getproduct();
        $product_table= view('layout.admin.admin_product_tabel',compact('product'))->render();
        $product_paginate = view('layout.admin.admin_product_paginate',compact('product'))->render();
        $order_page = order_product::getorder();
        $order = order_product::getorder();
        $order_paginate = view('layout.admin.admin_order_paginate',compact('order_page'))->render();
        $order1 = view('layout.admin.admin_order',compact('order'))->render();




        return response()->json([
          'product_table' => $product_table,
          'product_paginate' => $product_paginate,
          'order' => $order1,
          'order_paginate' => $order_paginate,
          
        ]);
        }
        public function fetch_data2(request $request){
         $user = user::getUser();
         $user_list = view('layout.admin.user-list',compact('user'))->render();
         $user_paginate = view('layout.admin.user-paginate',compact('user'))->render();
         return response()->json([
          'user_list' => $user_list,
          'user_paginate' =>$user_paginate,
         ]);

        }
        public function fetch_detail (Request $request){
        $id = $request->id;
        $product = products::getProductDetail($id);
        $product_detail_html = view('layout.product.product_detail_paginate',compact('product'))->render();
    $product_detail_paginate_html = view('layout.product.productdetail_paginate', compact('product'))->render();
    return response()->json([
      'product_detail_html'  =>  $product_detail_html,
      'product_detail_paginate_html' => $product_detail_paginate_html,

    ]);

      }
  public function adminsearch(request $request){
   $name=$request->value;
   $product = products::where('name', 'like','%'.$name.'%')->get();
   $html = view('layout.admin.admin_product_tabel',compact('product'))->render();
  
   return  response()->json([
    'product_table' => $html,
 
   ]);

  }
  public function invoice (request $request){
    $id=$request->id;
    $invoice = order_product::where('id_order',$id)->get();
    $html = view('layout.admin.invoice',compact('invoice'))->render();
    return response()->json([
      'invoice'=> $html,

    ]);
  }
  public function pendingApprove (request $request){
  $id = $request->id;
  $invoice = order_product::select(order_product::raw('id_product'))
  ->where('id_order',$id)->get();
  $sql1 = order_product::where('id_order',$id)->
  update(['Status'=> 'approval']);
  foreach($invoice as $in => $each){
    $id_product = $each->product->id;
    $total_amount = order_product::select(order_product::raw('total_amount'))
    ->where('id_product',$id_product)->get();
    foreach($total_amount as $total ){
     $amount = $total->total_amount;
     $new_amount =  $each->product->amount - $amount;
     $sql = products::where('id',$id_product)
     ->update(['amount'=> $new_amount]);

    }

  }
  return response()->json([
    'status' => 200,
  ]);
    
}
public  function deleteOrder(request $request){
  $id = $request->id;
  $delete = order_product::where('id_order', '=', $id)->delete();
  return request()->json([
    'status' => 200,
  ]);

  

}
public function orderFilter(Request $request){
    $value = $request->value;
    $order = order_product::select(order_product::raw('id_order, sum(total_price) as price ,sum(total_amount) as amount,max(created_at) as date,count(id_order),Max(Status) as status'))
      ->where('Status',$value)
      ->groupBy('id_order')
      ->orderBy('id_order', 'desc')->get();
    $html = view('layout.admin.admin-order-filter', compact('order'))->render();

    return response()->json([
      'html' => $html,

    ]
    );

}
}


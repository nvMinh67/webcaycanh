<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\order_product;
use App\Models\products;
use App\Models\contacts;
use App\Models\City as cities;
use App\Models\District as districts;
use App\Models\Ward as wards;
use App\Models\orders;
use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Cart;

class ProductController extends Controller
{
    public function __construct(){
        $router = Route::currentRouteName();
        $arr = explode('.',$router);
        $arr = array_map('ucfirst',$arr);
        $title = implode(' - ',$arr);
        View::share('title', $title);
    }
    public function success (){
        return view('layout.cart.success');
    }
    public function detail  ( request $request){
        $id_product = $request->i; 
        $pro = products::find($id_product);
        $id_product = $request->i; 
        $product = products::where('id','!=',$id_product)->paginate(4);

        return view('layout.product.add-product',compact('pro','product'));
    }
    public function product ( ){
        $product = products::paginate(4);

        return view('layout.product.product-list',['product'=>$product]);
    }
    public function addtocartH (request $request){
        $alldata = $request->all(); 
        $pro_name = ($alldata['name']);
        $id = products::select('*')
        ->where('name', '=', $pro_name)
        ->get();
        foreach($id as $i){
            $id_p = $i;
        }

        
        $id_product = $id_p['id'];
        $name_product = $id_p['name'];
       
       
        $price_product = $id_p['price'];
        $level_product = $id_p['level'];
        
        $image_product = $id_p['image'];
        $data['id'] = $id_product;
        $data['name'] =  $pro_name;
        $data['qty'] = 1;
        $data['price'] =  $price_product;
        $data['options']['image'] =  $image_product;
        $data['weight'] =  $level_product;
        Cart::add($data);
        return redirect('/');
        // return view('layout.product.shopping') ;
    
      

    }
    public function addajax (request $request){
      
        $data1 = $request->all();
        $status =0;
        $id = $data1['cart_product_id'];
        $product = products::find($id);
        $quantity = $product->amount;
        $t1 = 0;
        $carts= Cart::content();
        foreach ($carts as $car) {
            if($car->id == $id)
              $t1 = $car->qty;
        }
        
       
        $num_quantity = (int) $data1['cart_product_qty'];
        $total_quantity = $t1 + $num_quantity;



        if ($total_quantity <= $quantity) {
            $carts = Cart::content();
            $total_item = 0;
            foreach ($carts as $cart) {

                $total_item += $cart->qty;
            }
            $total_item += $data1['cart_product_qty'];
            $data['name'] = $data1['cart_product_name'];
            $data['id'] = $data1['cart_product_id'];
            $data['options']['image'] = $data1['cart_product_image'];
            $data['qty'] = $data1['cart_product_qty'];
            $data['price'] = $data1['cart_product_price'];
            $data['weight'] = $data1['cart_product_level'];
            Cart::add($data);
            $cart = view('layout.product.product-cart')->render();
            return response()->json([
                'total' => $total_item,
                'cart' => $cart,
                'status' => 200,
            ]);
        }
       else{
            return
            response()->json([
                'status' => 500,
            ]);
        }
    }  
    public function getvalue (Request $request){
        $data1 = $request->all();
        $search = ($data1['search_value']);
      
            
            $product =products::where('name', 'like', '%'.$search.'%')->get();
            $html = view('layout.product.product-list1', compact('product'))->render();
            return response()->json([
                'html' => $html,
            ]);
            
            

    }
    public function getprice (Request $request) {
        $data1 = $request->all();
        $search = ($data1['price_value']);
      
            
        $product =products::where('price', '<=',$search)->get();
            $html = view('layout.product.product-list1', compact('product'))->render();
            return response()->json([
                'html' => $html,
            ]);
        }
        public function getfilter(){
            $product = products::where('price','>=',10000)
            ->where('price','<=',40000)
            ->get();
            $html = view('layout.product.product-list1', compact('product'))->render();
            return response()->json([
                'html' => $html,
            ]);
        }

        public function getfilter1(){
            $product = products::where('price','>=',40000)
            ->where('price','<=',80000)
            ->get();
            $html = view('layout.product.product-list1', compact('product'))->render();
            return response()->json([
                'html' => $html,
            ]);
        }

        public function getfilter2(){
            $product = products::where('price','>=',80000)
            ->where('price','<=',120000)
            ->get();
            $html = view('layout.product.product-list1', compact('product'))->render();
            return response()->json([
                'html' => $html,
            ]);
        }

    public function addajax1 (request $request){
        
    }
    public function shopping (){
        return view('layout.product.shopping') ;

    
    }
    public function checkout(){
        if (auth()->user()){
            $id = auth()->user()->id;
            $user = contacts::where('user_id','=',$id )->get();
            return view('layout.cart.checkout', compact('user'));
            }
            else {
                $items = cities::all();
            return view('layout.cart.checkout',compact('items'));
            }
    }
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function savepay(request $request){
            $alldata= $request->all();
        $name = $request->name;
      
        $city = '';
        $district = '';
        $ward = '';

        
        if(auth()->user()){
            $city = $request->city;
            $district = $request->district;
            $ward = $request->ward;


        }else{
         $re_ward = $request->ward;
        $re_district = $request->district;
        $re_city = $request->city;
        $city1 = City::find($re_city);
        $district1 = districts::find($re_district);
        $ward1 = wards::find($re_ward);
           
            $city = $city1->name;
            $ward = $ward1->name;
            $district = $district1->name;
            
        }
        
        
    
        

      

            
           
            $re_pay = $request->payment;
            switch ($re_pay) {
             case "2" :
             $re_phone = $request->phone;
             $re_mail = $request->email;
             $re_city = $request->city;
           
           
          
         
             $re_address = $request->address;
             $address =  $re_address .' - '. $ward.' - '.$district.' - '.$city;

           
     
     
             $total_price = 0;
             $status = 0;                                                                                                  
      
              $id = auth()->user()->id ?? null;
     
        
             // $hoadon = new  oder();
             $request1=orders::insert([
                 'email' => $re_mail,
                 'phone' => $re_phone,
                 'user_id' => $id,
                 'name' =>$name,
                 'address' =>  $address,
                 'order_payment' => 'cash',
                 
             ]);
          
          
                 // $orde2 = orders::select(['id'])->where('user_id','=',$id)->first();
                 // $id1 = $orde2->id;
                 // $maxValue = orders::latest()->value('id');
                 // $orde2 = orders::select(['id'])->where('user_id','=',$id)->first();
                 //  $id1 = $orde2->id;
                 $orde1 = orders::select(['id'])->where('user_id','=',$id)->max('id');
        
               
                 
                 $carts = Cart::content();
                 if ($city == 'Thành phố Cần Thơ')
                                    $shipping_fee = 0;
                                else
                                    $shipping_fee = 35000;

                                $result=0;
                                $carts = Cart::content();
                                foreach($carts as $pro){
                                    $result += $pro->price*$pro->qty-( $pro->price* $pro->weight)*$pro->qty;

                                }
                             if ($result < 100000)
                                $total_shpping = $shipping_fee;
                                else

                                $total_shpping =  0;
              
                 foreach($carts as $each){
                     $total_price += $each->qty*( $each->price-($each->price*$each->weight));
                 
                     $quantity = $each->qty;
                     $sql = order_product::insert([
                         'id_order'=> $orde1,
                         'id_product' => $each->id,
                         'total_price' => $total_price,
                         'Status' => 'pending',
                         'total_amount' => $quantity,
                         'shipment' => $total_shpping,

                        
                         
                         
                     ]);
                     $total_price = 0 ;
                 }
                Cart::destroy();
          
                return redirect()->intended('/')->with('success','your order had been store!');
                 break;
                 case "1" :
                     $total_price = 0;
                     $carts = Cart::content();
                     foreach($carts as $each){
                         $total_price += $each->qty * $each->price;
                     };
                     $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                     $partnerCode = 'MOMOBKUN20180529';
                     $accessKey = 'klm05TvNBzhg7h7j';
                     $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                     $orderInfo = "Thanh toán qua ATM MoMo";
                     $amount = $total_price;
                     $orderId = time() . "";
                     $redirectUrl = "http://localhost:8080/thankyou";
                     $ipnUrl = "http://localhost:8080/thankyou";
                     $extraData = "";
                         $requestId = time() . "";
                         $requestType = "payWithATM";
                         // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                         //before sign HMAC SHA256 signature
                         $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                         $signature = hash_hmac("sha256", $rawHash,$secretKey);
                         
                         $data = array(
                             'partnerCode' => $partnerCode,
                             'partnerName' => "Test",
                             "storeId" => "MomoTestStore",
                             'requestId' => $requestId,
                             'amount' => $amount,
                             'orderId' => $orderId,
                             'orderInfo' => $orderInfo,
                             'redirectUrl' => $redirectUrl,
                             'ipnUrl' => $ipnUrl,
                             'lang' => 'vi',
                             'extraData' => $extraData,
                             'requestType' => $requestType,
                             'signature' => $signature);
                         $result = $this->execPostRequest($endpoint, json_encode($data));
                      
                         $jsonResult = json_decode($result, true);  // decode json
                     
                         //Just a example, please check more in there
                        
                        return redirect()->to( $jsonResult['payUrl']);
                          break;
                          case "3":
                            $re_phone = $request->phone;
                            $re_mail = $request->email;
                            $re_city = $request->city;
                            $orde_id = orders::select(['id'])->max('id');
                          
                          
                         
                        
                            $re_address = $request->address;
                            $address =  $re_address .' - '. $ward.' - '.$district.' - '.$city;
                    
                          
                    
                    
                            $total_price = 0;
                            $status = 0;                                                                                                  
                     
                             $id = auth()->user()->id ?? null;
                    
                       
                            // $hoadon = new  oder();
                            $request1=orders::insert([
                                'email' => $re_mail,
                                'phone' => $re_phone,
                                'user_id' => $id,
                                'name' =>  $name,
                              
                                
                                'address' =>  $address,
                                'order_payment' => 'VNpay',
                                
                            ]);
                            $carts = Cart::content();
                            if ($city == 'Thành phố Cần Thơ')
                                    $shipping_fee = 0;
                                else
                                    $shipping_fee = 35000;

                                $result=0;
                                $carts = Cart::content();
                                foreach($carts as $pro){
                                    $result += $pro->price*$pro->qty-( $pro->price* $pro->weight)*$pro->qty;

                                }
                             if ($result < 100000)
                                $total_shpping = $shipping_fee;
                                else

                                $total_shpping =  0;

               
              
                            foreach($carts as $each){
                                $total_price += $each->qty*( $each->price-($each->price*$each->weight));
                            
                                $quantity = $each->qty;
                                $sql = order_product::insert([
                                    'id_order'=> $orde_id,
                                    'id_product' => $each->id,
                                    'total_price' => $total_price,
                                    'Status' => 'approval',
                                    'total_amount' => $quantity,
                                   'shipment' => $total_shpping,
                                    
                                    
                                ]);
                                $total_price = 0 ;
                            }
                            $total_price = 0;
                            $carts = Cart::content();
                  $total_price_1=0;
                            foreach($carts as $each){
                                $total_price += $each->qty * $each->price;
  
                            };
                           Cart::destroy();
                          $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                          $vnp_Returnurl = "http://127.0.0.1:8080/vnpay-return";
                          $vnp_TmnCode = "CHY8RJDX"; //Mã website tại VNPAY 
                          $vnp_HashSecret = "OHVGFFGRCSFFHBCWQYANFOUBVFDFRJJQ"; //Chuỗi bí mật
                          $orde_id = orders::select(['id'])->max('id');
                          $vnp_TxnRef = $orde_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                          $vnp_OrderInfo = 'Thanh toán qua VNPAY';
                          $vnp_OrderType = 'billpayment';
                     
                $total_price_1 = $total_price;
            
                          $vnp_Amount = $total_price_1 * 100;
                          $vnp_Locale = 'vn';
                          $vnp_BankCode = 'NCB';
                          $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                          //Add Params of 2.0.1 Version
                          //$vnp_ExpireDate = $_POST['txtexpire'];
                          //Billing
          
                          $inputData = array(
                              "vnp_Version" => "2.1.0",
                              "vnp_TmnCode" => $vnp_TmnCode,
                              "vnp_Amount" => $vnp_Amount,
                              "vnp_Command" => "pay",
                              "vnp_CreateDate" => date('YmdHis'),
                              "vnp_CurrCode" => "VND",
                              "vnp_IpAddr" => $vnp_IpAddr,
                              "vnp_Locale" => $vnp_Locale,
                              "vnp_OrderInfo" => $vnp_OrderInfo,
                              "vnp_OrderType" => $vnp_OrderType,
                              "vnp_ReturnUrl" => $vnp_Returnurl,
                              "vnp_TxnRef" => $vnp_TxnRef
                          );
          
                          if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                              $inputData['vnp_BankCode'] = $vnp_BankCode;
                          }
                          if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                              $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                          }
          
                          //dd($inputData);
                          ksort($inputData);
                          $query = "";
                          $i = 0;
                          $hashdata = "";
                          foreach ($inputData as $key => $value) {
                              if ($i == 1) {
                                  $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                              } else {
                                  $hashdata .= urlencode($key) . "=" . urlencode($value);
                                  $i = 1;
                              }
                              $query .= urlencode($key) . "=" . urlencode($value) . '&';
                          }
          
                          $vnp_Url = $vnp_Url . "?" . $query;
                          if (isset($vnp_HashSecret)) {
                              $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                              $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                          }
                          $returnData = array(
                              'code' => '00'
                              ,
                              'message' => 'success'
                              ,
                              'data' => $vnp_Url
                );
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }

                          break;
         }

    }
    public function vnpay_return(Request $request){

        if ($request->vnp_ResponseCode == '00') {
            $transaction = orders::find($request->vnp_TxnRef);
            //dd($transaction->id);
            $orders = DB::table('order_product')
                ->join('products', 'order_product.id_product', 'products.id')
                ->join('orders', 'order_product.id_order', 'orders.id')
                ->where('order_product.id_order', $transaction->id)
                ->get('order_product.id_product');
            $order = order_product::select(order_product::raw('id_product'))
                ->where('id_order', $transaction->id)
                ->get();
            // $products = DB::table('products')
            //     ->join('orders', 'products.id', 'order_product.id_product')
            //     ->where('order_product.id_order', $transaction->id)
            //     ->get('products.total_amount');
            $transaction_status = order_product::where('id_order', $transaction->id)->update(['Status' => 'approval']);
            $transaction_payment_status = orders::where('id', $transaction->id)->update(['order_payment' => 'VNpay']);
            foreach ($order as $key => $value) {
                $id_product = $value->product->id;
                $total = DB::table('order_product')
                    ->join('products', 'order_product.id_product','products.id')
                    ->join('orders', 'order_product.id_order', 'orders.id')
                    ->where('order_product.id_product', $id_product)
                    ->get('order_product.total_amount');
                foreach ($total as $totals) {
                    $quantity = $totals->quantity;
                    $newquantity = $value->product->quantity - $quantity;
                    $product = products::where('id', $id_product)->update(['quantity' => $newquantity]);
                }

            }
            Cart::destroy();
            
            
            return redirect()->intended('/')->with('success','your order had been store!');
        } else {
            $transaction = orders::find($request->vnp_TxnRef);
            $orders = DB::table('order_product')
                ->join('products', 'order_product.id_product', 'products.id')
                ->join('orders', 'order_product.id_order', 'orders.id')
                ->where('order_product.id_order', $transaction->id)
                ->delete();
            $transaction->delete();
            return redirect()->route('home');
        }
    }
    public function addCartAjaxShopping(request $request){
        $id =  $request->cart_product_id;
        $product = products::find($id);
        $quantity = $product->amount;
        $t1 = 0;
        $carts= Cart::content();
        foreach ($carts as $car) {
            if($car->id == $id)
              $t1 = $car->qty;
        }
        
       
        $num_quantity = 1;
        $total_quantity = $t1 + $num_quantity;



        if ($total_quantity <= $quantity) {
            $session_id = substr(md5(microtime()), rand(0, 26), 5);
            $carts = Cart::content();
            $total_item = 0;
            foreach ($carts as $cart) {

                $total_item += $cart->qty;
            }

            $total_item += $request->cart_product_qty;
            $data['name'] = $request->cart_product_name;
            $data['id'] = $request->cart_product_id;
            $data['options']['image'] = $request->cart_product_image;
            $data['qty'] = $request->cart_product_qty;
            $data['price'] = $request->cart_product_price;
            $data['weight'] = $request->cart_product_level;
            $id = $request->cart_product_id;
            //     }
            // }else{
            //   $data['name'] = $data['cart_product_name'];
            //   $data['id'] = $data['cart_id_product'];
            //   $data['options']['image'] = $data['cart_product_image'];
            //   $data['qty'] = $data['cart_product_qty'];
            //   $data['price'] = $data['cart_product_price'];
            //   $data['weight'] = $data['cart_product_qty'];

            // }

            Cart::add($data);
            $cart1 = Cart::content();
            foreach ($cart1 as $cart) {
                if ($cart->qty == 0) {
                    Cart::update($cart->rowId, 0);
                }
            }
            $sum = 0;
            $carts = Cart::content();
            foreach ($carts as $pro) {
                $result = $pro->qty * ($pro->price - ($pro->price * $pro->weight));
                $sum += $result;
            }
            $data1 = view('layout.product.add-shopping', compact('id'))->render();
            $total_item1 = view('layout.product.total-product', compact('total_item'))->render();
            $total_price = view('layout.product.total-price', compact('sum'))->render();
            $cart_item = view('layout.product.product-cart', compact('sum'))->render();
            return response()->json([
                'data' => $data1,
                'total' => $total_item1,
                'price' => $total_price,
                'cart' => $cart_item,
                'status' => 200,
            ]);
        }
        else{
            return response()->json([
                'status' => 500,

            ]);
        }
        // return response()->json([
        //     'total_item'  => $total_item,
        // ]);

       
    }
    public function subCartAjax(request $request){
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $carts = Cart::content();
     
            //   $total_item = 0;
                // foreach($carts as $cart)
                //     $total_item +=  $cart->qty;
                // }
                  $data['name'] = $request->cart_product_name;
                  $data['id'] = $request->cart_product_id;
                  $data['options']['image'] = $request->cart_product_image;
                  $data['qty'] = -1;
                 
                  $data['price'] = $request->cart_product_price;
                  $data['weight'] =  $request->cart_product_level;
                  $id =$request->cart_product_id;
                 
                //   foreach($carts as $cart){
  
                //       $total_item +=  $cart->qty;
                //   }
        Cart::add($data);
          $cart1 = Cart::content();
          $total_item = 0;
            foreach($cart1 as $cart){
                $total_item +=  $cart->qty;
            }
                if ($cart->qty == 0 ){
                    Cart::update($cart->rowId,0);
                }
            
                $sum=0;
                $carts = Cart::content();
                foreach($carts as $pro){
                    $result = $pro->qty*($pro->price-($pro->price*$pro->weight));
                    $sum += $result;
                }
        $data1       =view('layout.product.sub-shopping', compact('total_item','id'))->render();
        $total_item1 = view('layout.product.total-product',compact('total_item'))->render();
        $total_price = view('layout.product.total-price',compact('sum'))->render();
        $cart_total  = view('layout.product.product-cart',compact('sum'))->render();
        return response()->json([
            'data' => $data1,
            'total' => $total_item1,
            'price' =>$total_price,
            'cart' => $cart_total,
        ]);
        // return response()->json([
        //     'total_item'  => $total_item,
        // ]);

    }
  
    public function  deleteProduct (Request $request){
        $rowId = $request->id;
        $total_item = 0;
        $cart1 = Cart::content();
        $total_price=0;
        foreach($cart1 as $cart){
            $total_item +=  $cart->qty;
            $total_price += $cart->qty*($cart->price-($cart->price*$cart->weight));
            
        }
      
        $total_price1=0;
        foreach($cart1 as $cart){
            if($cart->rowId == $request->id){
                $total_price1 = $cart->qty*($cart->price-($cart->price*$cart->weight));
            }
        }
        $total_price2 = $total_price-$total_price1;
        Cart::update($rowId,0);
        $data1 = view('layout.product.sub-shopping')->render();
        $total_item1  = view('layout.product.total-product',compact('total_item'))->render();
        $total_price4 = view('layout.product.total-price4',compact('total_price2'))->render();
        $cart_item = view('layout.product.product-cart')->render();
        return response()->json([
            'data'  => $data1,
            'total' => $total_item1,
            'price' => $total_price4,
            'cart'  => $cart_item,
        ]);
        

    }
    public function addToCartAjax(request $request){
        $id =  $request->cart_product_id;
        $product = products::find($id);
        $quantity = $product->amount;
        $t1 = 0;
        $carts= Cart::content();
        foreach ($carts as $car) {
            if($car->id == $id)
              $t1 = $car->qty;
        }
        
       
        $num_quantity = 1;
        $total_quantity = $t1 + $num_quantity;



        if ($total_quantity <= $quantity) {
            $carts = Cart::content();
            $total_item = 0;
            foreach ($carts as $cart) {

                $total_item += $cart->qty;
            }

            $total_item += $request->cart_product_qty;
            $data['name'] = $request->cart_product_name;
            $data['id'] = $request->cart_product_id;
            $data['options']['image'] = $request->cart_product_image;
            $data['qty'] = 1;
            $data['price'] = $request->cart_product_price;
            $data['weight'] = $request->cart_product_level;
            $id = $request->cart_product_id;
            Cart::add($data);
            $cart1 = Cart::content();
            foreach ($cart1 as $cart) {
                if ($cart->qty == 0) {
                    Cart::update($cart->rowId, 0);
                }
            }
            $sum = 0;
            $carts = Cart::content();
            foreach ($carts as $pro) {
                $result = $pro->price * $pro->qty;
                $sum += $result;
            }

            $total_item1 = view('layout.product.total-product', compact('total_item'))->render();

            $cart_item = view('layout.product.product-cart', compact('sum'))->render();
            return response()->json([

                'total' => $total_item1,
                 'status' => 200,
                'cart' => $cart_item,
            ]);
        }
        else{
            return response()->json([
            'status' => 500,
            ]);
        }

    }
    public function fetch_data (request $request){
        $product = products::getproduct();
        return view('layout.product.simple-product',compact('product'))->render();
      
    }

}

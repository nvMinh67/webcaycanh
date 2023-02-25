<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users;
use App\Models\City as cities;
use App\Models\District as districts;
use App\Models\contacts;
use App\Models\Ward as wards;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Cart;
class UserController extends Controller
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
    public function login()
    {
      
 
        return view('layout/auth/login');
    }
    public function loginstore (request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth()->user()->role==1){
                session()->put('admin',Auth()->user()->name);
                session()->put('id',Auth()->user()->id);
                return redirect()->route('admin')->with('success',"admin login success");
            }
 
            return redirect()->intended('/')->with('success','You was logined success!');
        }
 
        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ])->onlyInput('email')->with('error','You should check again password or email agian!');
    }
    public function register (){
        $items = cities::get();
        return  view('layout.auth.register1', ['items' => $items,'city'=> $items]);
    
    }

    
    public function storeregister (Request $request){
        $alldata= $request->all();
        

  
        $user = new User();
        $validated = $request->validate([
            'Username' =>'required|string|regex:/\w*$/|max:255|unique:Users,name',
            'Email' => 'required|email|max:255',
            'Phone' => 'required|min:10|max:12',
            'Password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/',
            'Confirm-password' => 'required|same:Password',]);
          
             $true=$user->fill([
            'username' => $alldata['Username'],
            'email' => $alldata['Email'] ,
            'role'  => '0',
           
            'phone' => $alldata['Phone'] ,
            'password' => Hash::make( $alldata['Password'])])->save();
            $address = $alldata['address1'];
            $ward_id= $alldata['ward'];
            $num_ward=(int)$ward_id;
       
            if($true){
                $user_id = User::find(user::max('id'));
                $userid = $user_id->id; 
                $sql = contacts::insert([
                    'address'=> $address,
                    'ward_id' =>$num_ward,
                    'user_id' => $userid,
                ]);
                return  redirect()->intended('/home/login')->with('success','register success!');
            }}
         

        

   




        
        
public function logout(){
    if (empty(session()->has('admin'))){
    session()->forget('id');
    session()->forget('admin');}
    Auth::logout();
    return redirect()->intended('/')->with('success','logout success!');
}
    
    public function getdistrict (request $request){
        $cityid = $request->city_id;
        $city = City::find($cityid);
        if ($city->name == 'Thành phố Cần Thơ')
            $shipping_fee = 0;
        else
            $shipping_fee = 35000;

        $district=districts::where('city_id', '=', $cityid)->get();
       
        return response()->json([
         'data'  => $district,
         'shipping_fee' => $shipping_fee,

     ]);

    }
    public function getward (request $request){
        $district_id = $request->district_id;
       
       
        $district=wards::where('district_id', '=', $district_id)->get();
        foreach($district as $dis){
            $city_name = $dis->district->city->name;
        }
        if ($city_name == 'Thành phố Cần Thơ')
            $shipping_fee = 0;
         else
          $shipping_fee = 35000;

          $result=0;
          $carts = Cart::content();
          foreach($carts as $pro){
            $result += $pro->price*$pro->qty-( $pro->price* $pro->weight)*$pro->qty;

          }
          if($result < 100000)
          $total_result = $shipping_fee + $result;
          else

          $total_result =  $result;

       
        return response()->json([
         'data'  => $district,
         'shipping_fee' => $shipping_fee,
         'total_result'  => $total_result,   
     ]);

    }
    public function checkout_user (request $request){
        if(is_numeric($request->id)){
            $id_user = $request->id;
            $contact = contacts::where('user_id', $id_user)->get();
            foreach($contact as $con){
                $co = $con;
            }
            if($co->ward->district->city->name == 'Thành phố Cần Thơ')
                $shipping_fee = 0;
            else
                $shipping_fee = 35000;

                $result=0;
                $carts = Cart::content();
                foreach($carts as $pro){
                  $result += $pro->price*$pro->qty-( $pro->price* $pro->weight)*$pro->qty;
      
                }
                if($result < 100000)
                $total_result = $shipping_fee + $result;
                else
      
                $total_result =  $result;
       

                return response()->json([
                    
                    'shipping_fee' => $shipping_fee,
                    'total_result'  => $total_result,   
                ]);


            
        }
        else{
            
        }
    }
  
}

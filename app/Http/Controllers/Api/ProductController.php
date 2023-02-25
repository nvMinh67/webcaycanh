<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;


class ProductController extends Controller
{
    public function index (request $request){
        $product =  products::all();
        return $product;

    }
    public function show (products $id){
        return $id;
    }

    public function store (request $request){
        return $request;
    }
    public function updateProduct (request $request){
        $data = $request->all();
        if($request->hasFile('image')){
            $destinationPath = public_path('uploads/');
            $image = $request->file('image'); 
            $image_name = $image->getClientOriginalName();
            $image->move($destinationPath, $image_name);
            $upload = 'uploads/';
            $data['image'] = "{$upload}{$image_name}";
            $product = products::create($data);
            return response()->json(['mensaje' => 'success']); 

            

        }
        else return response()->json(['mensaje' => 'nonfile']); 
    
    }
}

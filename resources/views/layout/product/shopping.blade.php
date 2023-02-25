
@include('layout.layouts.default')
@include('layout.layouts.header')

<section>
 
          <div class="body-content mt-100  ">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <div class="content-single">
                    <h3 class="content-title">Cart</h3>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <ul class="content-nav">
                      <li><a href="index.html"><i class="fa-solid fa-house"></i> Home</a></li>
                      <li><i class="fa-solid fa-angle-right"></i></li>
                      <li><a href="index.html">Shop</a></li>
                      <li><i class="fa-solid fa-angle-right"></i></li>
                      <li><a href="index.html">Cart</a></li>
                  </ul>
              </div>
            </div> 
          </div>   
        </section> 
      </div>
    </section>
    <section>

    </section>
    <section>
      
    </section>


  
     
     <section class="">
      <div class="shopping-cart section mt-60">
        <div >
          <div class="container mt-50">
            <div class="cart-list-head">
              <div class="cart-list-title">
                <div class="row shopping-defaut">
                  <div class="col-lg-8">
  
                    <div class="row ml-10">
  
                      <div class="col-lg-1 col-md-1 col-12"></div>
                      <div class="col-lg-4 col-md-3 col-12">
                        <p>Product Name</p>
                      </div>
                      <div class="col-lg-3 col-md-2 col-12">
                        <p>Quantity</p>
                      </div>
                      <div class="col-lg-3 col-md-2 col-12">
                        <p>Subtotal</p>
                      </div>
               
                      <div class="col-lg-1 col-md-2 col-12">
                        <p>Remove</p>
                      </div>
                    </div>
  
                    
                  </div>
                  <div class="col-lg-4">
                   
                  </div>
                </div>
                
              </div>
          
             
                    
                    
                  </div>
                </div>
               
                <div class="container">
                  
                  <div class="row">
                    @if (Session::get('cart')) 
                    <div class="col-lg-8">
                      <div id="shopping-defautl">
                        <div class="cart-single-list mr-ct"  style="margin-right:-14px">
                         @php $sum=0; $carts = Cart::content(); @endphp
                         @foreach($carts as $pro)
                         <div class="row align-items-center">
                          <div class="col-lg-1 col-md-1 col-12">
                           
                              <img src="{{asset($pro->options->image)}}" alt="#"
                            />
                          </div>
                          <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name">
                              <a href="product-details.html">
                              {{$pro->name}}</a
                              >
                            </h5>
                           
                          </div>
                          <div class="col-lg-3 col-md-2 col-12">
                          <div class="count-input">
                              <span>
                                <form  id="addproductajax">
                                  @csrf
                              <input type="hidden" value="{{$pro->id}}" class="cart_product_id_{{$pro->id}}">
                              <input type="hidden" value="{{$pro->name}}" class="cart_product_name_{{$pro->id}}">
                              <input type="hidden" value="{{$pro->options->image}}" class="cart_product_image_{{$pro->id}}">
                              <input type="hidden" value="{{$pro->price}}" class="cart_product_price_{{$pro->id}}">
                              <input type="hidden" value="1" class="cart_product_qty_{{$pro->id}}">
                              <input type="hidden" value="{{$pro->weight}}" class="cart_product_level_{{$pro->id}}">
                               </a>
                              {{-- <button class="btn btn-default add-to-cart" data-id_product="{{$pro->id}}" name="add-to-cart">Thêm giỏ hàng</button> --}}
                              
                            </form>
                          <form  id="subproductajax">
                           @csrf
                          <input type="hidden" value="{{$pro->id}}" class="cart_product_id_{{$pro->id}}">
                          <input type="hidden" value="{{$pro->name}}" class="cart_product_name_{{$pro->id}}">
                          <input type="hidden" value="{{$pro->options->image}}" class="cart_product_image_{{$pro->id}}">
                          <input type="hidden" value="{{$pro->price}}" class="cart_product_price_{{$pro->id}}">
                          <input type="hidden" value="1" class="cart_product_qty_{{$pro->id}}">
                          <input type="hidden" value="{{$pro->weight}}" class="cart_product_level_{{$pro->id}}">
                           </a>
                          {{-- <button class="btn btn-default add-to-cart" data-id_product="{{$pro->id}}" name="add-to-cart">Thêm giỏ hàng</button> --}}
                                </form>
                                <div class="icon-quantity">
                                  <div form="addproductajax" type="button" class="add-to-cart btn-add-shopping" data-id_product="{{$pro->id}}" value="{{$pro->id}}" ><i id="icon-add" class="fa-solid fa-plus " style="color: black"></i>
                                </div></div><div class="quantity"> 
                                  <h4 id="total_item_default">{{$pro->qty}}</h4>
                                  <h4 id="total_item_new"></h4>
                                </div>
                                <div class="icon-quantity">
                                    <div form="addproductajax1" type="button" class="add-to-cart1 btn-add-shopping" data-id_product="{{$pro->id}}" value="{{$pro->id}}" >
                                      <i class="fa-solid fa-minus" style="color: black"></i>

                                    </div>
                              </div>
                              </span>
                              
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-2 col-12">
                            <p>{{number_format($pro->qty*($pro->price-($pro->price*$pro->weight)))}} VND</p>
                          </div>
                     
                          <div class="col-lg-1 col-md-2 col-12">
                            <div  class="remove-item delete-cart" data-id_product="{{$pro->rowId}}" type="button" href="#" value="{{$pro->rowId}}"
                              >
                              <input type="hidden" value="{{$pro->rowId}}"><i class="fa-sharp fa-solid fa-xmark"  ></i></div>
                          </div>
                        </div>
                        @php $result = $pro->qty*($pro->price-($pro->price*$pro->weight));
                        $sum += $result @endphp
                        
                          @endforeach
                      </div>
                      <div id="shopping-new">
                        
                      </div>
                       
                      </div>
                    
  
                  
                
                
                
                
                  </div>
                
                  <div class="col-lg-4 mt-a20">
                   <div >
                     <div class="total-amount " >
                           <div class="right">
                             <ul>
                               <li>Cart Subtotal<span id="total_item1"><h4>{{number_format($sum)}}  VND</h4></span></li>
                               <li>Shipping<span>Yet Counted</span></li>
                        
                               <li class="last">You Pay<span>Yet Counted</span></li>
                             </ul>
                             <div class="button">
                               <a href="{{url('/home/shopping/checkout')}}" class="btn btn-primary">Checkout</a>
                               <a href="{{url('/')}}" class="btn btn-success"
                                 >Continue shopping</a
                               >
                             </div>
                           </div>
                         </div>

                   </div>
                     
                      </div>
                      

                   
            
                  </div>
                 
  
                
                
               
              </div>
              @else 
                <div class="container">
                  
                  <div class="row">
                    <div class="col-lg-8">
                      <img src="https://fansport.vn/default/template/img/cart-empty.png" alt="">
                  
            
  
                  
                
                
                
                
                  </div>
                  <div class="col-lg-4 mt-a20 ">
                      <div >
                            <div class="right">
                              <ul>
                                <li>Cart Subtotal<span></span></li>
                                <li>Shipping<span>Yet Counted</span></li>
                                <li class="last">You Pay<span>Yet Counted</span></li>
                              </ul>
                              <div class="button">
                                <a href="{{url('/home/shopping/checkout')}}" class="btn btn-primary">Checkout</a>
                                <a href="{{url('/')}}" class="btn btn-success">Continue shopping</a
                                >
                              </div>
                            </div>
                          </div>
                     
                      </div>
            
                  </div>
                 
  
                
                
               
              </div>
              @endif
        
  
                </div>
                
          </div>
    
        </div>

      </div>
      
      
      
    
  
     </section>

       

     </div>
      
      
  
  </div>
 
  @include('layout.layouts.footer')


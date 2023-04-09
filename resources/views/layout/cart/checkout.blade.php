@include('layout.layouts.default')
@include('layout.layouts.header')
<section>
          <div class="body-content mt-100  ">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <div class="content-single">
                    <h3 class="content-title">single product</h3>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <ul class="content-nav">
                      <li><a href="index.html"><i class="fa-solid fa-house"></i> Home</a></li>
                      <li><i class="fa-solid fa-angle-right"></i></li>
                      <li><a href="index.html">Shop</a></li>
                      <li><i class="fa-solid fa-angle-right"></i></li>
                      <li><a href="index.html"> Check out</a></li>
                  </ul>
              </div>
            </div> 
          </div>   
        </section> 
<section class="checkout-wrapper section mt">
        <div class="container">
          <div class="row justify-content-center mt--50">
            <div class="col-lg-6 ">
              <div class="checkout-steps-form-style-1">
                <ul id="accordionExample">
           
                  <li>
          
                    <section
                   
                    >
           <form method ="POST" action="/home/shopping/checkout/pay">
                      @csrf
                  <div class="row">
                    <div class="col-lg-12">
                  
             
             
                 <div class="row">
                    
                 

                     
                 <?php if (auth()->user()): ?>
                  @foreach ($user as $use) 
                  <div class="row">
                    <h3 style="font: 2.4rem;
                    font-weight: 600;">Address deliver</h3>
                       
                       
                          <div class="col-md-12">
                            <div class="single-form form-default">
                              <label>Name</label>
                              <div class="row">
                                <div class="col-md-12 form-input form">
                                  <input name="name"  type="text" value="<?= auth()->user()->username; ?>">
                                </div>
                              </div>
                            </div>
                          </div>
                          <input name="id"  id="user_id" type="hidden" value="<?= auth()->user()->id; ?>">
                          <div class="col-md-12">
                            <div class="single-form form-default">
                              <label>Email Address</label>
                              <div class="form-input form">
                              <input name="email"  type="text" value=" {{auth()->user()->email}}">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="single-form form-default">
                              <label>Phone Number</label>
                              <div class="form-input form">
                              <input name="phone"  type="text" value="{{auth()->user()->phone}}">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="single-form form-default">
                              <label>City</label>
                              <div class="form-input form">
                                <input name="city"  type="text" value="{{$use->ward->district->city->name}}"/>
                              </div>
                            </div>
                          </div>   <div class="col-md-12">
                            <div class="single-form form-default">
                              <label>District</label>
                              <div class="form-input form">
                                <input name="district" type="text" placeholder="district" value=" {{$use->ward->district->name}}" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="single-form form-default">
                              <label>Ward</label>
                              <div class="form-input form">
                                <input name="ward" type="text" placeholder="Ward" value=" {{$use->ward->name}}" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="single-form form-default">
                              <label>Address</label>
                              <div class="form-input form">
                                <input name="address" type="text" placeholder="Address"  value=" {{$use->address}}" />
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="checkout-payment-form">
                              <div class="single-form form-default">
                               
                                <div class="form-input form">
                                  <input
                                    type="text"
                                    placeholder="Note"
                                  />
                                </div>
                              </div>
                        
                           

                            </div>
                          </div> 

                  @endforeach
                        
                     
                        
             
                        </div>
                        @else 
                          <div class="row">
                            <h3 style="font: 2.4rem;
                            font-weight: 600;">Address deliver</h3>
                       <div class="col-md-12">
                         <div class="single-form form-default">
                           <label>Name</label>
                           <div class="row">
                             <div class="col-md-12 form-input form">
                               <input name="name"  type="text" value="">
                             </div>
                           </div>
                         </div>
                       </div>
                       <div class="col-md-12">
                         <div class="single-form form-default">
                           <label>Email Address</label>
                           <div class="form-input form">
                           <input name="email"  type="text" value="">
                           </div>
                         </div>
                       </div>
                       <div class="col-md-12">
                         <div class="single-form form-default">
                           <label>Phone Number</label>
                           <div class="form-input form">
                           <input name="phone"  type="text" value="">
                           </div>
                         </div>
                       </div>
                       <div class="col-md-12">
                         <div class="single-form form-default">
                           <label>City</label>
                           <div class="">
                           <select style="padding:15px 10px; font-size:1.6rem;" class="form-control select_quantity" name="city" id = "city">
                          @foreach ($items as $item) 
                        <option value="<?= $item->id; ?>"><?= $item->name; ?></option>
                        
                        
                        
                        @endforeach
                     </select>
                           </div>
                         </div>
                       </div>
                       <div class="col-md-12">
                         <div class="single-form form-default">
                           <label>District</label>
                           <div class="">
                            <select style="padding:15px 10px; font-size:1.6rem;" class="form-control select_quantity" name="district" id="district">
                              <option value=""><option>
                          </select>
                           </div>
                         </div>
                       </div>
                       <div class="col-md-12">
                         <div class="single-form form-default">
                           <label>Ward</label>
                           <div class="">
                            <select style="padding:15px 10px; font-size:1.6rem;" class="form-control select_quantity" name="ward" id="ward">
                              <option  value=""><option>
                          </select>
                           </div>
                         </div>
                       </div>
                      
 

                       <div class="col-md-12">
                         <div class="single-form form-default">
                           <label>Address</label>
                           <div class="form-input form">
                             <input type="address" placeholder="Address" name="address"/>
                           </div>
                         </div>
                       </div>
                       <div class="col-12">
                         <div class="checkout-payment-form">
                           <div class="single-form form-default">
                            
                             <div class="form-input form">
                               <input
                                 type="text"
                                 placeholder="Note"
                               />
                             </div>
                           </div>
                     
                        

                         </div>
                       </div> 
               
                     
                  
                     
          
                     </div>
                     @endif

              
                    </div>
                    <div class="col-lg-4">

                    </div>
                  
                  </div>
                    </section>
                  </li>
                  <li>
                    
                    <section
               
                    >
                   
                      <div class="row">
                  
                      </div>
                    </section>
                  </li>
                </ul>
              </div>
           
          
           
            </div>

         
              @if (Session::get('cart'))
            <div class="col-lg-6 mt--10">
              <div class="container">
                    @php $sum=0;$carts = Cart::content(); @endphp
                    @foreach($carts as $pro)
                <div class="row">
                  <div class="col-lg-12">
                  <div class="cart-single-checkout mr-ct">
                    <div class="row align-items-center ">
                    <div class="col-lg-4 col-md-1 col-12">
                        <a href="product-details.html"
                          ><img src="{{asset($pro->options->image)}}" alt="#"
                        /></a>
                      </div>
                      <div class="col-lg-3 col-md-6 col-12">
                        <h5 class="product-name">
                        {{$pro->name}}
                        </h5>
                      </div>
                      <div class="col-lg-2 col-md-3 col-12">
                        <div class="count-input">
                          <span>
                            <div class="quantity">{{$pro->qty}}</div>
                          </span>
                          
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-12">
                        <div class="price">
                          @if ($pro->weight == 0)
                             @php $pro->qty* $pro->price @endphp
                        @else
                          @php $pro->qty*( $pro->price-($pro->price*$pro->weight)) @endphp
                        
                          @endif
                        </div>
                        
                      </div>
                 
                  
                    </div>
                  </div>
                
              
              
              
              
                </div>
                

          
                </div>
                @php $result = $pro->price*$pro->qty-( $pro->price* $pro->weight)*$pro->qty;
                    $sum += $result @endphp
                    
                @endforeach
             

              
              
               
            </div>
            <div class="row">
                    <div class="col-lg-12">
                    <div class="cart-single-checkout mr-ct">
                      
                      
                      <label class="check-box-pay" >Pay by Cash
                        <input type="radio" id="cash_check" checked="checked" value ="2" name="payment">
                        <span class="checkmark"></span>
                      </label>

                      <label class="check-box-pay" >Pay by VnPay
                        <input type="radio" id="cash_check" value ="3" name="payment">
                        <span class="checkmark"></span>
                      </label>
                      
                  
                      
                      <!-- <label class="container1">Three
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                      
                      <label class="container1">Four
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label> -->

              

                       
                    
              
                    </div>
                  
                
                
                
                
                  </div>
  
            
            
               
  
                
                
               
              </div>
         
         

              <div class="checkout-sidebar">
             
                <div class="checkout-sidebar-price-table mt-30">
                  <h5 class="title">Pricing Table</h5>
                  <div class="sub-total-price">
                    <div class="total-price">
                      <p class="value">Subotal Price:</p>
                      <h3 class="price" value={{$sum}} id="sub_price"> {{number_format($sum)}}</h3>
                    
                    </div>
                    <div class="total-price shipping">
                      @if($sum < 100000)
                      <p class="value" >deliver free :</p>
                    

                      <p class="price" id="deliver_fee">Yet Counted</p>
                      @else
                      <p class="value" >deliver free :</p>
                    

                      <p class="price" >Free</p>
                      @endif

                     

                    </div>
                    
                  </div>
                  <div class="total-payable">
                    <div class="payable-price">
                      <p class="value">Total Price:</p>
                      <p class="price" id="total_price"></p>
                    </div>
                  </div>
                  <div class="single-form form-default button">
                    <button type="submit" class="btn btn-primary" name="redirect">pay now</button>
                  </div>
                </div>
 
              </div>
              @else
                <div class="col-lg-6 mt--10">
              <div class="container">
                  
                <div class="row">

                  <div class="col-lg-12">

                  <div class="cart-single-list mr-ct">
                    <div class="row align-items-center ">
                      <div class="col-lg-3 col-md-1 col-12">
                        <a href="product-details.html"
                          ><img src="" alt="#"
                        /></a>
                      </div>
                      <div class="col-lg-3 col-md-6 col-12">
                        <h5 class="product-name">
                          <a href="product-details.html">
                          </a
                          >
                        </h5>
                       
                      </div>
                      <div class="col-lg-3 col-md-3 col-12">
                        <div class="count-input">
                          <span>
                            <div class="quantity"></div>
                          </span>
                          
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-12">
                        <p></p>
                      </div>
                 
                  
                    </div>
                  </div>
                
              
              
              
              
                </div>
                

          
                </div>
                      

              
              
               
            </div>
         
         

              <div class="checkout-sidebar">
             
                <div class="checkout-sidebar-price-table mt-30">
                  <h5 class="title">Pricing Table</h5>
                  
                  <div class="sub-total-price">
                    <div class="total-price">
                      <p class="value">Subotal Price:</p>
                      <p class="price"> </p>
                    </div>
                    <div class="total-price shipping">
                      <p class="value">deliver free :</p>
                      <p class="price">free</p>
                    </div>
                    <div class="total-price discount">
                      <p class="value">Subotal Price:</p>
                      <p class="price">$10.00</p>
                    </div>
                  </div>
                  <div class="total-payable">
                    <div class="payable-price">
                      <p class="value">Subotal Price:</p>
                      <p class="price">$164.50</p>
                    </div>
                  </div>
                  <div class="single-form form-default button">
                    <button type="submit" class="btn btn-primary">pay now</button>
                  </div>
                </div>
 
              </div>
            @endif
                
 




            </div>
          </div>
        </div>
        </form>
      </section>
      <script>
    $(document).ready(function(){
      var id =$('#user_id').val();

     
      
      $.ajax({
        method:'GET',
        url:'/user/get_total_price',
        data:{
          id : id,


        },
        dataType:'json',
        success:function(data){
          $('#deliver_fee').empty();
                        let fee = '';
                        fee += "<h3>"+data.shipping_fee+"</h3>"
                         $('#deliver_fee').append(fee);
          $('#total_price').append("<h3>"+((data.total_result))+"</h3>")

        }
      })
    $('#city').change(function(){
    
        var city_id = $(this).val();
      
       
                $.ajax({
                    url:'/getdistrict',
                    type:'GET',
                    data:{
                        city_id:city_id
                    },
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $('#district').empty();
                        $.each(data.data, function(key, value) {
                                let selectoption = '';
                                selectoption += "<option value='"+ value.id +"'>" + value.name+ "</option>";
                                $('#district').append(selectoption);
                                
                        }); 
                        
                    }
                    
                });
    })
    $('#district').change(function(){
        var district_id = $(this).val();
   

        $.ajax({
                    url:'/getward',
                    type:'GET',
                    data:{
                        district_id:district_id
                    },
                    dataType:'json',
                    success:function(data){
                        $('#ward').empty();
                        $.each(data.data, function(key, value) {
                          let selectoption = '';
                          selectoption += "<option value='"+ value.id +"'>" + value.name+ "</option>";
                         $('#ward').append(selectoption);
                        }); 
                        $('#deliver_fee').empty();
                        let fee = '';
                        fee += "<h3>"+data.shipping_fee+"</h3>"
                         $('#deliver_fee').append(fee);

                         $('#total_price').empty();
                         $('#total_price').append("<h3>"+((data.total_result))+"</h3>")


                    }
                    
                });

    })
    



})
 </script>
      @include('layout.layouts.footer')
      

  
     
  
      

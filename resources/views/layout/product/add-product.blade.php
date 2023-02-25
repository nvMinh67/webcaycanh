
@include('layout.layouts.default')
@include('layout.layouts.header')
<section>


  <section>
    
   
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
                      <li><a href="index.html"> Single Product</a></li>
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
       
       <div class="item-details ">
         <div class="container">
           <div class="top-area">
             <div class="row align-items-center">
               <div class="col-lg-6 col-md-12 col-12">
               
                 <div class="product-images">
                   <div class="images">
                     <div class="main-image">
                       <img id="main-img" src="{{asset($pro->image)}}" alt="">
                     </div>
                     <div class="sub-images">
                       {{-- <img class="sub-img" src="{{asset($pro->image)}}" alt="">
                       <img class="sub-img" src="{{asset($pro->image)}}" alt="">
                       <img class="sub-img" src="{{asset($pro->image)}}" alt="">
                       <img class="sub-img" src="{{asset($pro->image)}}" alt="">
                       <img class="sub-img" src="{{asset($pro->image)}}" alt=""> --}}
                      
                       
                     </div>
       
                   </div>
                 </div>
       
               </div>
               <div class="col-lg-6 col-md-12 col-12">
                 <div class="product-info">
                   <h2 class="title">{{$pro->name}}
                   </h2>
                      @if ($pro->level == 0 )
                   <ul class="main-price">
    
                     <li><h3 class="price"> <i class="fa-solid fa-tag"></i><?=number_format($pro->price-($pro->price*$pro->level))?> VND</h3></li>
                     <li><h3 class="old-price"> </h3></li>
                   </ul>
                      @else
                    <ul class="main-price">
    
                   <li><h3 class="price"> <i class="fa-solid fa-tag"></i><?=$pro->price-($pro->price*$pro->level); ?></h3></li>
                      <li><h3 class="old-price"> <i class="fa-solid fa-tag"></i> <?=$pro->price; ?></h3></li>
                             </ul>

                      @endif 

                   
                     @if ($pro->amount > 0) 
                   <div class="amount">
                    <div class="amount-title">
                      <p>available: {{$pro->amount}}</p>

                      
                      

                    </div>
       
                   </div>
                     @else 
                    <div class="amount">
                    <div class="amount-title">
                      <p>Sold-Out</p>
                      

                    </div>
       
                   </div>
                     @endif 

                    
                    <form id="form-ajax" action="">
                    @csrf
                    <input type="hidden" value="{{$pro->id}}" class="id_product">
                      <input type="hidden" value="{{$pro->id}}"    class="cart_product_id_{{$pro->id}}">
                      <input type="hidden" value="{{$pro->name}}"  class="cart_product_name_{{$pro->id}}">
                      <input type="hidden" value="{{$pro->image}}" class="cart_product_image_{{$pro->id}}">
                      <input type="hidden" value="{{$pro->price}}" class="cart_product_price_{{$pro->id}}">
                      <input type="hidden" value="{{$pro->level}}" class="cart_product_level_{{$pro->id}}">
                    <div class="form-group quantity"> 
                      <label for="quantity">Quantity</label>
                      <select class="form-control select_quantity cart_product_price_{{$pro->id}}"
                         name="quantity"
                          id = "quantity">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                          <option>8</option>
                          <option>8</option>
                          <option>9</option>



                      </select>
                      <input  style=" visibility: hidden;" name="id" input_type="" type="number" value="{{ $pro->id}}">

                  </div>
                  
                  
                  
                  
                  
                  
                </div>
              </form>
          
                @if ($pro->amount > 0) 
  
                 <div class="row ">
                  <div class="col-lg-6">
                  <button form="form-ajax" value="{{$pro->id}}" id="btn-add-pro" class="btn-add btn btn-buy1 btn-primary" type="button" class="btn btn-default add-to-cart" data-id_product="{{$pro->id}}" name="add-to-cart"> <i class="icon-cart fa-solid fa-cart-shopping">
                     </i>Add-To-Cart</button>
                  </div>
                  <div class="col-lg-6">
                  <button class="align-items-center btn-add btn btn-buy1 btn-primary" onclick="location.href='http://localhost:8080/home/shopping'" type="button">
                  <i class="icon-cart fa-solid fa-cart-shopping"></i>Watch-Cart</button>
                  </div>

                 </div>
  
                   @else
                  <div class="row">
                    <div class="col-lg-3">

                    </div>
                  
                  <div class="col-lg-6">
                  <button class="align-items-center btn-add btn btn-buy1 btn-primary" onclick="location.href='http://localhost:8080/home/shopping'" type="button">
                  <i class="icon-cart fa-solid fa-cart-shopping"></i>Watch-Cart</button>

                 
  
  
                  </div>
                  <div class="col-lg-3">
                      
                      </div>
  
                 </div>
                  @endif 

     
              
             

                 </div>
               
               </div>
       
             </div>
           </div>
         </div>
        </div>
        <div class="container mt-80 ">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
              <h2>Special Offer</h2>
              <p>
                There are many variations of passages of Lorem Ipsum available,
                but the majority have suffered alteration in some form.
              </p>
            </div>
          </div>
          
          
    
       
            
      
           </div>
           <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
              <div class="row" id="product-detail-list">
               @foreach ($product as $pro)
        
              @if($pro->level == 0 ) 
            <div class="col-lg-3 col-md-6 col-6">
              <div class="itemlist">
                <div class="item-img">
                  <a href="{{url('/home/detail',['name' => $pro->name])}}">  <img src="{{asset($pro->image)}}"
                   alt="" class="item-picture">
                  </a>
               
                   <span class="new-tag">NEW</span>
                   
                 
                    @if($pro->amount <= 0 )
                    <span class="sold-out-tag">Sold-Out</span>
                     @else
                      <div class="btn-buy">
                        <button form="add-to-cart-form-h" type="button" data-id_product="{{$pro->id}}" value="{{$pro->id}}" class="add-to-cart-product-home btn btn-buy1 btn-primary"><i class="icon-cart header_cart_icon fa-solid fa-cart-shopping"></i>Add to cart</button>
                        
                        </div>
                    @endif
               
                </div>
                <div class="item-content">
                  <h3 class="item-name">{{$pro->name}}</h3>
                  <div class="item-price">
                    <span class="price"> {{$pro->price}}  vnd</span>
                    <span class="old-price"></span>
                   
                  </div>
                </div>
              </div>
           </div>
           @else 
            <div class="col-lg-3 col-md-6 col-6">
              <div class="itemlist">
                <div class="item-img">
                  <a href="{{url('/home/detail',['name' => $pro->name])}}">
                    <img src="{{asset($pro->image)}}"alt="" class="item-picture">
  
                  </a>
                  
                   <span class="sale-tag">-{{$pro->level*100 }}%</span>
                   
                 
                    @if($pro->amount <= 0 ) 
                    <span class="sold-out-tag">Sold-Out</span>
                    
                    
                     @else 
                      <div class="btn-buy">
                        <button form="add-to-cart-form-h" type="button"
                         data-id_product="{{$pro->id}}"
                           value="{{$pro->id}}"
                            class="add-to-cart-product-home btn btn-buy1 btn-primary">
                            <i class="icon-cart
                             header_cart_icon
                             fa-solid fa-cart-shopping">
                              </i>Add to cart
                            </button>
                        </div>
                       @endif 
               
                </div>
                <div class="item-content">
                  <h3 class="item-name"> {{$pro->name}}</h3>
                  <div class="item-price">
                    <span class="price"> {{$pro->price-($pro->price*$pro->level)}}   VND</span>
                    <span class="old-price">{{$pro->price}}</span>
                   
                  </div>
                </div>
              </div>
            </div>
          @endif 
   
              
           @endforeach
        </div>
        <div class="paginate-detail mt-40 col-lg-12 col-md-12 col-12">
          {{$product->links('layout.partials.pagination-order')}}
        </div>

           
        



     
     

    </div>
        
            

 </div>
          
         
       
         
       
       </div>

  
      </div>
         
     </section>

       

     </div>
      
      
  
  </div>



  </body>

  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/tiny-slider.js')}}"></script>
  <script src="{{asset('js/glightbox.min.js')}}"></script>
  <script src="{{asset('js/main2.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
      

  {{-- <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/tiny-slider.js"></script>
  <script src="assets/js/glightbox.min.js"></script>
  <script src="assets/js/main.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  
      

</html>
</section>
<script>
    var mainimg = document.getElementById('main-img');
    var subimg = document.getElementsByClassName('sub-img');
     subimg[0].onclick = function(){
      mainimg.src = subimg[0].src;
     }
     subimg[1].onclick = function(){
      mainimg.src = subimg[1].src;
     }
     subimg[2].onclick = function(){
      mainimg.src = subimg[2].src;
     }
     subimg[3].onclick = function(){
      mainimg.src= subimg[3].src;
     }
     subimg[4].onclick = function(){
      mainimg.src = subimg[4].src;
     }
     
  

  </script>
      <script>
      var swiper = new Swiper(".slide-content", {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        fade:'true',
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          dynamicBullets: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints:{
          0:{
            slidesPerView:1,

          },
          520:{
            slidesPerView:2,

          },
          950:{
            slidesPerView:3,

          },
        },
      });
    </script>
  @include('layout.layouts.footer')
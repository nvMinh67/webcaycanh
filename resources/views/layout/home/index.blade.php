@include('layout.layouts.default')
@include('layout.layouts.header')
<!-- <div class="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="assets/image/about/slider1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="assets/image/about/slider2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="assets/image/about/slider3.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div> -->
    <section class="hero-area">
    <div class="">
        <div class="row">
          <div class="col-lg-8 col-12 custom-padding-right">
            <div class="slider-head">
              @foreach($pros as $pro) 
              <div class="hero-slider">
                <div
                  class="single-slider"
                  style="
                    background-image: url({{$pro->image}});
                  "
                >
               
               
                  <div class="content">
                    <h2>
                      <span>No restocking fee ($35 savings)</span>
                      {{$pro->name}}
                    </h2>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur elit, sed do
                      eiusmod tempor incididunt ut labore dolore magna aliqua.
                    </p>
                    <h3><span style="color:black;">Now Only</span>{{$pro->price-($pro->price * $pro->level)}} VND</h3>
                    <div class="button">
                      <a href="product-grids.html" class="btn">Shop Now</a>
                    </div>
                  </div>
                </div>
               @endforeach

                <!-- <div
                  class="single-slider"
                  style="
                    background-image: url(assets/image/about/slider3.jpg);
                  "
                > -->
                  <!-- <div class="content">
                    <h2>
                      <span>Big Sale Offer</span>
                      Get the Best Deal on CCTV Camera
                    </h2>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur elit, sed do
                      eiusmod tempor incididunt ut labore dolore magna aliqua.
                    </p>
                    <h3><span>Combo Only:</span> $590.00</h3>
                    <div class="button">
                      <a href="product-grids.html" class="btn">Shop Now</a>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>

                
         
          <div class="col-lg-4 col-12">
            <div class="row">
              <div class="col-lg-12 col-md-6 col-12 md-custom-padding ">
              @foreach ($pronew as $pro )
              <div class="hero-slider">

                <div
                    class="hero-small-banner "
                    style="
                      background-image: url('{{$pro->image}}');
                    "
                  >
                    <div class="content">
                      <h2>
                        <span>New line required</span>
                        {{$pro->name}}
                      </h2>
                      <h3>{{$pro->price}} VND</h3>
                    </div>
                  </div>
                </div>
                
              </div>
              @endforeach
              <div class="col-lg-12 col-md-6 col-12">
              @foreach ($prow as $pro )
                <div class="hero-small-banner style2" style="background-image: url('{{$pro->image}}');
                ">
                  <div class="content">
                    <h2 style="color:black;">Weekly Sale!</h2>
                    <p style="color:black;">
                      Saving up to 50% off this items on this week.
                    </p>
                    <div class="button " >
                      <a class="btn" style="background-color:rgba(0,0,0,0);" href="product-grids.html">Shop Now</a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="content  ">
      <div class="container position ">
        <div class="row">
          <div class="col-12 ">

          <div class="section-title">
              <h2>Best Seller</h2>
              <p>
                There are many variations of passages of Lorem Ipsum available,
                but the majority have suffered alteration in some form.
              </p>
            </div>
    
            <div class="content ">
              <div class="container">
              <div class="row">
   @foreach ($product as $pro)
      @if($pro->product->level == 0 ) 
          <div class="col-lg-3 col-md-6 col-6">
            <div class="itemlist">
              <div class="item-img">
                <a href="{{route('home.detail', ['id' => $pro->product->id,'slug'=>$pro->product->slug ]) }}">  <img src="{{$pro->product->image}}"
                 alt="" class="item-picture"></a>
             
                 <span class="new-tag">NEW</span>
                 
               
                  @if($pro->product->amount <= 0 )
                  <span class="sold-out-tag">Sold-Out</span>
                   @else
                   <form  id="add-to-cart-form-h">
                    @csrf
                <input type="hidden" value="{{$pro->product->id}}" class="cart_product_id_{{$pro->product->id}}">
                <input type="hidden" value="{{$pro->product->name}}" class="cart_product_name_{{$pro->product->id}}">
                <input type="hidden" value="{{$pro->product->image}}" class="cart_product_image_{{$pro->product->id}}">
                <input type="hidden" value="{{$pro->product->price}}" class="cart_product_price_{{$pro->product->id}}">
                <input type="hidden" value="{{$pro->product->level}}" class="cart_product_level_{{$pro->product->id}}">
                 </a>
                {{-- <button class="btn btn-default add-to-cart" data-id_product="{{$pro->id}}" name="add-to-cart">Thêm giỏ hàng</button> --}}
                
              </form>
                    <div class="btn-buy ">
                      <button form="add-to-cart-form-h" type="button" data-id_product="{{$pro->product->id}}" value="{{$pro->product->id}}" class="add-to-cart-product-home btn btn-buy1 btn-primary"><i class="icon-cart header_cart_icon fa-solid fa-cart-shopping"></i>Add to cart</button>
                      
                      </div>
                  @endif
             
              </div>
              <div class="item-content">
                <h3 class="item-name">{{$pro->product->name}}</h3>
                <div class="item-price">
                  <span class="price"> {{number_format($pro->product->price)}}  VND</span>
                  <span class="old-price"></span>
                 
                </div>
              </div>
            </div>
         </div>
         @else 
          <div class="col-lg-3 col-md-6 col-6">
            <div class="itemlist">
              <div class="item-img">
                <a href="{{route('home.detail', ['id' => $pro->product->id,'slug'=>$pro->product->slug ]) }}">
                  <img src="{{$pro->product->image}}"alt="" class="item-picture">

                </a>
                
                 <span class="sale-tag">-{{$pro->product->level*100 }}%</span>
                 
               
                  @if($pro->product->amount <= 0 ) 
                  <span class="sold-out-tag">Sold-Out</span>
                   @else 
                   <form  id="add-to-cart-form-home">
                    @csrf
                <input type="hidden" value="{{$pro->product->id}}" class="cart_product_id_{{$pro->product->id}}">
                <input type="hidden" value="{{$pro->product->name}}" class="cart_product_name_{{$pro->product->id}}">
                <input type="hidden" value="{{$pro->product->image}}" class="cart_product_image_{{$pro->product->id}}">
                <input type="hidden" value="{{$pro->product->price}}" class="cart_product_price_{{$pro->product->id}}">
                <input type="hidden" value="{{$pro->product->level}}" class="cart_product_level_{{$pro->product->id}}">
                 </a>
                {{-- <button class="btn btn-default add-to-cart" data-id_product="{{$pro->id}}" name="add-to-cart">Thêm giỏ hàng</button> --}}
                
              </form>
              
                    <div class="btn-buy">
                      <button form="add-to-cart-form-home" type="button" data-id_product="{{$pro->product->id}}" value="{{$pro->product->id}}" class="add-to-cart-product-home btn btn-buy1 btn-primary"><i class="icon-cart header_cart_icon fa-solid fa-cart-shopping"></i>Add to cart</button>
                      </div>
                     @endif 
             
              </div>
              <div class="item-content">
                <h3 class="item-name"><?= $pro->product->name; ?></h3>
                <div class="item-price">
                  <span class="price"> {{number_format($pro->product->price-($pro->product->price*$pro->product->level))}}   VND</span>
                  <span class="old-price">{{number_format($pro->product->price)}} VND</span>
                </div>
              </div>
            </div>
          </div>
        @endif 
 
            
         @endforeach
  </div>
              
              </div>
            </div>
            
    
          </div>
        </div>

      
      </div>
</div>
      <section class="banner section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12">
            @foreach($prow as $pro)
            <div
              class="single-banner"
              style="
                background-image: url({{asset($pro->image)}});
              "
            >
              <div class="content">
                <h2>{{$pro->name}}</h2>
                <p>
                  Space Gray Aluminum Case with <br />Black/Volt Real Sport Band
                </p>
          
              </div>
            </div>
            @endforeach
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            @foreach($pronew as $pro)
            <div
              class="single-banner custom-responsive-margin"
              style="
                background-image: url({{asset($pro->image)}});
              "
            >
              <div class="content">
                <h2>{{$pro->name}}</h2>
                <p>
                  Lorem ipsum dolor sit amet, <br />eiusmod tempor incididunt ut
                  labore.
                </p>
            
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <section class="special-offer section">
      <div class="container">
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
          <div class="col-lg-8 col-md-12 col-12">
            <div class="row">
             @foreach ($prof as $pro)
      
            @if($pro->product->level == 0 ) 
          <div class="col-lg-4 col-md-6 col-6">
            <div class="itemlist">
              <div class="item-img">
                <a href="{{url('/home/detail',['name' => $pro->name])}}">  <img src="{{$pro->product->image}}"
                 alt="" class="item-picture"></a>
             
                 <span class="new-tag">NEW</span>
                 
               
                  @if($pro->product->amount <= 0 )
                  <span class="sold-out-tag">Sold-Out</span>
                   @else
                    <div class="btn-buy">
                      <button form="add-to-cart-form-h" type="button" data-id_product="{{$pro->product->id}}" value="{{$pro->product->id}}" class="add-to-cart-product-home btn btn-buy1 btn-primary"><i class="icon-cart header_cart_icon fa-solid fa-cart-shopping"></i>Add to cart</button>
                      
                      </div>
                  @endif
             
              </div>
              <div class="item-content">
                <h3 class="item-name">{{$pro->product->name}}</h3>
                <div class="item-price">
                  <span class="price"> {{$pro->product->price}}  vnd</span>
                  <span class="old-price"></span>
                 
                </div>
              </div>
            </div>
         </div>
         @else 
          <div class="col-lg-4 col-md-6 col-6">
            <div class="itemlist">
              <div class="item-img">
                <a href="{{url('/home/detail',['name' => $pro->name])}}">
                  <img src="{{$pro->product->image}}"alt="" class="item-picture">

                </a>
                
                 <span class="sale-tag">-{{$pro->product->level*100 }}%</span>
                 
               
                  @if($pro->product->amount <= 0 ) 
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
                <h3 class="item-name"> {{$pro->product->name}}</h3>
                <div class="item-price">
                  <span class="price"> {{$pro->product->price-($pro->product->price*$pro->product->level)}}   VND</span>
                  <span class="old-price">{{$pro->product->price}}</span>
                 
                </div>
              </div>
            </div>
          </div>
        @endif 
 
            
         @endforeach

     
 
            
     
    
            </div>
            @foreach ($prof1 as $pro)
     

            <div
              class="single-banner right"
              style="
                background-image: url('{{$pro->product->image}}');
                margin-top: 30px;
              "
            >
              <div class="content">
                <h2> {{$pro->product->name}}</h2>
                <p>
                  Lorem ipsum dolor sit amet, <br />eiusmod tempor incididunt ut
                  labore.
                </p>
                <div class="price" style="color: #12b127">
                  <span style="color: #12b127;">{{$pro->product->price-($pro->product->price*$pro->product->level)}}  VND</span>
                </div>
                <div class="button">
                  <div class="btn add-to-cart-product-home" 
                  type="button" data-id_product="{{$pro->product->id}}"
                   value="{{$pro->product->id}}"
                    form="add-to-cart-form-h" >Shop Now</div>
                </div>
              </div>
            </div>
            @endforeach 
          </div>
          @foreach ($prof2 as $pro)
          <div class="col-lg-4 col-md-12 col-12">
            <div class="offer-content">
              <a href="{{route('home.detail',['name' => $pro->product->name,'i' => $pro->product->id])}}">
                <div class="image">
                  <img src="{{$pro->product->image}}" alt="#" />
                  <span class="sale-tag">-{{$pro->product->level*100}}%</span>
                </div>

              </a>
              <div class="text">
                <h1 style="font-weight: 800;">{{$pro->product->name}}</h1>
        
                <div class="price" >
                  <span style="color: #12b127;">{{$pro->product->price-($pro->product->price*$pro->product->level)}} VND</span>
                  <span class="discount-price">{{$pro->product->price}}  VND</span>
                </div>
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry incididunt ut eiusmod tempor labores.
                </p>
              </div>
              {{-- <div class="btn-buy">
                <button form="add-to-cart-form-h" type="button"
                 data-id_product="{{$pro->id}}"
                   value="{{$pro->id}}"
                    class="add-to-cart-product-home btn btn-buy1 btn-primary">
                    <i class="icon-cart
                     header_cart_icon
                     fa-solid fa-cart-shopping">
                      </i>Add to cart
                    </button>
                </div> --}}
      
              <!-- <div style="background: rgb(204, 24, 24)" class="alert">
                <h1 style="padding: 50px 80px; color: white">
                  We are sorry, Event ended !
                </h1>
              </div> -->
            </div>
            
      
       
          </div>
          @endforeach 
        </div>
      </div>
    </section>
   
   
   
    </div>

    

    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12 ">

            <div class="section-title">
              <h2>New Arrival</h2>
              <p>
                There are many variations of passages of Lorem Ipsum available,
                but the majority have suffered alteration in some form.
              </p>
            </div>
    
          </div>
        </div>
  
     </div>
     <div class="content mt--15">
       <div class="container">
        <div class="row">
        @foreach ($pron as $pro) 
          <div class="col-lg-3 col-md-6 col-6">
            <div class="itemlist">
              <div class="item-img">
                  <a href="{{route('home.detail', ['id' => $pro->id])}}">

                    <img src="{{ $pro->image}}" alt="" class="item-picture">
                  </a>
               
                 <div class="btn-buy">
                  <button form="add-to-cart-form-h" type="button" data-id_product="{{$pro->id}}" value="{{$pro->id}}" class="add-to-cart-product-home btn btn-buy1 btn-primary"><i class="icon-cart header_cart_icon fa-solid fa-cart-shopping"></i>Add to cart</button>
                  
                 </div>
             
              </div>
              <div class="item-content">
                <h3 class="item-name">{{$pro->name}}</h3>
                <div class="item-price">
                  <span class="price">{{$pro->price}} VND</span>
                  <span class="old-price"></span>
                 
                </div>
              </div>
            </div>
            

          </div>
          @endforeach
      
        </div>

       </div>
     </div>
     <div class="container">

     </div>
     <!-- <div class="image mt-60">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-8">
     <img class="img-resize" src="assets/image/about/image1.jpg" alt="" >
        </div>
        <div class="col-lg-4 col-md-4 col-4">
      <img class="img-resize" src="assets/image/about/image2.jpg" alt="" >

        </div>


      </div>
     

    </div>
    <div class="image2 mt-15">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-4">
     <img class="img-resize" src="assets/image/about/image4.jpg" alt="" >
        </div>
        <div class="col-lg-8 col-md-8 col-8">
      <img class="img-resize" src="assets/image/about/image33.jpg" alt="" >

        </div>


      </div>
      

    </div> -->
    <section class="shipping-info">
      <div class="container">
        <ul>
          <li>
            <div class="media-icon">
              <i class="fa-solid fa-truck-fast"></i>
            </div>
            <div class="media-body">
              <h5>Free Shipping</h5>
              <span>On order over $99</span>
            </div>
          </li>

          <li>
            <div class="media-icon">
              <i class="fa-solid fa-phone"></i>
            </div>
            <div class="media-body">
              <h5>24/7 Support.</h5>
              <span>Live Chat Or Call.</span>
            </div>
          </li>

          <li>
            <div class="media-icon">
              <i class="fa-regular fa-credit-card"></i>
            </div>
            <div class="media-body">
              <h5>Online Payment.</h5>
              <span>Secure Payment Services.</span>
            </div>
          </li>

          <li>
            <div class="media-icon">
              <i class="fa-sharp fa-solid fa-rotate-left"></i>
            </div>
            <div class="media-body">
              <h5>Easy Return.</h5>
              <span>Hassle Free Shopping.</span>
            </div>
          </li>
        </ul>
      </div>
    </section>

  
       

     </div>






<!-- Chèn script vào vị trí section("js") trong layout default -->

<script>
    window.addEventListener('scroll', function(){
      let  headerl = document.querySelector('.header');
      let windowposition = window.scrollY>0;
     headerl.classList.toggle('scrolling-active',windowposition);
   })
 </script>
<script type="text/javascript">
      //========= Hero Slider
      tns({
        container: ".hero-slider",
        slideBy: "page",
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 0,
        items: 1,
        nav: false,
        controls: true,
        controlsText: [
          '<i class="fa-solid fa-angle-left"></i>',
          '<i class="fa-solid fa-angle-right"></i>',
        ],
      });

      //======== Brand Slider
      tns({
        container: ".brands-logo-carousel",
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 15,
        nav: false,
        controls: false,
        responsive: {
          0: {
            items: 1,
          },
          540: {
            items: 3,
          },
          768: {
            items: 5,
          },
          992: {
            items: 6,
          },
        },
      });
    </script>
    @include('layout.layouts.footer')


@include('layout.layouts.default')

@include('layout.layouts.header')
  <section>

            <div class="body-content mt-100  ">
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <div class="content-single">
                      <h3 class="content-title">Product-list</h3>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                    <ul class="content-nav">
                        <li><a href="index.html"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li><a href="index.html">Shop</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li><a href="index.html">Product-list</a></li>
                    </ul>
                </div>
              </div> 
            </div>   
          </section> 
        </div>
    
    
      </section>
<section class="product-grids section ">
  <div class="container">
     <div class="row">
      <div class="col-lg-3 col-12 mt-30">
        <div class="product-sidebar">
          <div class="single-widget search">
                <h3>Search Product</h3>
                <form action="#">
                    <input type="text" id="search_bar" placeholder="Search Here..." />
                    <button type="submit">
                      <i class="fa-solid fa-magnifying-glass"></i>

                    </button>
                  </form>
          </div>
          <div class="single-widget range">
                  <h3>Price Range</h3>
                  <input
                    id="rangePrimary1"
                    type="range"
                    class="form-range"
                    name="range"
                    step="1"
                    min="10000"
                    max="100000"
                    value="10"
                    onchange="rangePrimary.value=value"
                  />
                  <div class="range-inner">
                  <label></label>
                    
                    <input type="number" id="rangePrimary" placeholder="10000" />
                   
                  </div>
                </div>
                <div class="single-widget condition">
                <h3>Filter by Price</h3>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value="1"
                    id="flexCheckDefault1"
                  />
                  <label class="form-check-label" for="flexCheckDefault1">
                    10000 - 40000
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault2"
                  />
                  <label class="form-check-label" for="flexCheckDefault2">
                  40000 - 80000
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault3"
                  />
                  <label class="form-check-label" for="flexCheckDefault3">
                  80000 - 120000
                  </label>
                </div>
                <!-- <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault4"
                  />
                  <label class="form-check-label" for="flexCheckDefault4">
                    $1,000 - $5,000 (213)
                  </label>
                </div> -->
              </div>

          </div>
        </div>
 
    
      <div class="col-lg-9">
        <div id="serch-defalt">
        <div class="col-lg-12">
          <div id="product-list">
            <div class="row">
                @foreach ($product as $pro) 
                  @if($pro->amount <= 0 )
            
                   @endif 
                  @if($pro->level == 0 ) 
                      <div class="col-lg-3 col-md-6 col-12">
                        <div class="itemlist">
                          <div class="item-img">
                            <a href="">  <img src="/{{$pro->image}}"
                             alt="" class="item-picture"></a>
                         
                             <span class="new-tag">NEW</span>
                                @if($pro->amount <= 0 )
                              <span class="sold-out-tag">Sold-Out</span>
                              
                              
                                 @else 
                                <div class="btn-buy">
                                  <form  id="add-to-cart-form">
                                    @csrf
                                <input type="hidden" value="{{$pro->id}}" class="cart_product_id1_{{$pro->id}}">
                                <input type="hidden" value="{{$pro->name}}" class="cart_product_name1_{{$pro->id}}">
                                <input type="hidden" value="{{$pro->image}}" class="cart_product_image1_{{$pro->id}}">
                                <input type="hidden" value="{{$pro->price}}" class="cart_product_price1_{{$pro->id}}">
                               
                                <input type="hidden" value="{{$pro->level}}" class="cart_product_level1_{{$pro->id}}">
                                
                                {{-- <button class="btn btn-default add-to-cart" data-id_product="{{$pro->id}}" name="add-to-cart">Thêm giỏ hàng</button> --}}
                                
                              </form>
                                  <button type="button" form="add-to-cart-form" data-id_product="{{$pro->id}}" value="{{$pro->id}}" class="add-to-cart-product btn btn-buy1 btn-primary"><i class="icon-cart header_cart_icon fa-solid fa-cart-shopping" ></i>Add to cart</button>
                                  
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
                      <div class="col-lg-3 col-md-6 col-12">
                        <div class="itemlist">
                          <div class="item-img">
                            <a href="">
                              <img src="/{{$pro->image}}"alt="" class="item-picture">
            
                            </a>
                            
                             <span class="sale-tag">-{{$pro->level*100}}%</span>
                             @if($pro->amount <= 0 ) 
                              <span class="sold-out-tag">Sold-Out</span>
                              @else 
                              <form  id="add-to-cart-form-1">
                                @csrf
                            <input type="hidden" value="{{$pro->id}}" class="cart_product_id1_{{$pro->id}}">
                            <input type="hidden" value="{{$pro->name}}" class="cart_product_name1_{{$pro->id}}">
                            <input type="hidden" value="{{$pro->image}}" class="cart_product_image1_{{$pro->id}}">
                            <input type="hidden" value="{{$pro->price}}" class="cart_product_price1_{{$pro->id}}">
                            <input type="hidden" value="{{$pro->level}}" class="cart_product_level1_{{$pro->id}}">
                            
                            {{-- <button class="btn btn-default add-to-cart" data-id_product="{{$pro->id}}" name="add-to-cart">Thêm giỏ hàng</button> --}}
                            
                          </form>
                                <div class="btn-buy">
                                  <button type="button" form="add-to-cart-form-1" data-id_product="{{$pro->id}}" value="{{$pro->id}}" class="add-to-cart-product-1 btn btn-buy1 btn-primary"><i class="icon-cart header_cart_icon fa-solid fa-cart-shopping" ></i>Add to cart</button>
                                  
                                </div>
                                @endif 
                         
                          </div>
                          <div class="item-content">
                            <h3 class="item-name"> {{$pro->name}}</h3>
                            <div class="item-price">
                              <span class="price"> {{$pro->price-($pro->price*$pro->level)}} vnd</span>
                              <span class="old-price">{{$pro->price}}  vnd </span>
                             
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif 
             
                        
                      @endforeach
              </div>
        
        </div>

          </div>
          <div class="mt-40 col-lg-12 col-md-12 col-12" id="paginate-old">
            {{$product->links('layout.partials.pagination1')}}
          </div>
       
</div>
      
        
        <div class="row" id="result">

        </div>
      </div>
      
     </div>
  </div>
  @push('scripts')


  @endpush
  

</section>



    
      

      <script>
        $(document).ready(function(){
        
          $('#rangePrimary1').change(function(){
            var price_value = $(this).val();
            console.log(price_value);
            $.ajax({
             url:'/getprice',
             type:'GET',
             data:{
              price_value:price_value
             },
             dataType:'json',
             success:function(html){
              
                  
              
              
                     
                      // for (var pro of data){
                      
    
                      // _html += '<div class="col-lg-3 col-md-6 col-12">';
                      // _html += '<div class="itemlist">';
                      // _html +=  '<div class="item-img">';
                      // _html += '<img src="" class="item-picture" alt="">';
                  
                
                      // _html +=  '<div class="btn-buy">';
                      // _html += '<a href="">';
                      // _html +=  '<button class="btn btn-buy1 btn-primary">';
                      // _html +=  '<i class="icon-cart header_cart_icon fa-solid fa-cart-shopping">';
                          
                      // _html +=  '</i>  add to cart</button></a>';
                    
                      // _html +=  '</div>';
              
                      // _html +=  '</div>';
                      // _html += '<div class="item-content">';
                      // _html += '<h3 class="item-name"></h3>';
                      // _html += '<div class="item-price">';
                      // _html += '<span class="price"> vnd</span>';
                      // _html += '<span class="old-price">''vnd</span>';
                  
                      // _html +=  '</div>';
                      // _html +=  '</div>';
                
                      // _html +=  '</div>';
                      // _html +=  '</div>';
              
    
                      


      
                      // }
                      
                    //   $('#result').show();
                    //   $('#result').html(_html);
              
                    $('#serch-defalt').hide();
              // $('#result').show(500);
              $('#result').html(html.html);
             }
            });
            




          })



         
         


        });
      </script>

     





@include('layout.layouts.footer')
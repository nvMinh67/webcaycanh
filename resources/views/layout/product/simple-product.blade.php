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
<div class="mt-40">
  {{$product->links('layout.partials.pagination1')}}
</div>
<script>
  $('.add-to-cart-product').click(function(){
                            var id = $(this).data('id_product');
                            
                                var cart_product_id=$('.cart_product_id1_'+id).val();
                                var cart_product_name = $('.cart_product_name1_'+id).val();
                                var cart_product_image = $('.cart_product_image1_'+id).val();
                                var cart_product_price = $('.cart_product_price1_'+id).val();
                                var cart_product_level = $('.cart_product_level1_' + id).val();
                                var _token = $('input[name="_token"]').val();
                                
                                
                            
                        $.ajax({
                                url: '{{url('add-to-cart-ajax')}}',
                                method:'GET',
                                data:{
                                            cart_product_id:cart_product_id,
                                            cart_product_name:cart_product_name,
                                            cart_product_image:cart_product_image,
                                            cart_product_price:cart_product_price,
                                            cart_product_level:cart_product_level,
                                            _token:_token
                                        },
                                dataType:'json',
                                success:function($data){

                            
                                $('#total_item').html($data.total);
                            
                                $('.cart_bar').html($data.cart);

                                },
                                    });
                                });
</script>
  @extends('layout.js.adminscript')

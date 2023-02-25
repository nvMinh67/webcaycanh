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
<div class="col-lg-12">
    <div class="row">
        @foreach ($product as $pro) 
            @if($pro->amount <= 0 ) 
          @endif
          @if($pro->level == 0 )
              <div class="col-lg-3 col-md-6 col-12">
                <div class="itemlist">
                  <div class="item-img">
                    <a href="">  <img src="{{asset($pro->image)}}"
                     alt="" class="item-picture"></a>
                     <span class="new-tag">NEW</span>
                     @if($pro->amount <= 0 )
                      <span class="sold-out-tag">Sold-Out</span>
                      @else
                        <div class="btn-buy">
                          <a href=""> <button class="btn btn-buy1 btn-primary"><i class="icon-cart header_cart_icon fa-solid fa-cart-shopping"></i>  add to cart</button></a>
                        </div>
                        @endif 
                  </div>
                  <div class="item-content">
                    <h3 class="item-name">{{$pro->name}}</h3>
                    <div class="item-price">
                      <span class="price"> {{$pro->price}}   vnd</span>
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
                      <img src="{{asset($pro->image)}}"alt="" class="item-picture">
    
                    </a>
                    
                     <span class="sale-tag">-{{$pro->level*100}} %</span>
                     @if($pro->amount <= 0 ) 
                      <span class="sold-out-tag">Sold-Out</span>
                      
                      
                      @else 
                        <div class="btn-buy">
                          <a href=""> <button class="btn btn-buy1 btn-primary"><i class="icon-cart header_cart_icon fa-solid fa-cart-shopping"></i>  add to cart</button></a>
                          
                        </div>
                        @endif
                 
                  </div>
                  <div class="item-content">
                    <h3 class="item-name">{{$pro->name}}</h3>
                    <div class="item-price">
                      <span class="price">{{$pro->price-($pro->price*$pro->level)}}  vnd</span>
                      <span class="old-price">{{$pro->price}} vnd </span>
                     
                    </div>
                  </div>
                </div>
              </div>
              @endif 
              @endforeach
      </div>

</div>
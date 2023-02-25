  <div class="header" >  
        <div class="container ">
          
          <ul class="row align-items-center d-in">
            <li class="col-lg-1 d1 ">
              <div class="top-start ">
                <label for="nav-mobile-input" class="nav-bar-btn">
                  <i class=" fa-solid fa-bars icon-close"></i>
                </label>
                <input type="checkbox" name="" class="nav-input" id ="nav-mobile-input">
                <label for="nav-mobile-input" class="overlay"></label>
                <div class="nav-mobile">
                  <label for="nav-mobile-input" class="nav_mobile-close">
                    <i class=" icon-close fa-solid fa-xmark"></i>
                  </label>
                  
    
                  <ul class="nav_mobile-list mt-40">
                  
                    <li><a  class="nav_mobile-list-link" href="index.html">Home</a></li>
                    <li><a  class="nav_mobile-list-link" href="Product-list.html">Product</a></li>
                    <li><a  class="nav_mobile-list-link" href="contact.html">Contact Us</a></li>
                    <li><a  class="nav_mobile-list-link" href="login.html">Login</a></li>
                    <li><a  class="nav_mobile-list-link" href="register.html">Register</a></li>
                    
                  </ul>
                </div>
              </div>

            </li>
        

            <li class="col-lg-8 col-md-6 col-6 d2">
              <!-- <div class="nav-bar-btn">
                <i class=" fa-solid fa-bars"></i>
              </div> -->
            
              <div class="top-middle">
            
                <ul class="useful-links">
              
                <li><a href="{{ url('/')}}">Home</a></li>
                <li><a href="{{ url('/home/product')}}">Product</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                  </ul>

              </div>
            </li>  
              <li class="col-lg-3 col-md-6 col-lg-3 d3">
                <div class="top-end">
                  @if(auth()->user())
                  
                
                  
              
                
                  <div class="nav-user">
                    <div class="user">
                      <i class="icon-user fa-solid fa-user"></i>
                      Hello {{auth()->user()->username}}
                    </div>
                    <ul class="user-login">
                      <li>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        Sign Out
                        </a>
                    </li>
                      <li>
                      @php $sum=0; @endphp
                      @if (Session::get('cart')) 
                        @php $carts = Cart::content(); @endphp
                        @foreach($carts as $pro)
                        @php $result = $pro->qty; @endphp
                        @php $sum += $result @endphp
                        @endforeach 
                      @else
                          @php $sum =0; @endphp
                    @endif
                    <div class="cart_bar">
                      <div class="shopping_cart" >
                        <div class="cart-bar">
                          <i class="header_cart_icon fa-solid fa-cart-shopping">
                            <div class="shopping_cart-number"><span id="total_item"><h4>{{$sum}}</h4></span></div>
                          </i>
                          <div class="header_cart-list ">
                            <div class="header_cart-list-header pesu">
                              <div class="row">
                                <div class="col-6">
                                  <span class="list_cart-total">
                                  {{ $sum}} items
        
                                  </span>
                                </div>
                                <div class="col-6">
                                  <span class="list_cart-total">
                                    view cart
        
                                  </span>
                                </div>
                              </div>
                              
        
                            </div>
                            @php $sum=0; @endphp
                            @if (Session::get('cart')) 
                            @php $carts = Cart::content(); @endphp
                            @foreach($carts as $pro)
                            <div class="header_cart-list-body mt-30">
                              <div class="row">
                              <div class="col-4">
                                <div class="img-picture">
                                  <img src="{{asset($pro->options->image)}}" alt="">
        
                                </div>
                              </div>
                              <div class="col-6">
                              <div class="content_cart-list ">
                                <div class="cart-list-name">
                                  <span>{{$pro->name}}</span>
                                </div>
                                <div class="cart-list-count">
                                  <span>{{$pro->qty}}</span>
                                </div>
                                <div class="cart-list-price">
                                  {{$pro->price}}
                                </div>
        
                              </div>
                                </div>
                                <div class="col-2">
                                  <div type="button" data-id_product="{{$pro->rowId}}" value="{{$pro->rowId}}" type="button" class="delete-cart cart_body-icon">
                                    <i class="fa-solid fa-circle-xmark icon-close"></i>
                                
                                </div>
                                </div>
                              </div>
                              
                            </div>
                            @endforeach
                            <div class="header_cart-list-footer mt-40  ">
                              <a href="{{ url('/home/shopping')}}"><button class="btn btn-primary btn-buy1">check out</button></a>
                            </div>
        
                            @else 
                            <div class="header_cart-list-body mt-30">
                              <div class="row">
                                <img style="height: 100px;" src="https://fansport.vn/default/template/img/cart-empty.png" alt="">
                              
                              
                                  
                              </div>
                              
                            </div>
                            
                
                          
                            @endif
                          </div>
  
                        </div>
                      </div>

                    </div>
                  
              
                      </li>
                    </ul>

                  </div>
                  
              
                  

                  
                    
          
              

                  </div>
                  
                
            

              @else
                  <div class="nav-user">
                    <div class="user">
                      <i class="icon-user fa-solid fa-user"></i>
                      Hello 
                    </div>
                    <ul class="user-login">
                  
                      <li class="login-title ">
                        <a href="{{ url('/home/login')}}">Sign In</a>
                      </li>
                      <li class="login-title ">
                        <a href="{{ url('home/register')}}">Register</a>
                      </li>
                      <li>
                      @php $sum=0; @endphp
                      @if (Session::get('cart')) 
                          @php $carts = Cart::content(); @endphp
                        @foreach($carts as $pro)
                          @php $result = $pro->qty; @endphp
                        @php $sum += $result @endphp
                        @endforeach
                        
                        @else
                          @php $sum =0; @endphp
                    @endif
                    <div class="cart_bar">
                      <div class="shopping_cart">
                        <i class="header_cart_icon fa-solid fa-cart-shopping">
                          <div class="shopping_cart-number"><span id="total_item"> <h4>{{$sum}}</h4> </span></div></i>
                        <div class="header_cart-list ">
                          <div class="header_cart-list-header pesu">
                            <div class="row">
                              <div class="col-6">
                                <span class="list_cart-total">
                                {{ $sum}} items
      
                                </span>
                              </div>
                              <div class="col-6">
                                <span class="list_cart-total">
                                  view cart
      
                                </span>
                              </div>
                            </div>
                            
      
                          </div>
                          @php $sum=0; @endphp
                          @if (Session::get('cart')) 
                          @php $carts = Cart::content(); @endphp
                          @foreach($carts as $pro)
                          <div class="header_cart-list-body mt-30">
                            <div class="row">
                            <div class="col-4">
                              <div class="img-picture">
                                <img src="{{asset($pro->options->image)}}" alt="">
      
                              </div>
                            </div>
                            <div class="col-6">
                            <div class="content_cart-list ">
                              <div class="cart-list-name">
                                <span>{{$pro->name}}</span>
                              </div>
                              <div class="cart-list-count">
                                <span>{{$pro->qty}}</span>
                              </div>
                              <div class="cart-list-price">
                              
                                {{number_format(($pro->price-($pro->price*$pro->weight)))}} VND
                              </div>
      
                            </div>
                              </div>
                              <div class="col-2">
                                <div type="button" data-id_product="{{$pro->rowId}}" value="{{$pro->rowId}}" type="button" class="delete-cart cart_body-icon">
                                    <i class="fa-solid fa-circle-xmark icon-close"></i>
                                
                                </div>
                              </div>
                            </div>
                            
                          </div>
                          @endforeach
                          <div class="header_cart-list-footer mt-40  ">
                            <a href="{{ url('/home/shopping')}}"><button class="btn btn-primary btn-buy1">check out</button></a>
                          </div>
      
                          @else 
                          <div class="header_cart-list-body mt-30">
                            <div class="row">
                            <div class="col-4">
                              <div class="img-picture">
                                <img src="" alt="">
      
                              </div>
                            </div>
                            <div class="col-6 mt-20">
                            <div class="content_cart-list ">
                              <div class="cart-list-name">
                                <span></span>
                              </div>
                              <div class="cart-list-count">
                                <span></span>
                              </div>
                              <div class="cart-list-price">
                          
                              </div>
      
                            </div>
                              </div>
                              <div class="col-2">
                                
                            </div>
                            
                          </div>
                          
              
                        
                          @endif
                        </div>
                      </div>

                    </div>

                      </li>
                    </ul>

                  </div>
                  
              
                  

                  
                    
          
              

                  </div>
                  
                
            

                </li>
                @endif
                </li>


                
            

              </ul>
      
        </div>
      </div>
      <script>
      window.addEventListener('scroll', function(){
        let  headerl = document.querySelector('.header');
        let windowposition = window.scrollY>0;
      headerl.classList.toggle('scrolling-active',windowposition);
    })
  </script>

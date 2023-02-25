@include('layout.layouts.default')

@include('layout.layouts.header')


          <div class="body-content mt-100 ">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <div class="content-single">
                    <h3 class="content-title">Register</h3>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <ul class="content-nav">
                      <li><a href="index.html"><i class="fa-solid fa-house"></i> Home</a></li>
                      <li><i class="fa-solid fa-angle-right"></i></li>
                      <li><a href="index.html">Shop</a></li>
                      <li><i class="fa-solid fa-angle-right"></i></li>
                      <li><a href="index.html"> Register</a></li>
                  </ul>
              </div>
            </div> 
          </div>   
        </section> 
      </div>
    </section>



  
     
    <div class="login">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 offset-lg-2 col-md-10 col-12">
          <form action="{{route('store.register')}}" method="POST" class="login-form" id="form-1">
            
          @csrf
            <div class="card-form">
              <div class="form-title">
                <h3>
                  {{_('Register')}}
                </h3>
              </div>
              <div class="form-group input-group">
                <label for="Userame" >{{_('Username')}}</label>
                <input type="text" id="username" name="Username" class="form-control" />
                @error('Username')
                <div class="form-message">
                <strong style="color: red">{{$message}}</strong>

                </div>
                @enderror

              </div>
             
             <div class="form-group input-group ">
                <label for="Email" >{{_('Email')}}</label>
                <input type="Email" id="email" name="Email" class="form-control"/>
                @error('Email')
                <div class="form-message">
                <strong style="color: red" >{{$message}}</strong>

                </div>
                @enderror
 
              </div>
            
              <div class="form-group input-group">
                <label for="Phone" >{{_('Phone')}}</label>
                <input type="text" id="Phone" name="Phone" class="form-control" />
                @error('Phone')
                <div class="form-message">
                <strong style="color: red" >{{$message}}</strong>

                </div>
                @enderror

              </div>

              <div class="form-group input-group">
                <label for="Password" >{{_('Password')}}</label>
                <input type="Password" id="Password" name="Password" class="form-control"  />
                @error('Password')
                <div class="form-message">
                <strong style="color: red" >{{$message}}</strong>

                </div>
                @enderror
 
              </div>

              <div class="form-group input-group">
                <label for="Confirm-password" >{{_('Confirm-password')}}</label>
                <input type="password" id="Confirm-password" name="Confirm-password" class="form-control" />
                @error('Confirm-password')
                <div class="form-message">
                <strong style="color: red">{{$message}}</strong>

                </div>
                @enderror

 
              </div>



              <div class="form-group input-group">
               
                <label for="city">City</label>
                     
                     <select class="form-control select_quantity" name="city" id = "city">
                     @foreach ($items as $item)
                        <option value="{{$item->id}}"> {{$item->name}}</option>
                        
                        
                        
                         @endforeach
                     </select>
              

 
              </div>
              <div class="form-group input-group">
                <label for="district" >District </label>
                <select class="form-control select_quantity" name="district" id = "district">
                     <option  value=""><option>
                     </select>

 
              </div>
              <div class="form-group input-group">
                <label for="ward" >Ward</label>
                <select class="form-control select_quantity" name="ward" id = "ward">
                     <option  value="" ><option>
                     </select>
          

 
              </div>

              <div class="form-group input-group">
                <label for="address1" >Address</label>
                <input type="text" id="address1" name="address1" class="form-control" />
          

 
              </div>

              
 

            </div>
            <div class="flex-wrap d-flex justify-content-between bottom-content">
              <div class="form-check">
            
                
                
              </div>
             
              </div>
              <div class="button">
              <button class="btn" type="submit" >Register</button>
             </div>
       
              </p>
            </div>


          </form>

        </div>
      </div>
    </div>
   
    <script>

 </script>

@include('layout.layouts.footer')

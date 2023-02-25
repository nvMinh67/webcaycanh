 


@include('layout.layouts.default')

@include('layout.layouts.header')


      




    
  <section>
            <div class="body-content mt-100 ">
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <div class="content-single">
                      <h3 class="content-title">Login</h3>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                    <ul class="content-nav">
                        <li><a href="index.html"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li><a href="index.html">Shop</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li><a href="index.html">Login</a></li>
                    </ul>
                </div>
              </div> 
            </div>   
          </section>    


  <div class="login ">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 offset-md-1 col-md-10 col-12">
            <form action="{{route('home.login')}}" method="post" class="login-form">
              @csrf
              <div class="card-form">
                <div class="form-title">
                  <h3>
                    login now
                  </h3>
                </div>
                <div class="form-group input-group">
                  <label for="name" >Username</label>
                  <input type="text" id="username" name="username" class="form-control" required
                  
                  />

                </div>
                <div class="form-group input-group">
                <label for="password" >Password</label>
                <input type="password" id="password" name="password" class="form-control" required
                
                />

              </div>

              </div>
              <div class="flex-wrap d-flex justify-content-between bottom-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input width-auto" id="login-check">
                  
                  <label for="login-check" class="form-check-label">Remember me</label>
                </div>
                <a href="" class="lost-pass">Forgot password</a>
                </div>
                <div class="button">
                  <button class="btn" type="submit">Login</button>
                </div>
                <p class="outer-link">
                  Don't have an account?
                  <a href="register.html">Register here </a>
                </p>
              </div>


            </form>

          </div>
        </div>
      </div>
      @include('layout.layouts.footer')
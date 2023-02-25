
    <!DOCTYPE html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>404</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

    
    
        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('/fonts/fontawesome-free-6.1.1-web/css/all.min.css')}}">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('/css/LineIcons.3.0.css')}}" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="{{asset('css/tiny-slider.css')}}" />
        <link rel="stylesheet" href="{{asset('css/glightbox.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/base2.css')}}" />
        <link rel="stylesheet" href="{{asset('css/main48.css')}}" />
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('image/favicon-32x32.png')}}">
        <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css"/>
    @extends('layout.js.script')
        

    
        <!-- insert specific page's css -->
    

    </head>

    <body>
       
        @include('layout.flash.flashview')
        

   
    <div class="error"style="height:600px;">
    
    <div class="container">
        <div class="error-content">
        <h1 style="font-size: 16rem;">404</h1>
        <h2>Oops! Page Not Found!</h2>

        <div class="button">
            <a href="{{url('/')}}" class="btn">Back to Home</a>
        </div>
        </div>


    </div>
    </div>

    
        <!--[if lte IE 9]>
        <p class="browserupgrade">
            You are using an <strong>outdated</strong> browser. Please
            <a href="https://browsehappy.com/">upgrade your browser</a> to improve
            your experience and security.
        </p>
        <![endif]-->

        <div class="preloader">
            <div class="preloader-inner">
                <div class="preloader-icon">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

        <!-- Header section -->

        


        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js
    ">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/tiny-slider.js')}}"></script>
        <script src="{{asset('js/glightbox.min.js')}}"></script>
        <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>

        <script src="{{asset('js/main2.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    </script>

        <!-- Thêm thông báo Flash messages -->

        <!-- insert specific page's scripts -->
        
    </body>

    </html>
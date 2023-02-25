

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{$title}}</title>
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

   
   
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="{{asset('css/tailwind.output.css')}}" />
  <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer
  ></script>
  <script src="{{asset('js/init-alpine.js')}}"></script>
 

   @extends('layout.js.script')
    

  
    <!-- insert specific page's css -->
   

</head>

<body>

  @include('layout.admin.model-edit')
    {{-- @include('layout.layouts.logout_modal')
    @include('layout.flash.flashview') --}}
  
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

    


    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     {{-- //<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script> --}}
    {{-- // <script src="{{asset('js/tiny-slider.js')}}"></script>
    // <script src="{{asset('js/glightbox.min.js')}}"></script> --}}
    
    
    
    <script src="{{asset('js/main2.js')}}"></script>
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>


    <!-- Thêm thông báo Flash messages -->

    <!-- insert specific page's scripts -->
    
</body>

</html>

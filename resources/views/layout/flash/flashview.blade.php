@if ($message = Session::get('success'))
<div style="z-index: 10000000111" class="alert alert-success alert-dismissible fade show toastr" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif 
    
@if ($message = Session::get('error'))
<div style="z-index: 10000000111" class="alert alert-danger alert-dismissible fade show toastr" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
     
@if  ($message = Session::get('warning'))
<div style="z-index: 10000000111 
" class="alert alert-warning alert-dismissible fade show toastr" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
     
@if  ($message = Session::get('info'))
<div style="z-index: 10000000111" class="alert alert-info alert-dismissible fade show toastr" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    
@if ($errors->any())
<div style="z-index: 100000001111" class="alert alert-danger alert-dismissible fade show toastr" role="alert">
  <strong>Please check the form below for errors</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    

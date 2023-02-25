<div class="cart-single-list mr-ct"  style="margin-right:-14px">
  @php $sum=0; $carts = Cart::content(); @endphp
  @foreach($carts as $pro)
  <div class="row align-items-center">
   <div class="col-lg-1 col-md-1 col-12">
    
       <img src="{{asset($pro->options->image)}}" alt="#"
     />
   </div>
   <div class="col-lg-4 col-md-3 col-12">
     <h5 class="product-name">
       <a href="product-details.html">
       {{$pro->name}}</a
       >
     </h5>
    
   </div>
   <div class="col-lg-3 col-md-2 col-12">
   <div class="count-input">
       <span>
         <form  id="addproductajax">
           @csrf
       <input type="hidden" value="{{$pro->id}}" class="cart_product_id_{{$pro->id}}">
       <input type="hidden" value="{{$pro->name}}" class="cart_product_name_{{$pro->id}}">
       <input type="hidden" value="{{$pro->options->image}}" class="cart_product_image_{{$pro->id}}">
       <input type="hidden" value="{{$pro->price}}" class="cart_product_price_{{$pro->id}}">
       <input type="hidden" value="1" class="cart_product_qty_{{$pro->id}}">
       <input type="hidden" value="{{$pro->weight}}" class="cart_product_level_{{$pro->id}}">
        </a>
       {{-- <button class="btn btn-default add-to-cart" data-id_product="{{$pro->id}}" name="add-to-cart">Thêm giỏ hàng</button> --}}
       
     </form>
   <form  id="subproductajax">
    @csrf
   <input type="hidden" value="{{$pro->id}}" class="cart_product_id_{{$pro->id}}">
   <input type="hidden" value="{{$pro->name}}" class="cart_product_name_{{$pro->id}}">
   <input type="hidden" value="{{$pro->options->image}}" class="cart_product_image_{{$pro->id}}">
   <input type="hidden" value="{{$pro->price}}" class="cart_product_price_{{$pro->id}}">
   <input type="hidden" value="1" class="cart_product_qty_{{$pro->id}}">
   <input type="hidden" value="{{$pro->weight}}" class="cart_product_level_{{$pro->id}}">
    </a>
   {{-- <button class="btn btn-default add-to-cart" data-id_product="{{$pro->id}}" name="add-to-cart">Thêm giỏ hàng</button> --}}
         </form>
         <div class="icon-quantity">
           <div form="addproductajax" type="button" class="add-to-cart btn-add-shopping" data-id_product="{{$pro->id}}" value="{{$pro->id}}" ><i id="icon-add" class="fa-solid fa-plus " style="color: black"></i>
           </div></div><div class="quantity"> 
           <h4 id="total_item_default">{{$pro->qty}}</h4>
           <h4 id="total_item_new"></h4>
         </div>
         <div class="icon-quantity">
             <div form="addproductajax1" type="button" class="add-to-cart1 btn-add-shopping" data-id_product="{{$pro->id}}" value="{{$pro->id}}" >
               <i class="fa-solid fa-minus" style="color: black"></i>

             </div>
       </div>
       </span>
       
     </div>
   </div>
   <div class="col-lg-3 col-md-2 col-12">
     <p>{{number_format($pro->qty*($pro->price-($pro->price*$pro->weight)))}} VND</p>
   </div>

   <div class="col-lg-1 col-md-2 col-12">
     <div value="{{$pro->rowId}}" data-id_product="{{$pro->rowId}}"  class="remove-item delete-cart" type="button" href="#" value="{{$pro->rowId}}"
       >
       <input type="hidden" value="{{$pro->rowId}}"><i class="fa-sharp fa-solid fa-xmark"  ></i></div>
   </div>
 </div>
 @php $result = $pro->price*$pro->qty;
 $sum += $result @endphp
 
   @endforeach

   <script>
       $('.add-to-cart').click(function(){
               

               var id = $(this).data('id_product');
               console.log(id);
               
               var cart_product_id = $('.cart_product_id_' + id).val();
               var cart_product_name = $('.cart_product_name_' + id).val();
               var cart_product_image = $('.cart_product_image_' + id).val();
               var cart_product_price = $('.cart_product_price_' + id).val();
               var cart_product_qty = $('.cart_product_qty_' + id).val();
               var cart_product_level = $('.cart_product_level_' + id).val();
               var _token = $('input[name="_token"]').val();
             
               $.ajax({
                   url: '{{url('add-cart-ajax-shopping')}}',
                   method: 'GET',
                   data:{cart_product_id:cart_product_id,
                       cart_product_name:cart_product_name,
                       cart_product_image:cart_product_image,
                       cart_product_price:cart_product_price,
                       cart_product_qty:cart_product_qty,
                       cart_product_level:cart_product_level,
                       _token:_token},
                   success:function($data){
                  $('#total_item').html($data.total)
                  $('#shopping-new').hide();
                  $('#shopping-defautl').html($data.data);
                  $('#total_item1').html($data.price);
                  $('.cart_bar').html($data.cart);
                 
               },
               error:function(error){
                       console.log(error);
                   }
           });
           

           })
           $('.add-to-cart1').click(function(){
               var id = $(this).data('id_product');
               var cart_product_id = $('.cart_product_id_'+id).val();
               var cart_product_name = $('.cart_product_name_'+id).val();
               var cart_product_image =$('.cart_product_image_'+id).val();
               var cart_product_price =$('.cart_product_price_'+id).val();
               var cart_product_qty =  $('#quantity').val();
               var cart_product_level = $('.cart_product_level_'+id).val();
               var _token = $('input[name="_token"]').val();
              
               $.ajax({
                   url: '{{url('sub-cart-ajax')}}',
                   method: 'GET',
                   data:{cart_product_id:cart_product_id,
                       cart_product_name:cart_product_name,
                       cart_product_image:cart_product_image,
                       cart_product_price:cart_product_price,
                       cart_product_qty:cart_product_qty,
                       cart_product_level:cart_product_level,
                      
                       _token:_token},
                    
                   success:function($data){
                  
                    $('#shopping-new').hide();
                    $('#shopping-defautl').html($data.data);
                    $('#total_item').html($data.total)
                    $('#total_item1').html($data.price);
                    $('.cart_bar').html($data.cart);
                    

            }});

          });
        //   $('.remove-item').click(function(){
        //         var id = $(this).val();
        //         $.ajax({
        //             url: '{{url('delete-product')}}',
        //             method: 'GET',
        //             data:{
        //                 id : id,
        //             },
        //             dataType:'json',
        //             success:function($data){
                    
        //             $('#shopping-new').hide();
        //             $('#shopping-defautl').html($data.data);
        //             $('#total_item').html($data.total);
        //             $('#total_item1').html($data.price);
        //             $('.cart_bar').html($data.cart);
                    
        // },
        //         })
        $('.delete-cart').click(function(){
                                Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                  
                                if (result.isConfirmed) {
                                  var id = $(this).data('id_product');
                            $.ajax({
                            url: '{{url('delete-product')}}',
                            method: 'GET',
                            data:{
                            id : id,
                            },
                            dataType:'json',
                            success:function($data){
                            $('#shopping-new').hide();
                            $('#shopping-defautl').html($data.data);
                            $('#total_item').html($data.total)
                            $('#total_item1').html($data.price);
                            $('.cart_bar').html($data.cart);

                            },
                        });
                                    Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    )
                                }
                                })
                               
                            

                                            
                                    
                                        });
                      
                                      

                  
            
          


</script>
  
            
  
            
          
          
          
          
      
          
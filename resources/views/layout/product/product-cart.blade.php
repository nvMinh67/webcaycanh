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
 <script>
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


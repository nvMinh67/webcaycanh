            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script type="text/javascript">

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.btn-add').click(function() {

            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('#quantity').val();
            var cart_product_level = $('.cart_product_level_' + id).val();

            var _token = $('input[name="_token"]').val();



            $.ajax({
                url: '{{ url('/add-cart-ajax') }}',
                method: 'GET',
                data: {
                    cart_product_id: cart_product_id,
                    cart_product_name: cart_product_name,
                    cart_product_image: cart_product_image,
                    cart_product_price: cart_product_price,
                    cart_product_qty: cart_product_qty,
                    cart_product_level: cart_product_level,

                    _token: _token
                },

                success: function(data) {
                    if(data.status == 200){
                                $('#total_item').html(data.total);
                                // $('#total_item1').html(data.price);
                                $('.cart_bar').html(data.cart);
                                Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Sản phẩm đã được thêm vào giỏ hàng',
                                showConfirmButton: false,
                                timer: 1500
                                });}
                                else{
                                    Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Không được mua vượt quá số lượng trong kho',
                                    
                                    })
                                }
                         

                            },
                       

                        });
                    });
                    $('.add-to-cart1').click(function() {
                        var id = $(this).data('id_product');
                        var cart_product_id = $('.cart_product_id_' + id).val();
                        var cart_product_name = $('.cart_product_name_' + id).val();
                        var cart_product_image = $('.cart_product_image_' + id).val();
                        var cart_product_price = $('.cart_product_price_' + id).val();
                        var cart_product_qty = $('#quantity').val();
                        var cart_product_level = $('.cart_product_level_' + id).val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: '{{ url('sub-cart-ajax') }}',
                            method: 'GET',
                            data: {
                                cart_product_id: cart_product_id,
                                cart_product_name: cart_product_name,
                                cart_product_image: cart_product_image,
                                cart_product_price: cart_product_price,
                                cart_product_qty: cart_product_qty,
                                cart_product_level: cart_product_level,
                                _token: _token
                            },
                            success: function($data) {
                                $('#shopping-new').hide();
                                $('#shopping-defautl').html($data.data);
                                $('#total_item').html($data.total);
                                $('#total_item1').html($data.price);
                                $('.cart_bar').html($data.cart);

                            }
                        });
                    });
                    //filter-product
                    $('#search_bar').keyup(function() {
                        var search_value = $(this).val();

                        $.ajax({
                            url: '/getvalue',
                            type: 'GET',
                            data: {
                                search_value: search_value
                            },
                            dataType: 'json',
                            success: function(html) {
                                $('#serch-defalt').hide();
                                $('#result').html(html.html);
                            }

                        });
                    });
                    $('#rangePrimary').change(function() {
                        var price_value = $(this).val();
                        console.log(price_value);
                        $.ajax({
                            url: '/getprice',
                            type: 'GET',
                            data: {
                                price_value: price_value
                            },
                            dataType: 'json',
                            success: function(data) {

                            }
                        });


                    })
                    $('#flexCheckDefault1').change(function() {
                        var price = $(this).val();

                        $.ajax({
                            url: '/filterprice',
                            type: 'GET',
                            data: {
                                price: price
                            },
                            dataType: 'json',
                            success: function(html) {

                                $('#serch-defalt').hide();
                                $('#result').html(html.html);

                            }
                        });





                    })
                    $('#flexCheckDefault2').change(function() {
                        var price = $(this).val();

                        $.ajax({
                            url: '/filterprice1',
                            type: 'GET',
                            data: {
                                price: price
                            },
                            dataType: 'json',
                            success: function(html) {
                                $('#serch-defalt').hide();
                                $('#result').html(html.html);
                            }
                        });
                    })
                    $('#flexCheckDefault3').change(function() {
                        var price = $(this).val();

                        $.ajax({
                            url: '/filterprice2',
                            type: 'GET',
                            data: {
                                price: price
                            },
                            dataType: 'json',
                            success: function(html) {

                                $('#serch-defalt').hide();
                                $('#result').html(html.html);

                            }
                        });





                    })

                    $('.add-to-cart').click(function() {
                     
                        var id = $(this).data('id_product');
                        var cart_product_id = $('.cart_product_id_' + id).val();
                        var cart_product_name = $('.cart_product_name_' + id).val();
                        var cart_product_image = $('.cart_product_image_' + id).val();
                        var cart_product_price = $('.cart_product_price_' + id).val();
                        var cart_product_qty = $('.cart_product_qty_' + id).val();
                        var cart_product_level = $('.cart_product_level_' + id).val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: '{{ url('add-cart-ajax-shopping') }}',
                            method: 'GET',
                            data: {
                                cart_product_id: cart_product_id,
                                cart_product_name: cart_product_name,
                                cart_product_image: cart_product_image,
                                cart_product_price: cart_product_price,
                                cart_product_qty: cart_product_qty,
                                cart_product_level: cart_product_level,
                                _token: _token
                            },
                            success: function(data) {
                                if(data.status==200){
                                $('#shopping-new').hide();
                                $('#shopping-defautl').html(data.data);
                                $('#total_item').html(data.total);
                                $('#total_item1').html(data.price);
                                $('.cart_bar').html(data.cart);}
                                else(
                                    Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Không được mua quá số lượng hàng trong kho',
                                    
                                    })
                                )

                            },
                            error: function(error) {

                            }
                        });
                    })

                    //register

                    $('#city').change(function() {
                        var id = $(this).val();
                        console.log(id);
                        $.ajax({
                            url: '/getdistrict',
                            type: 'GET',
                            data: {
                                city_id: id,
                            },
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                $('#district').empty();
                                $.each(data.data, function(key, value) {
                                    let selectoption = '';
                                    selectoption += "<option value='" + value.id + "'>" + value
                                        .name + "</option>";
                                    $('#district').append(selectoption);
                                });
                            }

                        });
                    })
                    // $('.remove-item').click(function(){
                    //     var id = $(this).val();
                    //     $.ajax({
                    //         url: '{{ url('delete-product') }}',
                    //         method: 'GET',
                    //         data:{
                    //             id : id,
                    //         },
                    //         dataType:'json',
                    //         success:function($data){
                    //         
                    //         $('#shopping-defautl').html($data.data);
                    //         $('#total_item').html($data.total);
                    //         $('#total_item1').html($data.price);
                    //         $('.cart_bar').html($data.cart);

                    //           },
                    //     });
                    // });
                    $('#district').change(function() {
                        var id = $(this).val();
                        $.ajax({
                            url: '/getward',
                            type: 'GET',
                            data: {
                                district_id: id
                            },
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                $('#ward').empty();
                                $.each(data.data, function(key, value) {
                                    let selectoption = '';
                                    selectoption += "<option value='" + value.id + "'>" + value
                                        .name + "</option>";
                                    $('#ward').append(selectoption);
                                });
                            }

                        });

                    })
                    $('.add-to-cart-product').click(function() {
                        var id = $(this).data('id_product');

                        var cart_product_id = $('.cart_product_id1_' + id).val();
                        var cart_product_name = $('.cart_product_name1_' + id).val();
                        var cart_product_image = $('.cart_product_image1_' + id).val();
                        var cart_product_price = $('.cart_product_price1_' + id).val();
                        var cart_product_level = $('.cart_product_level1_' + id).val();
                        var _token = $('input[name="_token"]').val();



                        $.ajax({
                            url: '{{ url('add-to-cart-ajax') }}',
                            method: 'GET',
                            data: {
                                cart_product_id: cart_product_id,
                                cart_product_name: cart_product_name,
                                cart_product_image: cart_product_image,
                                cart_product_price: cart_product_price,
                                cart_product_level: cart_product_level,
                                _token: _token
                            },
                            dataType: 'json',
                            success: function($data) {


                                $('#total_item').html($data.total);

                                $('.cart_bar').html($data.cart);

                            },
                        });
                    });
                    $('.add-to-cart-product-1').click(function() {
                        var id = $(this).data('id_product');
                        var cart_product_id = $('.cart_product_id1_' + id).val();
                        var cart_product_name = $('.cart_product_name1_' + id).val();
                        var cart_product_image = $('.cart_product_image1_' + id).val();
                        var cart_product_price = $('.cart_product_price1_' + id).val();
                        var cart_product_level = $('.cart_product_level1_' + id).val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: '{{ url('add-to-cart-ajax') }}',
                            method: 'GET',
                            data: {
                                cart_product_id: cart_product_id,
                                cart_product_name: cart_product_name,
                                cart_product_image: cart_product_image,
                                cart_product_price: cart_product_price,
                                cart_product_level: cart_product_level,
                                _token: _token
                            },
                            dataType: 'json',
                            success: function($data) {
                              

                                $('#total_item').html($data.total);

                                $('.cart_bar').html($data.cart);

                            },
                        });
                    })
                    $('.add-to-cart-product-home').click(function() {
                        var id = $(this).data('id_product');
                        var cart_product_id = $('.cart_product_id_' + id).val();
                        var cart_product_name = $('.cart_product_name_' + id).val();
                        var cart_product_image = $('.cart_product_image_' + id).val();
                        var cart_product_price = $('.cart_product_price_' + id).val();
                        var cart_product_level = $('.cart_product_level_' + id).val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: '{{ url('add-to-cart-ajax') }}',
                            method: 'GET',
                            data: {
                                cart_product_id: cart_product_id,
                                cart_product_name: cart_product_name,
                                cart_product_image: cart_product_image,
                                cart_product_price: cart_product_price,
                                cart_product_level: cart_product_level,
                                _token: _token
                            },
                            dataType: 'json',
                            success: function(data) {
                                if(data.status == 200){
                                Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                                })
                                $('#total_item').html(data.total);
                                $('.cart_bar').html(data.cart);

                            }
                            else{
                                Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Không mua vượt quá số lượng trong kho',
                               
                                })
                           
                            }}
                          
                        });
                    });
                    $('.delete-cart').click(function() {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Bạn Muốn xóa sản phẩm ra khỏi giỏ hàng !",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {

                            if (result.isConfirmed) {
                                var id = $(this).data('id_product');
                                $.ajax({
                                    url: '{{ url('delete-product') }}',
                                    method: 'GET',
                                    data: {
                                        id: id,
                                    },
                                    dataType: 'json',
                                    success: function($data) {
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
                    $('.pagination-order a').click(function(e){
                        e.preventDefault();
                        var page = $(this).attr('href').split('page=')[1];
                        getmoreProductDetail(page); 

                    });
                    function getmoreProductDetail(page){
                        var id = $('.id_product').val();
                        $.ajax({
                            method: "get",
                            data:{
                                id:id,

                            },
                            url: "/pagination/fetch_product_detail?page=" + page,
                            success: function(data) {
                              $('#product-detail-list').html(data.product_detail_html);
                              $('.paginate-detail').html(data.product_detail_paginate_html);

                    

                        }})
                    }
                    $('#order-filter').change(function(){
                       var value = $(this).val();
                       $.ajax({
                        method:"GET",
                        data:{
                            value:value,
                        },
                        url: 'admin/order/orderFilter',
                        success:function(data){
                            $('#order_product').html(data.html);
                          
                        }
                       })

                    })

                    
                    $(document).on('click', '.pagination a', function(e) {
                        e.preventDefault();

                        var page = $(this).attr('href').split('page=')[1];

                        getmoreProduct(page);

                    });

                    function getmoreProduct(page) {
                        $.ajax({
                            method: "get",
                            url: "/pagination/fetch_data?page=" + page,

                            success: function(data) {


                                $('#product-list').html(data);
                                $('#paginate-old').hide();



                            }
                        });
                    }

                    $('.a-delete-btn').click(function() {
                        // swal({
                        //     title: "Are you sure?",
                        //     text: "Once deleted, you will not be able to recover this imaginary file!",
                        //     icon: "warning",
                        //     buttons: true,
                        //     dangerMode: true,
                        //     })
                        //     .then((willDelete) => {
                        //     if (willDelete) {
                        //    var id = $(this).val();
                        //     $.ajax({
                        //     url: '{{ url('admin/product/delete') }}',
                        //     method: 'GET',
                        //     data:{
                        //     id : id,
                        //     },
                        //     dataType:'json',
                        //     success:function($data){
                        //         $('#product-view').html($data.total);
                        // }
                        // })
                        //         swal("Poof! Your imaginary file has been deleted!", {
                        //         icon: "success",
                        //         });
                        //     } else {
                        //         swal("Your imaginary file is safe!");
                        //     }
                        //     });


                        Swal.fire({
                            title: 'Are you sure?',
                            text:"are you really want to delete it !",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                var id = $(this).val();
                                $.ajax({
                                    url: '{{ url('admin/product/delete') }}',
                                    method: 'GET',
                                    data: {
                                        id: id,
                                    },
                                    dataType: 'json',
                                    success: function(data) {


                                        $('#product-grid-view').html(data.total);
                                        $('#paginate-admin').html(data.product_paginate);
                                    }
                                })
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                        })


                    });

                    $('.pagination-tailwind a').click(function(e) {
                        e.preventDefault();

                        var page = $(this).attr('href').split('page=')[1];
                        getmoreUser(page);
                    });
                    $('.pagination-tailwind-user a').click(function(e) {
                        e.preventDefault();
                        var page = $(this).attr('href').split('page=')[1];

                        getmoreUserAdmin(page);
                    });

                    function getmoreUserAdmin(page) {

                        $.ajax({
                            method: "get",
                            url: "pagination/fetch_data2?page=" + page,

                            success: function(data) {
                                $('#user-list').html(data.user_list);
                                $('#user_paginate').html(data.user_paginate);
                                // $('#product-grid-view').html(data.product_table);
                                // $('#paginate-admin').html(data.product_paginate);
                                // $('#order_product').html(data.order);
                                // $('#order_paginate').html(data.order_paginate);


                                // $('#product-list').html(data);
                                // $('#paginate-old').hide();



                            }
                        });


                    }
                    $('.pending-order').click(function(){
                            var id = $(this).val();
                       
                        $('.pending-deny_' + id).show();
                        $('.pending-approval_' + id).show();
                        $(this).hide();
                        $('.pending-deny_' + id).click(function() {
                            $.ajax({
                                url:'admin/order/deny',
                                method:'GET',
                                data:{
                                    id:id,
                                },
                                
                                success:function(){
                                    Swal.fire(
                                    'Success',
                                    'this Order has been Handle',
                                    'success'
                                )

                                }
                            })
                            $('.pending-approval_' + id).hide();
                        });
                        $('.pending-approval_'+id).click(function() {
                            $.ajax({
                                url:'admin/order/approve',
                                method:'GET',
                                data:{
                                    id:id,
                                },
                                
                                success:function(){
                                    Swal.fire(
                                    'Success',
                                    'this Order has been Handle',
                                    'success'
                                )

                                }
                            })
                            $('.pending-deny_' + id).hide();
                        })
                    })
                    // $('.pending-order').click(function() {
                    //     var id = $(this).val();
                    //     alert(id);
                    //     $('.pending-deny_' + id).show();
                    //     $('.pending-approval_' + id).show();
                    //     $(this).hide();
                    //     $('.pending-deny_' + id).click(function() {
                    //         $.ajax({
                    //             url:'admin/order/deny',
                    //             method:'GET',
                    //             data:{
                    //                 id:id,
                    //             }
                    //             dataType:'Json',
                    //             success:function(){
                    //                 Swal.fire(
                    //                 'Deleted!',
                    //                 'Your file has been deleted.',
                    //                 'success'
                    //             )

                    //             }
                    //         })
                    //         $('.pending-approval_' + id).hide();
                    //     })
                    //     $('.pending-approval_' + id).click(function() {
                    //         $('.pending-deny_' + id).hide();
                    //     })


                    // });
                    $('.edit-order').click(function() {
                        var id = $(this).val();
                        $.ajax({
                            url: '{{ url('admin/invoice') }}',
                            method: 'GET',
                            data: {
                                id: id,
                            },
                            dataType: 'json',

                            success: function(data) {
                                $('#invoice').html(data.invoice);


                            }
                        });
                    });
                    $('.delete-order').click(function(){
                        Swal.fire({
                        title: 'Are you sure?',
                        text: "Are you really want to delete it !",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            var id = $(this).val();
                           
                            $('.row-order_'+id).hide();
                        
                            $.ajax({
                                method:"get",
                                data:{
                                    id:id,
                                },
                                url:'admin/order/delete',
                                success:function(){
                                }
                            })



                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        }
                        else{
                            Swal.fire(
                            'NotDelete!',
                            'Your file has been deleted.',
                            'error'
                            )
                        }
                        })
                        
                    })

                    function alertorder() {
                        (async () => {
                            const {
                                value: formValues
                            } = await Swal.fire({
                                title: 'Edit Product',
                                html: '<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">' +
                                    '<div class="mb-4">' +
                                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="name">' +
                                    'Name' +
                                    '</label>' +
                                    '<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name" name ="name">' +
                                    '</div>' +
                                    '<div class="mb-6">' +
                                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="price">' +
                                    'Price' +
                                    '</label>' +
                                    '<input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="price" type="number" placeholder="price" name="price">' +

                                    '</div>' +
                                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="amount">' +
                                    'Amount' +
                                    '</label>' +
                                    '<input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="amount" name="amount" type="number" placeholder="amount">' +

                                    '</div>' +
                                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="sale">' +
                                    'Sale' +
                                    '</label>' +
                                    '<input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="sale" type="number" placeholder="sale">' +
                                    '<input type="hidden" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="id"  placeholder="sale">' +
                                    '</div>' +
                                    '</div>' +
                                    '</form>',
                                focusConfirm: false,
                                preConfirm: () => {
                                    return [
                                        document.getElementById('name').value,
                                        document.getElementById('price').value,
                                        document.getElementById('amount').value,
                                        document.getElementById('sale').value
                                    ]
                                }
                            })

                            if (formValues) {


                                // $.ajax({
                                //     method:"GET",
                                //     url:'admin/product/edit'
                                //     data:formValues,

                                //     success:function(data){

                                //     }

                                // })
                            }

                        })()
                    }

                    function getmoreUser(page) {
                        $.ajax({
                            method: "get",
                            url: "/pagination/fetch_data1?page=" + page,

                            success: function(data) {

                                $('#product-grid-view').html(data.product_table);
                                $('#paginate-admin').html(data.product_paginate);
                                $('#order_product').html(data.order);
                                $('#order_paginate').html(data.order_paginate);


                                // $('#product-list').html(data);
                                // $('#paginate-old').hide();



                            }
                        });
                    }
                    $('.a-edit-btn').click(function() {
                        var id = $(this).val();

                        sweetAlert(id);






                    });

                    function sweetAlert(id) {
                        (async () => {

                            const {
                                value: formValues
                            } = await Swal.fire({
                                title: 'Edit Product',
                                html: '<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">' +
                                    '<div class="mb-4">' +
                                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="name">' +
                                    'Name' +
                                    '</label>' +
                                    '<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name" name ="name">' +
                                    '</div>' +
                                    '<div class="mb-6">' +
                                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="price">' +
                                    'Price' +
                                    '</label>' +
                                    '<input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="price" type="number" placeholder="price" name="price">' +

                                    '</div>' +
                                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="amount">' +
                                    'Amount' +
                                    '</label>' +
                                    '<input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="amount" name="amount" type="number" placeholder="amount">' +

                                    '</div>' +
                                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="sale">' +
                                    'Sale' +
                                    '</label>' +
                                    '<input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="sale" type="number" placeholder="sale">' +
                                    '<input type="hidden" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="id"  placeholder="sale">' +
                                    '</div>' +
                                    '</div>' +
                                    '</form>',
                                focusConfirm: false,
                                preConfirm: () => {
                                    return [
                                        document.getElementById('name').value,
                                        document.getElementById('price').value,
                                        document.getElementById('amount').value,
                                        document.getElementById('sale').value
                                    ]
                                }
                            })

                            if (formValues) {
                                console.log(formValues);
                                $.ajax({
                                    url: '{{ url('admin/product/edit') }}',
                                    method: 'GET',
                                    data: {
                                        formValues: formValues,
                                        id: id,
                                    },
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data.status == 400) {
                                            Swal.fire({
                                                title: 'Error!',
                                                text: 'Product hasnt been edited',
                                                icon: 'error',
                                                confirmButtonText: 'Cool'
                                            });
                                        } else {
                                            $('#product-view').html(data.total);

                                            Swal.fire({
                                                title: 'Success!',
                                                text: 'Product has been edited',
                                                icon: 'success',
                                                confirmButtonText: 'Cool'
                                            });
                                        }

                                    }
                                })

                                // $.ajax({
                                //     method:"GET",
                                //     url:'admin/product/edit'
                                //     data:formValues,

                                //     success:function(data){

                                //     }

                                // })
                            }

                        })()
                    }
                    $('#admin-search').keyup(function() {
                        var value = $(this).val();

                        $.ajax({
                            url: '{{ url('admin/product/search') }}',
                            method: 'GET',
                            data: {
                                value: value,
                            },
                            success: function(data) {
                                $('#product-grid-view').html(data.product_table);


                            }



                        });
                    });



                    // $('#form-submit').submit(function(e){
                    //     e.preventDefault();  
                    //     $.ajax({
                    //     type:'POST',
                    //     url:"/admin/product/postimage",
                    //     data: {new FormData(this),
                    //     id : id,_token: '{{ csrf_token() }}',}
                    //     contentType:false,
                    //     processData:false,
                    //     cache:false,
                    //     dataType:'JSON',
                    //     success:function(data){

                    //         //$('#product-view').html(data.total);

                    //     }
                    // });

                    // })




































});

 </script>
            <script type="text/javascript">
                //========= Hero Slider
                tns({
                    container: ".hero-slider",
                    slideBy: "page",
                    autoplay: true,
                    autoplayButtonOutput: false,
                    mouseDrag: true,
                    gutter: 0,
                    items: 1,
                    nav: false,
                    controls: true,
                    controlsText: [
                        '<i class="fa-solid fa-angle-left"></i>',
                        '<i class="fa-solid fa-angle-right"></i>',
                    ],
                });


                // ===
                // === == Brand Slider
                tns({
                    container: ".brands-logo-carousel",
                    autoplay: true,
                    autoplayButtonOutput: false,
                    mouseDrag: true,
                    gutter: 15,
                    nav: false,
                    controls: false,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        540: {
                            items: 3,
                        },
                        768: {
                            items: 5,
                        },
                        992: {
                            items: 6,
                        },
                    },
  });
</script>
            <script>
                const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

                const timer = () => {
                    const now = new Date().getTime();
                    let diff = finaleDate - now;
                    if (diff < 0) {
                        document.querySelector(".alert").style.display = "block";
                        document.querySelector(".container").style.display = "none";
                    }

                    let days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    let hours = Math.floor(
                        (diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                    );
                    let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    let seconds = Math.floor((diff % (1000 * 60)) / 1000);

                    days <= 99 ? (days = `0${days}`) : days;
                    days <= 9 ? (days = `00${days}`) : days;
                    hours <= 9 ? (hours = `0${hours}`) : hours;
                    minutes <= 9 ? (minutes = `0${minutes}`) : minutes;
                    seconds <= 9 ? (seconds = `0${seconds}`) : seconds;

                    document.querySelector("#days").textContent = days;
                    document.querySelector("#hours").textContent = hours;
                    document.querySelector("#minutes").textContent = minutes;
                    document.querySelector("#seconds").textContent = seconds;
                };
                timer();
                setInterval(timer, 1000);
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
 </script>

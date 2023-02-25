@foreach($product as $pro)
<tr class="text-gray-700 dark:text-gray-400">
  <td class="px-4 py-3">
    <div class="flex items-center text-sm">
      <!-- Avatar with inset shadow -->
      <div
        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
      >
        <img
          class="object-cover w-full h-full rounded-full"
          src="{{asset($pro->image)}}"
          alt=""
          loading="lazy"
        />
        <div
          class="absolute inset-0 rounded-full shadow-inner"
          aria-hidden="true"
        ></div>
      </div>
      <div>
        <p class="font-semibold">{{$pro->name}}</p>
        <p class="text-xs text-gray-600 dark:text-gray-400">
          {{$pro->amount}}x Amount
        </p>
      </div>
    </div>
  </td>
  <td class="px-4 py-3 text-sm">
    {{$pro->price}} VND
  </td>
 

  
  <td class="px-4 py-3 text-xs">
      @if($pro->amount > 0 )
    <span
      class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
    >
      In-Stock
    </span>
  
  @else
      <span
      class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700"
    >
      Out-Stock
    </span>           
  @endif
  </td>

  <td class="px-4 py-3 text-sm">
    {{$pro->created_at}}
  </td>
  <td class="px-4 py-3">
    <div class="flex items-center space-x-4 text-sm">
      <button
        class="a-edit-btn flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
        aria-label="Edit"
        value="{{$pro->id}}"

      
      >
        <svg
          class="w-5 h-5"
          aria-hidden="true"
          fill="currentColor"
          viewBox="0 0 20 20"
        >
          <path
            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
          ></path>
        </svg>
      </button>
      <button 
      data-id_product="{{$pro->id}}"
        class="a-delete-btn flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
        aria-label="Delete"

        value="{{$pro->id}}"
        type="button"
      >
        <svg
          class="w-5 h-5"
          aria-hidden="true"
          fill="currentColor"
          viewBox="0 0 20 20"
        >
          <path
            fill-rule="evenodd"
            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
            clip-rule="evenodd"
          ></path>
        </svg>
        </button>
    
    </div>
  </td>
</tr>
@endforeach
<script>
    $(document).ready(function(){

                    $('.a-delete-btn').click(function(){
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
                                //     url: '{{url('admin/product/delete')}}',
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
                                    text: "You won't be able to revert this!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!'
                                    }).then((result) => {
                                    if (result.isConfirmed) {
                                        var id = $(this).val();
                                    $.ajax({
                                    url: '{{url('admin/product/delete')}}',
                                    method: 'GET',
                                    data:{
                                    id : id,
                                    },
                                    dataType:'json',
                                    success:function(data){
                                        
                                       
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
                        $('.a-edit-btn').click(function(){
                            var id = $(this).val();
                           
                           sweetAlert(id);

                            

                         
                            	
                          
                        });
                      





                        function sweetAlert(id){
                                (async () => {

                                const { value: formValues } = await Swal.fire({
                                title: 'Multiple inputs',
                                html:
                                '<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">'+
                                    '<div class="mb-4">'+
                                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="name">'+
                                        'Name'+
                                    '</label>'+
                                    '<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name" name ="name">'+
               
 
                                    '</div>'+
                                    '<div class="mb-6">'+
                                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="price">'+
                                        'Price'+
                                    '</label>'+
                                    '<input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="price" type="number" placeholder="price" name="price">'+
                                
                                    '</div>'+
                                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="amount">'+
                                        'Amount'+
                                    '</label>'+
                                    '<input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="amount" name="amount" type="number" placeholder="amount">'+
                                
                                    '</div>'+
                                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="sale">'+
                                        'Sale'+
                                    '</label>'+
                                    '<input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="sale" type="number" placeholder="sale">'+
                                    '<input type="hidden" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="id"  placeholder="sale">'+
                                    '</div>'+
                                    '</div>'+
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
                                    url: '{{url('admin/product/edit')}}',
                                    method: 'GET',
                                    data:{
                                    formValues : formValues,
                                    id:id,
                                    },
                                    dataType:'json',
                                    success:function(data){
                                        if(data.status == 400 ){
                                            Swal.fire({
                                          title: 'Error!',
                                        text: 'Product hasnt been edited',
                                        icon: 'error',
                                        confirmButtonText: 'Cool'
                                        });
                                        }
                                        else{
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
                        
    })
</script>


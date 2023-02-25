    <?php $this->layout(config('view.layout')) ?>

    <!-- Load nội dung trang home/dashboard.php vào vị trí section('page') của layouts/default.php -->
    <?php $this->start('page') ?>
    <div class="left-menu mt-100">
    <div class="row">
        

        <div class="col-lg-12 col-12 col-md-9 padr--20">
        <div class="product-grids-head">
            <div class="product-grid-topbar">
            <div class="row align-items-center">
                
                <div class="col-lg-12 col-md-4 col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button
                        class="nav-link"
                        id="nav-grid-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-grid"
                        type="button"
                        role="tab"
                        aria-controls="nav-grid"
                        aria-selected="true"
                    >
                    Manager-Product
                    </button>
                    <button
                        class="nav-link active"
                        id="nav-list-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-list"
                        type="button"
                        role="tab"
                        aria-controls="nav-list"
                        aria-selected="false"
                    >
                    Manager-Order
                    </button>
                    <button
                    class="nav-link"
                    id="nav-grid-tab1"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-grid1"
                    type="button"
                    role="tab"
                    aria-controls="nav-grid1"
                    aria-selected="true"
                    >
                    <i class="lni lni-grid-alt"></i>
                    </button>
                    </div>
                </nav>
                </div>
            </div>
            </div>
            <div class="tab-content" id="nav-tabContent" >
            <div
                class="tab-pane fade"
                id="nav-grid"
                role="tabpanel"
                aria-labelledby="nav-grid-tab"
            >
            <div class="row">
                <div class="col-lg-4">
                <div class="product-slidebar">
                    <div class="single-widget search">
                    <h3>Search Product</h3>
                    <form action="#">
                        <input class="form-search" type="text" placeholder="Search Here..." />
    
    
                        <button type="submit">
                        <i class="fa-solid fa-magnifying-glass " style="color: #ccc;"></i>
                        </button>
                    </form>
                    </div>
    
                </div>
                <div class="product-sorting">
                <label class="title-admin mt-10" for="product-sorting">Sort by:</label>
                <select class="form-control " id="product-sorting">
                    <option value="1">Newest</option>
                    <option value="2">Lastest</option>
                    <option value="3">Low - High Price</option>
                    <option value="4">High - Low Price</option>
                    <option value="5">Best-Seller</option>
                    <option value="6">High - Low Price</option>
                   
               
                </select>
        
                </div>

                </div>
                <div class="col-lg-4">
                <a href="<?= request()->baseUrl()?>/admin/add">
                    <div class="add-product">
                    <Button class="btn btn-success" style="margin-top: 80px;"> Add Product</Button>
                    </div>

                </a>
                </div>
            
            <div class="product-info-admin">
                <div class="row product-title-admin">
                    <div class="col-lg-1 col-md-1 col-12 text-center item-title1">
                    <p>
                    STT
                    </p>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12 text-center item-title1">
                    <p>Product image</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 text-center item-title1">
                    <p>Product Name</p>
                    </div>
                
                    <div class="col-lg-2 col-md-2 col-12 text-center item-title1">
                    <p>Price</p>
                    </div>
            
                    <div class="col-lg-2 col-md-2 col-12 text-center item-title1">
                    <p>Remove</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12 text-center item-title1">
                    <p>Edit</p>
                    </div>
    
                </div>
                <div class="row" id="admin-product-defaut">
                    
                    <div class="col-lg-12">

                    <div class="cart-single-list mgc">
                    <div class="row align-items-center admin_product-name ">
                    <?php $s=1; foreach($productlist as $pro) :?>
                        <div class="col-lg-1 col-md-1 col-12 text-center">
                        <?= $s++;?>
                        
                        </div>
                        <div class="col-lg-2 col-md-3 col-12 text-center">
                        <h5 class="">
                            <a href="product-details.html"
                            ><img src="<?= $pro->image?>" alt="#"
                        /></a>
                        
                        </h5>
                        
                        </div>
                        <div class="col-lg-3 col-md-2 col-12 text-center">
                        <h3>
                    
                        
                            <?= $pro->name?>
                            
                        </h3>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 text-center">
                        <div class="count-input">
                            <p style="font-size:1.8rem;"><?= $pro->price?></p>
                            
                        </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 text-center icon-close" style="color:red;">
                        <a href="<?= request()->baseUrl()?>/admin/remove?id=<?= "$pro->id";?>">
            
                            <i class="fa-solid fa-xmark" style="color:red;"></i>
                        </a>
                        </div>
                
                        <div class="col-lg-2 col-md-2 col-12 text-center icon-close">
                        <a href="<?= request()->baseUrl()?>/admin/edit?id=<?= "$pro->id";?>">
                            <i class="fa-solid fa-pen-to-square"></i>
            
                        </a>
                    
                        </div>
                    
                        <?php endforeach ; ?>
                    </div>
                    </div>
                
                
                
                
                </div>
                <div class="row" id="admin-product-new">

                </div>


            
            
                </div>

                </div>
                
            </div>
            </div>
            <div
                class="tab-pane show active fade"
                id="nav-list"
                role="tabpanel"
                aria-labelledby="nav-list-tab"
                style="padding:40px;"
            
            >
            <div class="col-lg-2 col-md-8 col-12" >
                <div class="product-sorting">
                <label class="title-admin mt-10" for="sorting">Sort by:</label>
                <select class="form-control " id="sorting">
                    <option value="1">Newest</option>
                    <option value="2">Lastest</option>
                    <option value="3">Low - High Price</option>
                    <option value="4">High - Low Price</option>
                   
               
                </select>
        
                </div>
            </div>
            <table class="table table-admin table-striped table-hover mt-20" style="padding:30px;">
                <thead>
                    <tr class="table-header">
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Time-Order</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Total_amount</th>
                        <th scope="col" class="text-center">Total-Money</th>
                        <th scope="col" class="text-center">Detail-Order</th>
                        <th scope="col" class="text-center">Approve</th>
                        <th scope="col" class="text-center">Delete</th>
                    </tr>
                </thead>
            
                       
                    
                        <tbody id="old-sorting" >
                            
                                <?php $start=1; foreach($product1 as $pro) :?>
                                <tr>
                                    <th class="text-center" scope="row"><?=$start++?></th>
                                    <td class="text-center"><?=$pro->created_at?></td>

                                    <td class="text-center"><?=$pro->Status?></td>
                                    <td class="text-center"> <?=$pro->amount?></td>
                                    <td class="text-center"><?=$pro->price?></td>
                                    <td class="text-center"><a href="<?= request()->baseUrl()?>/invoice?id=<?php echo "$pro->id_order";?>"><i class="fa-solid fa-file-invoice-dollar icon-close" style="color:blue;"></i></a></td>
                                    <td class="text-center"><a href="<?= request()->baseUrl()?>/admin/approve?id=<?= "$pro->id_order";?>"><i class="fa-solid fa-check icon-close " style="color:chartreuse;"></i></i></a></td>
                                    <td class="text-center"><a href=""><i class="fa-solid fa-xmark icon-close " style="color:red;"></i></a></td></td>
                                
                                </tr>
                                <?php endforeach ;?>
                    
                        
                        </tbody>
                        <tbody id="show-sorting" >
                            
                           
                    
                        
                        </tbody>
                    
               
                       
                    
                 
                       
                   
            </table>
            
            </div>
            <div class="tab-pane fade"
            class="tab-pane fade"
            id="nav-grid1"
            role="tabpanel"
            aria-labelledby="nav-grid-tab1"
            >
                <div class="row">
                <div class="col-lg-1 col-md-1 col-12 text-center item-title1">
                    <p>
                    STT
                    </p>
                </div>
                <div class="col-lg-2 col-md-3 col-12 text-center item-title1">
                    <p>Product image</p>
                </div>
                <div class="col-lg-3 col-md-3 col-12 text-center item-title1">
                    <p>Product Name</p>
                </div>
                
                <div class="col-lg-2 col-md-2 col-12 text-center item-title1">
                    <p>Price</p>
                </div>
            
                <div class="col-lg-2 col-md-2 col-12 text-center item-title1">
                    <p>Remove</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12 text-center item-title1">
                    <p>Edit</p>
                </div>
                </div>
                <div class="row">
                <div class="col-lg-12">
                <div class="cart-single-list mr-ct">
                    <div class="row align-items-center admin_product-name ">
                    <div class="col-lg-1 col-md-1 col-12 text-center">
                        1
                    
                    </div>
                    <div class="col-lg-2 col-md-3 col-12 text-center">
                        <h5 class="">
                        <a href="product-details.html"
                        ><img src="assets/image/about/1.jpg" alt="#"
                        /></a>
                    
                        </h5>
                    
                    </div>
                    <div class="col-lg-3 col-md-2 col-12 text-center">
                        <h5>
                    
                        
                            Canon EOS M50 Mirrorless Camera
                        
                        </h5>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12 text-center">
                        <div class="count-input">
                        <p>$910.00</p>
                        
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12 text-center icon-close" style="color:red;">
                        <a href="">
        
                        <i class="fa-solid fa-xmark" style="color:red;"></i>
                        </a>
                    </div>
                
                    <div class="col-lg-2 col-md-2 col-12 text-center icon-close">
                        <a href="">
                        <i class="fa-solid fa-pen-to-square"></i>
        
                        </a>
                
                    </div>
                
                    </div>
                </div>
                
            
            
            
            
                </div>
            
        
                </div>

            </div>

            </div>
        </div>
        </div>
        
    </div>
    
</div>
<script>
    $(document).ready(function(){
        $('#sorting').change(function(){
            var sort_id = $(this).val();
            console.log(sort_id);
            $.ajax({
                url:'/admin/sorting/newest',
                type:'Get',
                data:{
                    sort_id : sort_id
                },
                dataType:'json',
                success:function(data,user){
                    console.log(data);
                    console.log(user);
                    var html = '';
                    var start = 1;
                    $.each(data.data, function(key, value){
                  

                    
                            
                           
                       html +=  '<tr>';
                       html +=  '<th class="text-center" scope="row">'+start+++'</th>';
                       html +=  '<td class="text-center">'+ value.created_at +'</td>';
           
                       html +=  '<td class="text-center">'+ value.Status +'</td>'; 
                       html +=   '<td class="text-center">'+ value.amount +'</td>';
                       html +=   '<td class="text-center">'+ value.price +'</td>';
                       html += '<td class="text-center"><a href="<?= request()->baseUrl()?>/invoice?id='+ value.id_order +'"><i class="fa-solid fa-file-invoice-dollar icon-close" style="color:blue;"></i></a></td>';
                       html += '<td class="text-center"> <a href="<?= request()->baseUrl()?>/admin/approve?id='+ value.id_order +'"><i class="fa-solid fa-check icon-close " style="color:chartreuse;"></i></i></a></td>';
                       html +=   '<td class="text-center"><a href=""><i class="fa-solid fa-xmark icon-close " style="color:red;"></i></a></td></td>';
                       html +=  '</tr>';
                       

                    })
                    $('#old-sorting').hide();
                    $('#show-sorting').html(html);

                }

            })
        });
     
    });
    $(document).ready(function(){
        $('#product-sorting').change(function(){
            var sort_id1 = $(this).val();
            console.log(sort_id1);
            $.ajax({
                url:'/admin/sorting/newestproduct',
                type:'Get',
                data:{
                    sort_id1 : sort_id1
                },
                dataType:'json',
                success:function(data){
                    console.log(data);
                    var html = '';
            
                    $.each(data.data, function(key, value){
                        html += '<div class="col-lg-12">';
                        html +=  '<div class="cart-single-list mgc">';
                        html +=  '<div class="row align-items-center admin_product-name ">';
                        html +=  '<div class="col-lg-1 col-md-1 col-12 text-center"></div>';
                        html += '<div class="col-lg-2 col-md-3 col-12 text-center">';
                        html += '<h5 class="">';
                      
                        html +=  '<a href="product-details.html"><img src="'+ value.image +'" alt="#" /></a>';
              
                        html +='</h5>';
                        html += '</div>';
                        html +=  '<div class="col-lg-3 col-md-2 col-12 text-center">';
                        html +=  '<h3>';
                        html +=    "";
                        html +='</h3>';
                        html +='</div>';
                        html +='<div class="col-lg-2 col-md-2 col-12 text-center">';
                        html += '<div class="count-input">';
                        html +=  '<p style="font-size:1.8rem;">'+ value.price +'</p>';
                        html +=   '</div>';
                        html +=  '</div>';
                        html += '<div class="col-lg-2 col-md-2 col-12 text-center icon-close" style="color:red;">';
                        html +=   '<a href="<?= request()->baseUrl()?>/admin/edit?id='+ value.id +'">';
                        html +=   '<i class="fa-solid fa-xmark" style="color:red;"></i>';
                        html +=  '</a>';
                        html +=  '</div>';
                        html += '<div class="col-lg-2 col-md-2 col-12 text-center icon-close">';
                        html +=  '<a href="<?= request()->baseUrl()?>/admin/edit?id='+ value.id +'">';
                        html += '<i class="fa-solid fa-pen-to-square"></i>';
                        html += '</a>';
                        html +='</div>';
                        html += '</div>';
                        html +='</div>';
                        html += '</div>';


                    });
                    // $('#admin-product-defaut').hide();
                    $('#admin-product-defaut').html(html);

                 
       

                }

            })
        })
    });
</script>

<?php $this->stop() ?>
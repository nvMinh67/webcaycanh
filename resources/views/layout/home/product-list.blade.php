<div class="row">
   @foreach ($product as $pro)
      <?php if($pro->product->level == 0 ) : ?>
          <div class="col-lg-3 col-md-6 col-6">
            <div class="itemlist">
              <div class="item-img">
                <a href="<?= request()->baseUrl()?>/detail?id=<?= $pro->product->id;?>">  <img src="<?= $pro->product->image; ?>"
                 alt="" class="item-picture"></a>
             
                 <span class="new-tag">NEW</span>
                 
               
                 <?php if($pro->product->amount <= 0 ) : ?>
                  <span class="sold-out-tag">Sold-Out</span>
                  
                  
                  <?php else : ?>
                    <div class="btn-buy">
                      <a href="<?= request()->baseUrl()?>/carthome?id=<?= $pro->product->id;?>"> <button class="btn btn-buy1 btn-primary"><i class="icon-cart header_cart_icon fa-solid fa-cart-shopping"></i>  add to cart</button></a>
                      
                    </div>
                    <?php endif ; ?>
             
              </div>
              <div class="item-content">
                <h3 class="item-name"><?= $pro->product->name; ?></h3>
                <div class="item-price">
                  <span class="price"><?= $pro->product->price ?>  vnd</span>
                  <span class="old-price"></span>
                 
                </div>
              </div>
            </div>
    </div>
    <?php else : ?> 
          <div class="col-lg-3 col-md-6 col-6">
            <div class="itemlist">
              <div class="item-img">
                <a href="<?= request()->baseUrl()?>/detail?id=<?= $pro->product->id;?>">
                  <img src="<?= $pro->product->image; ?>"alt="" class="item-picture">

                </a>
                
                 <span class="sale-tag">-<?=$pro->product->level*100 ?>%</span>
                 
               
                 <?php if($pro->product->amount <= 0 ) : ?>
                  <span class="sold-out-tag">Sold-Out</span>
                  
                  
                  <?php else : ?>
                    <div class="btn-buy">
                      <a href="<?= request()->baseUrl()?>/carthome?id=<?= $pro->product->id;?>"> <button class="btn btn-buy1 btn-primary"><i class="icon-cart header_cart_icon fa-solid fa-cart-shopping"></i>  add to cart</button></a>
                      
                    </div>
                    <?php endif ; ?>
             
              </div>
              <div class="item-content">
                <h3 class="item-name"><?= $pro->product->name; ?></h3>
                <div class="item-price">
                  <span class="price"><?= $pro->product->price-($pro->product->price*$pro->product->level); ?>  vnd</span>
                  <span class="old-price"><?= $pro->product->price; ?></span>
                 
                </div>
              </div>
            </div>
          </div>
          <?php endif ; ?>
 
            
         @endforeach
  </div>

 
<!-- Hiển thị phân trang bên dưới bảng -->
<!-- <div class="mt-100">
  <button class="watch-more " onclick="location.href='http://localhost:8080/product'" type="button">  Watch More</button>


    
  
</div> -->



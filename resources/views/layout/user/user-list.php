<div class="user-list list">
    <table class="table table-striped table-hover">
    
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
          
            <div class="row">
            <?php foreach ($items as $item) : ?>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="itemlist">
                <div class="item-img">
                  <a class="item-picture"><img src="<?= $item->HINHANH ?>"></a>
                </div>
                <div class="item-content">
                  <h4 class="item-name"><?= $item->TENSP; ?></h4>
                  <div class="item-price">
                    <span class="price"><?= $item->DONGIA; ?></span>
                    <span class="old-price">Đ</span>
                  </div>
                  <div>
                  <div>
                                          
                        <a style="padding-left:70px" href="<?= request()->baseUrl() ?>/cart?id=<?php echo "$item->ID";?>" data-id="<?= $item->ID ?>" title="Delete <?= $item->TENSP ?>" data-name="<?= $item->TENSP ?>" data-return-url="<?= request()->fullUrl(); ?>">
                            <i class="btn btn-warning"><span  style="color: black">Buy</span></i>
                        </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            </div>
        </tbody>
    </table>
</div>
<!-- Hiển thị phân trang bên dưới bảng -->
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>
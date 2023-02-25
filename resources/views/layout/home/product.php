<?php $this->layout(config('view.layout')) ?>

<!-- Load nội dung trang home/dashboard.php vào vị trí section('page') của layouts/default.php -->
<?php $this->start('page') ?>
<?php $this->insert('home/dashboard'); ?>
<?php $this->stop() ?>


<?php $this->start('page') ?>
<div class="section">
    <div class="container">
        <div class="row">
            
            <div class="col-12">
                <h3 style="text-align:center;margin-top:100px">CÁC SẢN PHẨM</h3>
            </div>
        </div>
        <div class="row" style="display:inline-block">
            <div class="col-12" id="product-list">
                <?php $this->insert('home/product-list', ['items' => $items, 'paginator' => $paginator]); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>

<!-- Chèn script vào vị trí section("js") trong layout default -->
<?php $this->start('js'); ?>
<?php $this->insert('home/script'); ?>
<?php $this->stop(); ?>
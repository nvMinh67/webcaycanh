<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 style="text-align:center;margin-top:100px">CÁC SẢN PHẨM</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12" id="user-list">
                <?php $this->insert('user/user-list', ['items' => $items, 'paginator' => $paginator]); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>

<!-- Đặt code JS vào phần footer của default layout -->
<?php $this->start('js') ?>
<?php $this->stop(); ?>
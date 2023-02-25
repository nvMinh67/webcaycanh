<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>
<div style="margin-top:100px"class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title"> Chỉnh sửa</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li>
                        <a href="/admin"><i class="lni lni-home"></i> Home</a>
                    </li>
                    <li>Edit</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
       
            <form action="/admin/edit" method="POST">
            <div class="form-row">
                <input type="text" id="id" name="id" readonly  value="<?= $sanpham->ID?>" class="form-control form-input">
            </div>

            <div class="form-row">
                <input type="text" name="TENSP" class="form-control form-input " placeholder="Name" value="<?= $sanpham->TENSP ?>" />

            </div>
            <div class="form-row">
                <input type="text" name="DONGIA" class="form-control form-input " placeholder="Price" value="<?= $sanpham->DONGIA ?>" />

            </div> 
              <div class="form-row">
                <input type="text" name="TRANGTHAI" class="form-control form-input " placeholder="Status" value="<?= $sanpham->TRANGTHAI ?>" />

            </div>
            <div class="form-row">
                <input type="file" name="HINHANH" class="form-control form-input " placeholder="Picture" value="<?= $sanpham->HINHANH ?>" />

            </div>
         

            <button type="submit" name="submit" value="submit" class="btn btn-primary them fs-5">Save</button>
        </form>
    
            </div>
        </div>
    </div>
</div>

<?php $this->stop(); ?>
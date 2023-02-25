    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\AdminController;
    use App\Http\Middleware\checkadmin;
    use App\Http\Middleware\CheckLogin;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */
   
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home/login', [UserController::class, 'login'])->name('home.login');
    Route::post('/home/login', [UserController::class, 'loginstore'])->name('home.login1');
    Route::post('/home/logout', [UserController::class, 'logout'])->name('home.logout');
    // Route::get('/', 'App\Controllers\HomeController@index');
    // Route::get('/home', 'App\Controllers\HomeController@index');

    // // // user authentication  
    // Route::get('/login', '\App\Controllers\Auth\LoginController@showLoginForm');
    // Route::post('/login', '\App\Controllers\Auth\LoginController@login');

    // Route::get('/logout', '\App\Controllers\Auth\LoginController@logout');
    // Route::post('/logout', '\App\Controllers\Auth\LoginController@logout');

    // // // register user
    Route::get('home/register', [UserController::class, 'register'])->name('home.register');
    Route::post('home/register', [UserController::class, 'storeregister'])->name('store.register');
    // Route::get('/register', '\App\Controllers\Auth\RegisterController@showRegisterForm');
    // Route::post('/register', '\App\Controllers\Auth\RegisterController@register');

    // Route::error("\App\Controllers\ErrorController@notFoundError");
    Route::get('/thankyou', [ProductController::class, 'thankyou'])->name('thankyou');
    Route::get('/success', [ProductController::class, 'success'])->name('success');
    Route::get('add-cart-ajax-shopping', [ProductController::class, 'addCartAjaxShopping'])->name('addCartAjaxShopping');
    Route::get('sub-cart-ajax', [ProductController::class, 'subCartAjax'])->name('subCartAjax');
    Route::get('delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    Route::get('add-to-cart-ajax', [ProductController::class, 'addToCartAjax'])->name('addToCartAjax');
    





    // Route::get('/detail','\App\Controllers\ProductController@addproduct');

    // // // admin
    Route::group(['middleware' => checkadmin::class],function(){
        
        
    });
    Route::group(['middleware' => CheckLogin::class],function(){
        Route::get('admin', [AdminController::class, 'admin'])->name('admin');
       // Route::get('/admin/create', [AdminController::class, 'showformcreate'])->name('admin.create');
       // Route::post('/admin/create', [AdminController::class, 'imageupload'])->name('admin.create');
        Route::get('add-to-stock', [AdminController::class, 'addToStock'])->name('addToStock');
        Route::get('/admin/edit', [AdminController::class, 'showformedit'])->name('admin.edit');
        Route::get('admin/product/edit', [AdminController::class, 'storeformedit'])->name('admin.edit1');
        Route::get('admin/product', [AdminController::class, 'adminProduct'])->name('admin.product');
        Route::get('admin/admin-process-page', [AdminController::class, 'processPage'])->name('admin-process-page');
        //Route::get('/admin/product',[AdminController::class,'adminProduct'])->name('.admin.product');
        Route::post('/admin/product/upload',[AdminController::class,'im'])->name('.admin.product.u');
        Route::get('admin/product/delete',[AdminController::class,'admindelete'])->name('.admin.product.delete');
        Route::get('admin/order/orderFilter',[AdminController::class,'orderFilter'])->name('admin.order.orderFilter');
        Route::get('admin/invoice',[AdminController::class,'invoice'])->name('admin.invoice');
        Route::get('admin/product/search',[AdminController::class,'adminsearch'])->name('admin.product.search');
        Route::get('admin/order/deny',[AdminController::class,'pendingDeny'])->name('admin.order.deny');
        Route::get('admin/order/approve',[AdminController::class,'pendingApprove'])->name('admin.order.approve');
        Route::get('admin/order/delete',[AdminController::class,'deleteOrder'])->name('admin.order.delete');
    });
    
    // Route::get('/thankyou', '\App\Controllers\AdminController@thankyou');

    // Route::get('/admin/add','App\Controllers\AdminController@add');
    // Route::get('/admin/remove','App\Controllers\AdminController@remove');
    // Route::post('/admin/add','App\Controllers\AdminController@saveadd');
    // Route::get('/admin/edit','App\Controllers\AdminController@edit');
    // Route::post('/admin/edit','App\Controllers\AdminController@saveedit');
    
    
    
    Route::post('/image/send', [AdminController::class,'image'])->name('.image.send');
    Route::post('admin/product/image',[AdminController::class,'admindelete'])->name('.admin.produdct.delete');
    Route::get('/vnpay-return', [ProductController::class,'vnpay_return'])->name('vnpay-return');
    Route::get('/user/get_total_price', [UserController::class,'checkout_user'])->name('user.get_total_price');
   
    // filter

    Route::get('/getdistrict', [UserController::class, 'getdistrict'])->name('.getdistrict');
    Route::get('/getward', [UserController::class, 'getward'])->name('.getward');
    Route::get('/getvalue', [ProductController::class, 'getvalue'])->name('.getvalue');
    Route::get('/getprice', [ProductController::class, 'getprice'])->name('.getprice');
    Route::get('/filterprice',  [ProductController::class, 'getfilter' ])->name('.filterprice');
    Route::get('/filterprice1', [ProductController::class, 'getfilter1'])->name('.filterprice1');
    Route::get('/filterprice2', [ProductController::class, 'getfilter2'])->name('.filterprice2');
    // Route::get('/getward','App\Controllers\AdminController@getwardfromdistrict');
    // Route::get('/getvalue','App\Controllers\AdminController@getvalue');
    // Route::get('/getprice','App\Controllers\AdminController@getprice');
    // Route::get('/filterprice','App\Controllers\AdminController@getfilter');
    // Route::get('/filterprice1','App\Controllers\AdminController@getfilter1');
    // Route::get('/filterprice2','App\Controllers\AdminController@getfilter2');
//    Route::post('admin/upload1',[AdminController::class, 'uploadimage'])->name('.admin.product.upload');


    // // Route::get('/admin/edit','App\Controllers\AdminController@showEditForm');
    // // Route::post('/admin/edit','App\Controllers\AdminController@edit');

    // // Route::post('/admin/delete','App\Controllers\AdminController@delete');

    // // admin


    // Route::get('/invoice','App\Controllers\AdminController@invoice');
    // Route::get('/admin/approve','App\Controllers\AdminController@approve');
    // Route::get('/admin/sorting/newest','App\Controllers\AdminController@sorting');
    // Route::get('/admin/sorting/newestproduct','App\Controllers\AdminController@prosorting');

    // Route::get('/success','App\Controllers\AdminController@success');




    // Route::get('/product', '\App\Controllers\HomeController@product');
    Route::get('/home/product', [ProductController::class, 'product'])->name('home.product');
    Route::get('home/detail', [ProductController::class, 'detail'])->name('home.detail');
    Route::get('/add-cart-ajax', [ProductController::class, 'addajax'])->name('.add-cart-ajax');
    Route::get('/addtocartH', [ProductController::class, 'addtocartH'])->name('.addtocartH');
    Route::get('/home/shopping', [ProductController::class, 'shopping'])->name('home.shopping');
    Route::get('/home/shopping/checkout', [ProductController::class, 'checkout'])->name('home.shopping.checkout');
    Route::post('/home/shopping/checkout/pay', [ProductController::class, 'savepay'])->name('home.shopping.checkout.pay');
    Route::get('/pagination/fetch_data', [ProductController::class,'fetch_data'])->name('pagination.fetch_data');
    Route::get('/pagination/fetch_data1', [AdminController::class,'fetch_data1'])->name('pagination.fetch_data1');
    Route::get('pagination/fetch_data2', [AdminController::class,'fetch_data2'])->name('pagination.fetch_data2');
    Route::get('/pagination/fetch_product_detail', [AdminController::class,'fetch_detail'])->name('pagination.fetch_detail');    
     //Route::get('  /shopping','App\Controllers\ProductController@shopping');

    // Route::get('/product','App\Controllers\ProductController@product');

    // Route::post('/cart','App\Controllers\ProductController@addcart');
    // Route::get('/cart','App\Controllers\ProductController@addcartget');
    // Route::get('/carthome','App\Controllers\ProductController@addcarthome');
    // Route::get('/test','App\Controllers\ProductController@testsql');
    // // Route::get('/pay','App\Controllers\ProductController@pay');
    // Route::post('/pay','App\Controllers\ProductController@savepay');

    // // Route::get('/user', '\App\Controllers\UserController@getList');
    // Route::get('/addshopping','App\Controllers\ProductController@addshopping');
    // Route::get('/remove','App\Controllers\ProductController@remove');
    // Route::get('/checkout','App\Controllers\ProductController@checkout');

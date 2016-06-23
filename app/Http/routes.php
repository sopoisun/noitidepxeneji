<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        if( auth()->check() ){
            return app('App\Http\Controllers\DashboardController')->index();
        }else{
            return app('App\Http\Controllers\Auth\AuthController')->showLoginForm();
        }
        //return view('welcome');
    });

    Route::auth();

    Route::group(['middleware' => ['auth']], function (){
        // Dashboard
        Route::get('/dashboard', 'DashboardController@index');

        // Karyawan
        Route::get('/karyawan', 'KaryawanController@index');
        Route::get('/karyawan/add', 'KaryawanController@create');
        Route::post('/karyawan/add', 'KaryawanController@store');
        Route::get('/karyawan/edit/{id}', 'KaryawanController@edit');
        Route::post('/karyawan/edit/{id}', 'KaryawanController@update');
        Route::get('/karyawan/delete/{id}', 'KaryawanController@destroy');
        Route::get('/karyawan/report/perbulan', 'KaryawanController@reportPerbulan');
        Route::get('/karyawan/report/perbulan-print', 'KaryawanController@reportPerbulanPrint');
        Route::get('/karyawan/report/pertahun', 'KaryawanController@reportPertahun');
        Route::get('/karyawan/report/pertahun-print', 'KaryawanController@reportPertahunPrint');

        // Setting
        Route::get('/setting', 'SettingController@index');
        Route::post('/setting', 'SettingController@save');
        Route::get('/setting/reset', 'SettingController@appReset');
        Route::post('/setting/reset', 'SettingController@saveAppReset');

        // Order
        Route::get('/order', 'OrderController@index');
        Route::get('/order/pertanggal', 'OrderController@pertanggal');
        Route::get('/order/pertanggal/detail', 'OrderController@pertanggalDetail');
        Route::post('/order/pertanggal/detail', 'OrderController@savePertanggalDetail');
        Route::get('/order/pertanggal/return', 'OrderController@pertanggalReturn');
        Route::get('/order/pertanggal/return/detail', 'OrderController@pertanggalReturnDetail');
        # Show Stored New Data Detail
        Route::get('/order/produk', 'OrderController@showProduk');
        # Show Stored New Remove Data Detail
        Route::get('/order/produk/remove', 'OrderController@removeDetailProdukSessionShow');
        # Open Order
        Route::post('/order/open/save', 'OrderController@saveOpenOrder');
        Route::get('/order/{id}/open', 'OrderController@openOrder'); // place place_id
        # Change Order
        Route::get('/order/{id}/rechange', 'OrderController@reChangeOrder');
        Route::get('/order/{id}/change', 'OrderController@changeOrder'); // by order_id
        Route::post('/order/{id}/change', 'OrderController@saveChangeOrder'); // by order_id
        # Close Order
        Route::get('/order/{id}/close', 'OrderController@closeOrder'); // by order_id
        Route::post('/order/{id}/close', 'OrderController@saveCloseOrder'); // by order_id

        // Reporting
        Route::get('/report', 'ReportController@index');
        # Pertanggal
        Route::get('/report/pertanggal', 'ReportController@pertanggal');
        Route::get('/report/pertanggal-print', 'ReportController@pertanggalPrint');
        Route::get('/report/pertanggal/solditem/produk', 'ReportController@soldItem');
        Route::get('/report/pertanggal/solditem/produk-print', 'ReportController@soldItemPrint');
        Route::get('/report/pertanggal/solditem/bahan', 'ReportController@soldItemBahan');
        Route::get('/report/pertanggal/solditem/bahan-print', 'ReportController@soldItemBahanPrint');
        Route::get('/report/pertanggal/karyawan', 'ReportController@karyawan');
        Route::get('/report/pertanggal/karyawan-print', 'ReportController@karyawanPrint');
        Route::get('/report/pertanggal/karyawan/detail', 'ReportController@karyawanDetail');
        Route::get('/report/pertanggal/detail/{id}', 'ReportController@detail');
        Route::get('/report/pertanggal/labarugi', 'ReportController@labaRugi');
        Route::get('/report/pertanggal/labarugi-print', 'ReportController@labaRugiPrint');
        Route::get('/report/pertanggal/purchaseditem/produk', 'ReportController@purchasedItem');
        Route::get('/report/pertanggal/purchaseditem/produk-print', 'ReportController@purchasedItemPrint');
        Route::get('/report/pertanggal/purchaseditem/bahan', 'ReportController@purchasedItemBahan');
        Route::get('/report/pertanggal/purchaseditem/bahan-print', 'ReportController@purchasedItemBahanPrint');
        Route::get('/report/pertanggal/adjustment', 'ReportController@adjustment');
        Route::get('/report/pertanggal/adjustment-print', 'ReportController@adjustmentPrint');
        Route::get('/report/pertanggal/stok/produk', 'ReportController@stok');
        Route::get('/report/pertanggal/stok/produk-print', 'ReportController@stokPrint');
        Route::get('/report/pertanggal/stok/bahan', 'ReportController@stokBahan');
        Route::get('/report/pertanggal/stok/bahan-print', 'ReportController@stokBahanPrint');

        Route::get('/report/pertanggal/customer', 'ReportController@customer');
        Route::get('/report/pertanggal/customer-print', 'ReportController@customerPrint');
        # Periode
        Route::get('/report/periode/solditem/produk', 'ReportController@soldItemPeriode');
        Route::get('/report/periode/solditem/produk-print', 'ReportController@soldItemPeriodePrint');
        Route::get('/report/periode/solditem/bahan', 'ReportController@soldItemBahanPeriode');
        Route::get('/report/periode/solditem/bahan-print', 'ReportController@soldItemBahanPeriodePrint');
        Route::get('/report/periode/karyawan', 'ReportController@karyawanPeriode');
        Route::get('/report/periode/karyawan-print', 'ReportController@karyawanPeriodePrint');
        Route::get('/report/periode/labarugi', 'ReportController@labaRugiPeriode');
        Route::get('/report/periode/labarugi-print', 'ReportController@labaRugiPeriodePrint');
        Route::get('/report/periode/purchaseditem/produk', 'ReportController@purchasedItemPeriode');
        Route::get('/report/periode/purchaseditem/produk-print', 'ReportController@purchasedItemPeriodePrint');
        Route::get('/report/periode/purchaseditem/bahan', 'ReportController@purchasedItemBahanPeriode');
        Route::get('/report/periode/purchaseditem/bahan-print', 'ReportController@purchasedItemBahanPeriodePrint');
        Route::get('/report/periode/adjustment', 'ReportController@adjustmentPeriode');
        Route::get('/report/periode/adjustment-print', 'ReportController@adjustmentPeriodePrint');
        Route::get('/report/periode/stok/produk', 'ReportController@stokPeriode');
        Route::get('/report/periode/stok/produk-print', 'ReportController@stokPeriodePrint');
        Route::get('/report/periode/stok/bahan', 'ReportController@stokBahanPeriode');
        Route::get('/report/periode/stok/bahan-print', 'ReportController@stokBahanPeriodePrint');

        Route::get('/report/periode/customer', 'ReportController@customerPeriode');
        Route::get('/report/periode/customer-print', 'ReportController@customerPeriodePrint');
        # Perbulan
        Route::get('/report/perbulan', 'ReportController@perbulan');
        Route::get('/report/perbulan-print', 'ReportController@perbulanPrint');
        Route::get('/report/perbulan/solditem/produk', 'ReportController@soldItemPerbulan');
        Route::get('/report/perbulan/solditem/produk-print', 'ReportController@soldItemPerbulanPrint');
        Route::get('/report/perbulan/solditem/bahan', 'ReportController@soldItemBahanPerbulan');
        Route::get('/report/perbulan/solditem/bahan-print', 'ReportController@soldItemBahanPerbulanPrint');
        Route::get('/report/perbulan/karyawan', 'ReportController@karyawanPerbulan');
        Route::get('/report/perbulan/karyawan-print', 'ReportController@karyawanPerbulanPrint');
        Route::get('/report/perbulan/labarugi', 'ReportController@labaRugiPerbulan');
        Route::get('/report/perbulan/labarugi-print', 'ReportController@labaRugiPerbulanPrint');
        Route::get('/report/perbulan/purchaseditem/produk', 'ReportController@purchasedItemPerbulan');
        Route::get('/report/perbulan/purchaseditem/produk-print', 'ReportController@purchasedItemPerbulanPrint');
        Route::get('/report/perbulan/purchaseditem/bahan', 'ReportController@purchasedItemBahanPerbulan');
        Route::get('/report/perbulan/purchaseditem/bahan-print', 'ReportController@purchasedItemBahanPerbulanPrint');
        Route::get('/report/perbulan/adjustment', 'ReportController@adjustmentPerbulan');
        Route::get('/report/perbulan/adjustment-print', 'ReportController@adjustmentPerbulanPrint');
        Route::get('/report/perbulan/stok/produk', 'ReportController@stokPerbulan');
        Route::get('/report/perbulan/stok/produk-print', 'ReportController@stokPerbulanPrint');
        Route::get('/report/perbulan/stok/bahan', 'ReportController@stokBahanPerbulan');
        Route::get('/report/perbulan/stok/bahan-print', 'ReportController@stokBahanPerbulanPrint');

        Route::get('/report/perbulan/customer', 'ReportController@customerPerbulan');
        Route::get('/report/perbulan/customer-print', 'ReportController@customerPerbulanPrint');
        # Pertahun
        Route::get('/report/pertahun', 'ReportController@pertahun');
        Route::get('/report/pertahun-print', 'ReportController@pertahunPrint');
        Route::get('/report/pertahun/solditem/produk', 'ReportController@soldItemPertahun');
        Route::get('/report/pertahun/solditem/produk-print', 'ReportController@soldItemPertahunPrint');
        Route::get('/report/pertahun/solditem/bahan', 'ReportController@soldItemBahanPertahun');
        Route::get('/report/pertahun/solditem/bahan-print', 'ReportController@soldItemBahanPertahunPrint');
        Route::get('/report/pertahun/karyawan', 'ReportController@karyawanPertahun');
        Route::get('/report/pertahun/karyawan-print', 'ReportController@karyawanPertahunPrint');
        Route::get('/report/pertahun/labarugi', 'ReportController@labaRugiPertahun');
        Route::get('/report/pertahun/labarugi-print', 'ReportController@labaRugiPertahunPrint');
        Route::get('/report/pertahun/purchaseditem/produk', 'ReportController@purchasedItemPertahun');
        Route::get('/report/pertahun/purchaseditem/produk-print', 'ReportController@purchasedItemPertahunPrint');
        Route::get('/report/pertahun/purchaseditem/bahan', 'ReportController@purchasedItemBahanPertahun');
        Route::get('/report/pertahun/purchaseditem/bahan-print', 'ReportController@purchasedItemBahanPertahunPrint');
        Route::get('/report/pertahun/adjustment', 'ReportController@adjustmentPertahun');
        Route::get('/report/pertahun/adjustment-print', 'ReportController@adjustmentPertahunPrint');
        Route::get('/report/pertahun/stok/produk', 'ReportController@stokPertahun');
        Route::get('/report/pertahun/stok/produk-print', 'ReportController@stokPertahunPrint');
        Route::get('/report/pertahun/stok/bahan', 'ReportController@stokBahanPertahun');
        Route::get('/report/pertahun/stok/bahan-print', 'ReportController@stokBahanPertahunPrint');

        Route::get('/report/pertahun/customer', 'ReportController@customerPertahun');
        Route::get('/report/pertahun/customer-print', 'ReportController@customerPertahunPrint');

        // User
        Route::get('/user', 'UserController@index');
        Route::get('/user/add', 'UserController@create');
        Route::post('/user/add', 'UserController@store');
        Route::get('/user/edit/{id}', 'UserController@edit');
        Route::post('/user/edit/{id}', 'UserController@update');
        Route::get('/user/delete/{id}', 'UserController@destroy');
        Route::get('/change-password', 'UserController@changePassword');
        Route::post('/change-password', 'UserController@saveChangePassword');

        // Permission
        Route::get('/user/permission', 'PermissionController@index');
        Route::get('/user/permission/add', 'PermissionController@create');
        Route::post('/user/permission/add', 'PermissionController@store');
        Route::get('/user/permission/{id}/edit', 'PermissionController@edit');
        Route::post('/user/permission/{id}/edit', 'PermissionController@update');
        Route::get('/user/permission/{id}/delete', 'PermissionController@destroy');

        // Role
        Route::get('/user/role', 'RoleController@index');
        Route::get('/user/role/add', 'RoleController@create');
        Route::post('/user/role/add', 'RoleController@store');
        Route::get('/user/role/{id}/edit', 'RoleController@edit');
        Route::post('/user/role/{id}/edit', 'RoleController@update');
        Route::get('/user/role/{id}/delete', 'RoleController@destroy');

        Route::group(['prefix' => 'ajax'], function(){
            // Dashboard
            Route::get('/dashboard-chart', 'DashboardController@Chart');
            Route::get('/dashboard-price', 'DashboardController@PriceTreshold');
            Route::get('/dashboard-produk', 'DashboardController@ProdukStok');
            Route::get('/dashboard-bahan', 'DashboardController@BahanStok');
            // Karyawan
            Route::get('/karyawan', 'KaryawanController@ajaxLoad');
            // Supplier
            Route::get('/supplier', 'SupplierController@ajaxLoad');
            // Customer
            Route::get('/customer', 'CustomerController@ajaxLoad');
            // Tax
            Route::get('tax', 'TaxController@ajaxLoad');
            // Bank
            Route::get('bank', 'BankController@ajaxLoad');
            // Bahan
            Route::get('/bahan', 'BahanController@ajaxLoad');
            // Produk
            Route::get('/produk', 'ProdukController@ajaxLoad');
            // Pembelian
            Route::post('/pembelian/item/save', 'PembelianController@saveItem');
            Route::get('/pembelian/item/remove', 'PembelianController@removeItem');
            // Adjustment
            Route::post('/adjustment/item_save', 'AdjustmentController@itemSave');
            Route::get('/adjustment/item_remove', 'AdjustmentController@itemRemove');

            // Order
            # Search Place
            Route::get('/place', 'OrderController@getPlace');
            # Search Produk
            Route::get('/order/produk', 'OrderController@getProduk'); // search
            # Order Detail Return
            Route::get('/order/detail/return', 'OrderController@pertanggalDetailReturn');
            Route::post('/order/detail/return', 'OrderController@savePertanggalDetailReturn');
            # Store new data detail session
            Route::post('/order/produk/save', 'OrderController@saveProduk'); // store session
            Route::get('/order/produk/remove', 'OrderController@removeProduk'); // remove store session
            # Store new remove data detail session
            Route::post('/order/detail/remove', 'OrderController@removeDetailProdukSession');
            # Cancel Order
            Route::get('/order/{id}/cancel', 'OrderController@cancelOrder'); // by order_id
            Route::post('/order/{id}/cancel', 'OrderController@saveCancelOrder'); // by order_id
            # Merge Order
            Route::get('/order/{id}/merge', 'OrderController@mergeOrder'); // by order_id
            Route::post('/order/{id}/merge', 'OrderController@saveMergeOrder'); // by order_id

            // Account
            Route::get('/account/check', 'AccountController@check');
        });
    });
});

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function(){
    Route::post('/login', 'ApiController@index');

    Route::group(['middleware' => ['auth.api']], function(){
        Route::get('/user', 'ApiController@user');
        Route::get('/karyawan', 'ApiController@karyawan');
        Route::get('/bank', 'ApiController@bank');
        Route::get('/tax', 'ApiController@tax');
        Route::get('/customer', 'ApiController@customer');
        Route::get('/produk', 'ApiController@produk');
        Route::get('/produk/stok', 'ApiController@checkStok');
        Route::get('/produk/composite', 'ApiController@composite');
        Route::get('/place', 'ApiController@place');
        Route::get('/setting', 'ApiController@setting');
        Route::get('/transaksi', 'ApiController@transaksi');
        Route::post('/transaksi/save', 'ApiController@OpenTransaksi');
        Route::post('/transaksi/change', 'ApiController@changeTransaksi');
        Route::post('/transaksi/close', 'ApiController@closeTransaksi');
        Route::get('/transaksi/detail', 'ApiController@detail');
        Route::get('/transaksi/bayar', 'ApiController@bayar');
        Route::post('/user/change-password', 'ApiController@changePassword');
    });
});

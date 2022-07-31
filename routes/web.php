<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



/*Route::group(['middleware'=>'test'],function(){
    Route::prefix('users')->group(function(){
        Route::get('/view', 'backend\UserController@view')->name('users.view')->middleware('test');
        Route::get('/add', 'backend\UserController@add')->name('users.add');
        Route::post('/store', 'backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}', 'backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'backend\UserController@update')->name('users.update');
        Route::get('/delete/{id}', 'backend\UserController@delete')->name('users.delete');
    });
});*/

Route::group(['middleware'=>'auth'],function(){

    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::prefix('users')->group(function(){
        Route::get('/view', 'backend\UserController@view')->name('users.view');
        Route::get('/add', 'backend\UserController@add')->name('users.add');
        Route::post('/store', 'backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}', 'backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'backend\UserController@update')->name('users.update');
        Route::get('/delete/{id}', 'backend\UserController@delete')->name('users.delete');
    });

    Route::prefix('profiles')->group(function(){
        Route::get('/view', 'backend\ProfileController@view')->name('profiles.view');
        Route::get('/edit', 'backend\ProfileController@edit')->name('profiles.edit');
        Route::post('/update', 'backend\ProfileController@update')->name('profiles.update');
        Route::get('/password/view', 'backend\ProfileController@passwordView')->name('profiles.password.view');
        Route::post('/password/update', 'backend\ProfileController@passwordUpdate')->name('profiles.password.update');
    });

    Route::prefix('suppliers')->group(function(){
        Route::get('/view', 'backend\SupplierController@view')->name('suppliers.view');
        Route::get('/add', 'backend\SupplierController@add')->name('suppliers.add');
        Route::post('/store', 'backend\SupplierController@store')->name('suppliers.store');
        Route::get('/edit/{id}', 'backend\SupplierController@edit')->name('suppliers.edit');
        Route::post('/update/{id}', 'backend\SupplierController@update')->name('suppliers.update');
        Route::get('/delete/{id}', 'backend\SupplierController@delete')->name('suppliers.delete');
        Route::get('/credit', 'backend\SupplierController@creditSupplier')->name('suppliers.credit');
        Route::get('/credit/pdf', 'backend\SupplierController@creditSupplierPdf')->name('suppliers.credit.pdf');
        Route::get('/purchase/edit/{purchase_info_id}', 'backend\SupplierController@editPurchase')->name('suppliers.edit.purchase');
        Route::post('/purchase/update/{purchase_info_id}', 'backend\SupplierController@updatePurchase')->name('suppliers.update.purchase');
        Route::get('/purchase/details/pdf/{purchase_info_id}', 'backend\SupplierController@purchaseDetailsPdf')->name('purchase.details.pdf');
        Route::get('/paid', 'backend\SupplierController@paidSupplier')->name('suppliers.paid');
        Route::get('/paid/pdf', 'backend\SupplierController@paidSupplierPdf')->name('suppliers.paid.pdf');
        Route::get('/wise/report', 'backend\SupplierController@supplierWiseReport')->name('suppliers.wise.report');
        Route::get('/wise/credit/report', 'backend\SupplierController@supplierWiseCredit')->name('suppliers.wise.credit.report');
        Route::get('/wise/paid/report', 'backend\SupplierController@supplierWisePaid')->name('suppliers.wise.paid.report');
        Route::get('/wise/both/report', 'backend\SupplierController@supplierWiseBoth')->name('suppliers.wise.both.report');
    });

    Route::prefix('customers')->group(function(){
        Route::get('/view', 'backend\CustomerController@view')->name('customers.view');
        Route::get('/add', 'backend\CustomerController@add')->name('customers.add');
        Route::post('/store', 'backend\CustomerController@store')->name('customers.store');
        Route::get('/edit/{id}', 'backend\CustomerController@edit')->name('customers.edit');
        Route::post('/update/{id}', 'backend\CustomerController@update')->name('customers.update');
        Route::get('/delete/{id}', 'backend\CustomerController@delete')->name('customers.delete');
        Route::get('/credit', 'backend\CustomerController@creditCustomer')->name('customers.credit');
        Route::get('/credit/pdf', 'backend\CustomerController@creditCustomerPdf')->name('customers.credit.pdf');
        Route::get('/invoice/edit/{invoice_id}', 'backend\CustomerController@editInvoice')->name('customers.edit.invoice');
        Route::post('/invoice/update/{invoice_id}', 'backend\CustomerController@updateInvoice')->name('customers.update.invoice');
        Route::get('/invoice/details/pdf/{invoice_id}', 'backend\CustomerController@invoiceDetailsPdf')->name('invoice.details.pdf');
        Route::get('/paid', 'backend\CustomerController@paidCustomer')->name('customers.paid');
        Route::get('/paid/pdf', 'backend\CustomerController@paidCustomerPdf')->name('customers.paid.pdf');
        Route::get('/wise/report', 'backend\CustomerController@customerWiseReport')->name('customers.wise.report');
        Route::get('/wise/credit/report', 'backend\CustomerController@customerWiseCredit')->name('customers.wise.credit.report');
        Route::get('/wise/paid/report', 'backend\CustomerController@customerWisePaid')->name('customers.wise.paid.report');
        Route::get('/wise/both/report', 'backend\CustomerController@customerWiseBoth')->name('customers.wise.both.report');
    });

    Route::prefix('units')->group(function(){
        Route::get('/view', 'backend\UnitController@view')->name('units.view');
        Route::get('/add', 'backend\UnitController@add')->name('units.add');
        Route::post('/store', 'backend\UnitController@store')->name('units.store');
        Route::get('/edit/{id}', 'backend\UnitController@edit')->name('units.edit');
        Route::post('/update/{id}', 'backend\UnitController@update')->name('units.update');
        Route::get('/delete/{id}', 'backend\UnitController@delete')->name('units.delete');
    });

    Route::prefix('categories')->group(function(){
        Route::get('/view', 'backend\CategoryController@view')->name('categories.view');
        Route::get('/add', 'backend\CategoryController@add')->name('categories.add');
        Route::post('/store', 'backend\CategoryController@store')->name('categories.store');
        Route::get('/edit/{id}', 'backend\CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'backend\CategoryController@update')->name('categories.update');
        Route::get('/delete/{id}', 'backend\CategoryController@delete')->name('categories.delete');
    });

    Route::prefix('products')->group(function(){
        Route::get('/view', 'backend\ProductController@view')->name('products.view');
        Route::get('/add', 'backend\ProductController@add')->name('products.add');
        Route::post('/store', 'backend\ProductController@store')->name('products.store');
        Route::get('/edit/{id}', 'backend\ProductController@edit')->name('products.edit');
        Route::post('/update/{id}', 'backend\ProductController@update')->name('products.update');
        Route::get('/delete/{id}', 'backend\ProductController@delete')->name('products.delete');
    });

    Route::prefix('purchase')->group(function(){
        Route::get('/view', 'backend\PurchaseController@view')->name('purchase.view');
        Route::get('/add', 'backend\PurchaseController@add')->name('purchase.add');
        Route::post('/store', 'backend\PurchaseController@store')->name('purchase.store');
        Route::get('/pending', 'backend\PurchaseController@pendingList')->name('purchase.pending.list');
        Route::get('/approve/{id}', 'backend\PurchaseController@approve')->name('purchase.approve');
        Route::get('/delete/{id}', 'backend\PurchaseController@delete')->name('purchase.delete');
        Route::post('/aprove/store/{id}', 'backend\PurchaseController@purchaseAprovalStore')->name('purchase.aproval.store');
        Route::get('/print/list','backend\PurchaseController@printPurchaseList')->name('purchase.print.list');
        Route::get('/print/{id}','backend\PurchaseController@printPurchase')->name('purchase.print');
        Route::get('/report', 'backend\PurchaseController@purchaseReport')->name('purchase.report');
        Route::get('/report/pdf', 'backend\PurchaseController@purchaseReportPdf')->name('purchase.report.pdf');
    });

    Route::get('/get-category','backend\DefaultController@getCategory')->name('get-category');
    Route::get('/get-product','backend\DefaultController@getProduct')->name('get-product');


    Route::prefix('invoice')->group(function(){
        Route::get('/view', 'backend\InvoiceController@view')->name('invoice.view');
        Route::get('/add', 'backend\InvoiceController@add')->name('invoice.add');
        Route::post('/store', 'backend\InvoiceController@store')->name('invoice.store');
        Route::get('/pending', 'backend\InvoiceController@pendingList')->name('invoice.pending.list');
        Route::get('/approve/{id}', 'backend\InvoiceController@approve')->name('invoice.approve');
        Route::get('/delete/{id}', 'backend\InvoiceController@delete')->name('invoice.delete');
        Route::post('/aprove/store/{id}', 'backend\InvoiceController@aprovalStore')->name('aproval.store');
        Route::get('/print/list','backend\InvoiceController@printInvoiceList')->name('invoice.print.list');
        Route::get('/print/{id}','backend\InvoiceController@printInvoice')->name('invoice.print');
        Route::get('/daily/report','backend\InvoiceController@dailyReport')->name('invoice.daily.report');
        Route::get('/daily/report/pdf','backend\InvoiceController@dailyReportPdf')->name('invoice.daily.report.pdf');
    });

    Route::get('/get-stock','backend\DefaultController@getStock')->name('check-product-stock');


    Route::prefix('stock')->group(function(){
        Route::get('/report', 'backend\StockController@stockReport')->name('stock.report');
        Route::get('/report/pdf', 'backend\StockController@stockReportPdf')->name('stock.report.pdf');
        Route::get('/report/supplier/product/wise', 'backend\StockController@supplierProductWise')->name('stock.report.supplier.product.wise');
        Route::get('/report/supplier/wise/pdf', 'backend\StockController@supplierWisePdf')->name('stock.report.supplier.wise.pdf');
        Route::get('/report/product/wise/pdf', 'backend\StockController@productWisePdf')->name('stock.report.product.wise.pdf');
    });
});






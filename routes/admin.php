<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'IndexController@index')->name('admin.index');
    Route::resource('product', 'ProductController');
    Route::resource('product-class', 'ProductClassController');

    Route::get('order', 'OrderController@index')->name('admin.order.index');
    Route::get('order/detail', 'OrderController@detail')->name('admin.order.detail');


    Route::get('user', 'WechatUserController@index')->name('admin.user.index');
    Route::get('resource', 'ResourceController@index')->name('admin.resource.index');

    Route::get('hot', 'HotController@index')->name('admin.hot.index');
    Route::get('hot/{id}/edit', 'HotController@edit')->name('admin.hot.edit');
    Route::put('hot/update', 'HotController@update')->name('admin.hot.update');
    Route::get('hot/join', 'HotController@join')->name('admin.hot.join');

    Route::get('commission', 'CommissionLogController@index')->name('admin.commission.index');
    Route::get('cash', 'CashLogController@index')->name('admin.cash.index');

    Route::get('system-config/edit', 'SystemConfigController@edit')->name('admin.system.edit');
    Route::post('system-config/update', 'SystemConfigController@update')->name('admin.system.update');

    Route::get('admin-user/edit', 'AdminUserController@edit')->name('admin.adminUser.edit');
    Route::post('admin-user/update', 'AdminUserController@update')->name('admin.adminUser.update');

    // 上传
    Route::post('upload/image', 'UploadController@image')->name('admin.upload.image');
});

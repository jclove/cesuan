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

Route::any('pay/wechat-notify', 'PayController@wechatNotify')->name('web.pay.wechatNotify');
Route::any('pay/alipay-notify', 'PayController@aliPayNotify')->name('web.pay.aliPayNotify');

Route::group(['as' => 'web.', 'middleware' => ['handle','wechatOAuth','agentRelation']], function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('product/index', 'ProductController@index')->name('product.index');
    Route::get('product/show-pay', 'ProductController@showPay')->name('product.showPay');
    Route::get('product/show', 'ProductController@show')->name('product.show');

    // 保存订单
    Route::post('order/store', 'OrderController@store')->name('order.store');
    // 支付
    Route::get('pay/wechat', 'PayController@wechat')->name('pay.wechat');
    Route::get('pay/alipay', 'PayController@alipay')->name('pay.alipay');
    Route::get('pay/pay-return', 'PayController@payReturn')->name('pay.payReturn');
    Route::post('pay/check-pay', 'PayController@checkPay')->name('pay.checkPay');

    // 用户中心
    Route::get('user', 'UserController@index')->name('user');
    Route::get('user/agent', 'UserController@agent')->name('user.agent');
    Route::get('user/ranking', 'UserController@ranking')->name('user.ranking');
    Route::get('user/poster', 'UserController@poster')->name('user.poster');
    Route::get('user/poster-create', 'UserController@posterCreate')->name('user.posterCreate');
    Route::get('user/cash-log', 'UserController@cashLog')->name('user.cashLog');
    Route::get('user/cash', 'UserController@cash')->name('user.cash');
    Route::get('user/commission-log', 'UserController@commissionLog')->name('user.commissionLog');
    Route::get('user/wechat', 'UserController@wechat')->name('user.wechat');
    Route::get('user/kefu', 'UserController@kefu')->name('user.kefu');
    Route::post('user/user-cash', 'UserController@userCash')->name('user.userCash');
    Route::get('user/my', 'UserController@my')->name('user.my');
});

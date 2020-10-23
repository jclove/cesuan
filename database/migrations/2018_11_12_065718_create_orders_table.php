<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wechat_user_id')->default(0)->comment('微信用户ID');
            $table->mediumInteger('product_id')->default(0)->comment('产品Id');
            $table->string('out_trade_no', 45)->unique()->default('')->comment('订单号');
            $table->string('transaction_id', 45)->default('')->comment('微信支付订单号');
            $table->float('total_fee', 8, 2)->default(0)->comment('价格');
            $table->float('price', 8, 2)->default(0)->comment('原价格');
            $table->string('body')->default('')->comment('描述');
            $table->string('pay_user')->default('')->comment('支付用户');
            $table->enum('pay_status', ['yes', 'no', 'close', 'refund'])->default('no')->comment('支付状态');
            $table->bigInteger('pay_time')->default(0)->comment('支付时间');
            $table->enum('pay_type', ['h5wechat', 'h5alipay','pcwechat', 'wechat', 'alipay', 'none'])->default('none')->comment('支付类型');
            $table->string('realname', 45)->default('')->comment('真实姓名');
            $table->string('birthday', 45)->default('')->comment('生日时间');
            $table->tinyInteger('sex')->default(0)->comment('性别');
            $table->string('birthtime')->default('')->comment('生辰');
            $table->string('other_realname', 45)->default('')->comment('真实姓名');
            $table->string('other_birthday', 45)->default('')->comment('生日时间');
            $table->tinyInteger('other_sex')->default(0)->comment('性别');
            $table->string('other_birthtime')->default('')->comment('生辰');
            $table->string('share_from', 45)->default('')->comment('分享来源');
            $table->mediumText('content')->nullable()->comment('内容');
            $table->enum('type', ['mobile', 'wechat', 'pc'])->default('mobile')->comment('订单类型');
            $table->index('wechat_user_id');
            $table->index('product_id');
            $table->index('pay_status');
            $table->index('pay_type');
            $table->index('type');
            $table->index('transaction_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wechat_user_id')->default(0)->comment('微信用户');
            $table->string('out_trade_no', 45)->unique()->default('')->comment('订单编号');
            $table->decimal('total_fee',8,2)->comment('提现金额');
            $table->string('transaction_id', 45)->default('')->comment('微信付款单号');
            $table->bigInteger('pay_time')->default(0)->comment('付款成功时间');
            $table->enum('pay_status', ['yes', 'no'])->default('no')->comment('支付状态');
            $table->index('wechat_user_id');
            $table->index('pay_status');
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
        Schema::dropIfExists('cash_logs');
    }
}

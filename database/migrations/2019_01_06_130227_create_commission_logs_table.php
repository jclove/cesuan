<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wechat_user_id')->default(0)->comment('微信用户');
            $table->integer('order_id')->default(0)->comment('订单ID');
            $table->integer('buy_user_id')->default(0)->comment('购买用户ID');
            $table->decimal('buy_total_fee', 8, 2)->default(0)->comment('购买金额');
            $table->decimal('proportion', 8, 2)->default(0)->comment('比例');
            $table->decimal('finally', 8, 2)->default(0)->comment('结算');
            $table->unique(['order_id', 'wechat_user_id']);
            $table->index('buy_user_id');
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
        Schema::dropIfExists('commission_logs');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechat_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid', 100)->unique()->default('')->comment('uuid');
            $table->string('openid', 100)->unique()->default('')->comment('公众号openid');
            $table->string('nickname', 45)->default('')->comment('昵称');
            $table->unsignedTinyInteger('sex')->default(0)->comment('性别，1男，2女,0未知');
            $table->string('city', 45)->default('')->comment('城市');
            $table->string('province', 45)->default('')->comment('省份');
            $table->string('headimgurl', 250)->default('')->comment('头像');
            $table->unsignedTinyInteger('subscribe')->default(0)->comment('是否关注');
            $table->unsignedInteger('subscribe_time')->default(0)->comment('关注时间');
            $table->string('remark')->default('')->comment('备注');
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
        Schema::dropIfExists('wechat_users');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('id');
            $table->text('referer')->nullable()->comment('来源');
            $table->string('platform', 45)->default('')->comment('平台');
            $table->string('keyword')->default('')->comment('关键词');
            $table->string('ip', 45)->default('')->comment('ip地址');
            $table->string('region', 45)->default('')->comment('省份');
            $table->string('city', 45)->default('')->comment('城市');
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
        Schema::dropIfExists('resources');
    }
}

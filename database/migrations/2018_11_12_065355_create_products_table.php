<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('pid')->default(0)->comment('所属分类');
            $table->string('name', 45)->default('')->comment('名称');
            $table->string('alias', 45)->default('')->comment('简称');
            $table->string('desc')->default('')->comment('描述');
            $table->string('identity', 45)->unique()->default('')->comment('标识');
            $table->float('total_fee', 8,2)->default(0)->comment('价格');
            $table->float('wechat_total_fee', 8,2)->default(0)->comment('价格');
            $table->float('price', 8,2)->default(0)->comment('原价格');
            $table->mediumInteger('sort')->default(0)->comment('排序');
            $table->enum('status', ['yes', 'no'])->default('yes')->comment('状态');
            $table->index('pid');
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
        Schema::dropIfExists('products');
    }
}

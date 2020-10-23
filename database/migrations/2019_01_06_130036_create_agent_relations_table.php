<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wechat_user_id')->default(0)->comment('微信会员ID');
            $table->integer('pid')->default(0)->comment('父级ID');
            $table->tinyInteger('level')->default(0)->comment('级别');
            $table->index('level');
            $table->unique(['wechat_user_id', 'pid']);
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
        Schema::dropIfExists('agent_relations');
    }
}

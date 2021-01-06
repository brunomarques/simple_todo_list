<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_items', function (Blueprint $table) {
            $table->id();
            $table->integer('item_atividades_id')->unsigned()->index();
            $table->integer('item_id')->after("item_atividades_id")->default(0);
            $table->string("nome", 120);
            $table->integer('ordem')->unsigned()->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_atividades_id')->references('id')->on('item_atividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_items');
    }
}

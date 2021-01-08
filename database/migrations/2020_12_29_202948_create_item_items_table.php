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
            $table->foreignId('atividade_id')->constrained('atividades');
            $table->foreignId('item_pai_id')->constrained('item_atividades');
            $table->integer('item_filho_id')->unsigned()->default(0);
            $table->integer('ordem')->unsigned()->default(0);

            $table->timestamps();
            $table->softDeletes();
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

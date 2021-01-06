<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_atividades', function (Blueprint $table) {
            $table->id();
            $table->integer('atividade_id')->unsigned()->index();
            $table->string("nome", 120);
            $table->integer('pai_id')->unsigned()->default(0);
            $table->integer('filho_id')->unsigned()->idefault(0);
            $table->integer('ordem')->unsigned()->default(0);
            $table->dateTime('concluded_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('atividade_id')->references('id')->on('atividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_atividades');
    }
}

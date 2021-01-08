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
            $table->foreignId('atividade_id')->constrained('atividades');
            $table->string("nome", 120);
            $table->integer('ordem')->unsigned()->default(0);
            $table->dateTime('concluded_at')->nullable();

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
        Schema::dropIfExists('item_atividades');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaiIdToItemAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_atividades', function (Blueprint $table) {
            $table->integer('pai_id')->unsigned()->nullable()->after("atividade_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_atividades', function (Blueprint $table) {
            $table->dropColumn("pai_id");
        });
    }
}

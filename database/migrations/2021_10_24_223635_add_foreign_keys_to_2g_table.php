<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysTo2gTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('2g', function (Blueprint $table) {
            $table->foreign(['sector_id'], '2g_ibfk_1')->references(['sector_id'])->on('sectors')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('2g', function (Blueprint $table) {
            $table->dropForeign('2g_ibfk_1');
        });
    }
}

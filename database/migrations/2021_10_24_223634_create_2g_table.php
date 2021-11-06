<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create2gTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2g', function (Blueprint $table) {
            $table->integer('2G_index', true);
            $table->integer('sector_id')->index('sector_id');
            $table->string('cell_identification');
            $table->string('channel_number');
            $table->string('frequence(G900)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('2g');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3gTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3g', function (Blueprint $table) {
            $table->integer('3G_index', true);
            $table->integer('sector_id')->index('sector_id');
            $table->string('cell_identification');
            $table->string('primary_scrambling_code');
            $table->string('frequence(U900)');
            $table->string('frequence(U2100)')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('3g');
    }
}

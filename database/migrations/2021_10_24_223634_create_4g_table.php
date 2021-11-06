<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create4gTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('4g', function (Blueprint $table) {
            $table->integer('4G_index', true);
            $table->integer('sector_id')->index('sector_id');
            $table->string('physical_cell_identity');
            $table->string('frequence(L800)');
            $table->string('frequence(L1800)')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('4g');
    }
}

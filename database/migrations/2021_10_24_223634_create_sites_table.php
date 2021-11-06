<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->integer('site_id', true);
            $table->integer('user_id')->index('user_id');
            $table->string('name');
            $table->string('mode');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('height');
            $table->string('client');
            $table->timestamp('dateCreated')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}

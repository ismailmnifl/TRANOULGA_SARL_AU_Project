<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->integer('mission_id', true);
            $table->string('type');
            $table->string('priority');
            $table->integer('user_id')->index('user_id');
            $table->text('description');
            $table->date('dateOfDelivery');
            $table->string('data');
            $table->string('status');
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
        Schema::dropIfExists('missions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_service', function (Blueprint $table) {
            $table->foreignId('hospital_id');
            $table->foreignId('service_id');
            $table->integer('rate')->nullable();
            $table->bigInteger('reviewer')->nullable();
            $table->bigInteger('star_1')->nullable();
            $table->bigInteger('star_2')->nullable();
            $table->bigInteger('star_3')->nullable();
            $table->bigInteger('star_4')->nullable();
            $table->bigInteger('star_5')->nullable();
            $table->primary(['hospital_id', 'service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospital_service');
    }
};

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
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('car_id')->unsigned();
            $table->string('car_model');
            $table->string('car_brand');
            $table->integer('year')->unsigned();
            $table->string('plate_id')->unique();
            $table->enum('status',['active','out of service'])->default('active');
            $table->foreignId('office_id')->references('office_id')->on('offices');
            $table->float('price')->unsigned();
            $table->string('color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};

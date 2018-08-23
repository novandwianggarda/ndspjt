<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(); // nama lokasi
            $table->string('address')->nullable(); // alamat
            $table->string('land_area')->nullable(); // luas tanah
            $table->string('building_area')->nullable(); // luas bangunan
            $table->string('block')->nullable(); // blok
            $table->string('floor')->nullable(); // lantai
            $table->string('unit')->nullable(); // unit
            $table->string('electricity')->nullable(); // listirk
            $table->string('water')->nullable(); // air
            $table->string('telephone')->nullable(); // telepon
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}

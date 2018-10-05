<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('years', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('certificate_id')->default(0);
            $table->integer('tax_id')->default(0);
            $table->year('year')->nullable(); // tahun pajak
            
             // NJOP
            $table->double('njop_land', 12, 2)->nullable(); // nilai pajak tanah
            $table->double('njop_building', 12, 2)->nullable(); // nilai pajak bangunan
            $table->string('njop_total')->nullable();
            $table->string('ptkp')->nullable();
            $table->string('stimulus')->nullable();
            $table->string('pbbygdbyr')->nullable();

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
        Schema::dropIfExists('years');
    }
}

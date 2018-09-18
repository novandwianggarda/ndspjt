<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('certificate_id')->default(0);
            $table->string('folder_pbb')->nullable();
            $table->string('rencana_group')->nullable();
            $table->year('year')->nullable(); // tahun pajak
             // NJOP
            $table->double('njop_land', 12, 2)->nullable(); // nilai pajak tanah
            $table->double('njop_building', 12, 2)->nullable(); // nilai pajak bangunan
            $table->double('njop_total', 12, 2)->nullable(); // nilai pajak njop total

            $table->date('due_date')->nullable(); // tgl batas maksimal pembayaran
            $table->date('due_date_ly')->nullable(); // tgl batas maksimal pembayaran tahun lalu
            $table->double('nominal_ly', 12, 2)->default(0); // nilai pajak tahun lalu
            $table->string('selisih')->nullable();

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
        Schema::dropIfExists('taxes');
    }
}

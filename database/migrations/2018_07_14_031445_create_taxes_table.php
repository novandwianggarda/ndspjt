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
            $table->integer('tax_type_id');
            $table->string('certificate_ids')->unique(); // can hold more that one certificate, ex: 1,2,3,4

            // TAX BASE
            $table->string('nop')->nullable(); // nomor objek pajak
            $table->string('owner')->nullable(); // wajib pajak
            $table->year('year')->nullable(); // tahun pajak
            $table->date('due_date')->nullable(); // tgl batas maksimal pembayaran
            $table->double('nominal_ly', 12, 2)->default(0); // nilai pajak tahun lalu
            $table->date('due_date_ly')->nullable(); // tgl batas maksimal pembayaran tahun lalu
            $table->text('note')->nullable(); // keterangan tambahan

            // ADDRESS
            $table->string('addr_address'); // letak objek pajak
            $table->string('addr_village'); // kelurahan / desa
            $table->string('addr_land_area'); // luas tanah di pbb
            $table->string('addr_building_area'); // luas tanah di pbb

            // NJOP
            $table->double('njop_land', 12, 2)->nullable(); // nilai pajak tanah
            $table->double('njop_building', 12, 2)->nullable(); // nilai pajak bangunan
            $table->double('njop_total', 12, 2)->nullable(); // nilai pajak njop total

            // CORPORATION
            $table->string('corp_name')->nullable(); // pt penanggung pajak
            $table->string('corp_payment_method')->nullable(); // pembayaran via apa

            // FOLDER FILLING
            $table->string('folder_number')->nullable(); // no di folder
            $table->string('folder_current')->nullable(); // folder saat ini
            $table->string('folder_plan')->nullable(); // rencana folder

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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('certificate_type_id')->default(0);

            // CERTIFICATES BASE
            $table->string('number')->unique(); // nomor sertifikat
            $table->string('name')->nullable(); // nama sertifikat (bkn org yg ada di sertifikat)
            $table->string('nop')->nullable(); // nomor objek pajak sertifikat
            $table->string('owner')->nullable(); // yg memiliki sertifikat
            $table->string('area')->nullable(); // luas sertifikat
            $table->string('published_date')->nullable(); // tgl sertifikat di keluarkan
            $table->string('expired_date')->nullable(); // tgl sertifikat berakhir (hanya utk SHCB dan SHMSRS)
            $table->text('note')->nullable(); // keterangan utk sertifikat

            // ADDRESS
            $table->string('addr_city')->nullable(); // kota/kab
            $table->string('addr_district')->nullable(); // kecamatan
            $table->string('addr_village')->nullable(); // kelurahan
            $table->string('addr_address')->nullable(); // alamat

            // AJB
            $table->double('ajb_nominal', 12, 2)->nullable(); // nominal uang di ajb
            $table->string('ajb_date')->nullable(); // tanggal ajb di tanda tangani

            // SCAN FILES
            $table->text('scan_certificate')->nullable(); // scan sertifikat
            $table->text('scan_plotting')->nullable(); // scan plotting sertifikat
            $table->text('scan_land_siteplan')->nullable(); //scan land siteplan
            $table->text('scan_krk')->nullable(); // scan krk
            $table->text('scan_imb')->nullable(); // scan imb

            // MAPS
            $table->text('map_coordinate')->nullable(); // JSON {lat:xxx, lng:xxx}
            $table->text('map_boundary')->nullable(); // JSON [{lat:xxx, lng:xxx}, {lat:xxx, lng:xxx}]
            $table->text('map_link')->nullable(); // url google my map

            // FOLDER FILLING
            $table->string('folder_number')->nullable(); // no di folder
            $table->string('folder_current')->nullable(); // folder saat ini
            $table->string('folder_plan')->nullable(); // rencana folder

            $table->timestamps();

            // $table->foreign('certificate_type_id')->references('id')->on('certificates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}

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
            $table->text('folder_sert')->nullable(); 
            $table->text('no_folder')->nullable(); 
            $table->string('no_hm_hgb')->nullable();
            
            $table->text('kepemilikan')->nullable(); 
            $table->text('nama_sertifikat')->nullable(); 
            $table->text('keterangan')->nullable(); 
            $table->text('archive')->nullable(); 
            $table->text('kota')->nullable(); 
            $table->text('nop')->nullable(); 

            $table->text('kecamatan')->nullable(); 
            $table->text('kelurahann')->nullable(); 
            $table->text('purposes')->nullable(); 


            $table->text('addrees')->nullable(); 
            $table->string('published_date')->nullable(); // tgl sertifikat di keluarkan
            $table->string('expired_date')->nullable(); // tgl sertifikat berakhir (hanya utk SHCB dan SHMSRS)
            
            // AJB
            $table->string('ajb_nominal')->nullable(); // nominal uang di ajb
            $table->string('ajb_date')->nullable(); // tanggal ajb di tanda tangani
            
            // MAPS
            $table->text('boundary_coordinates')->nullable(); // JSON {lat:xxx, lng:xxx}

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

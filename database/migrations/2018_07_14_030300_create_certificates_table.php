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
            $table->integer('no_hm_hgb')->nullable();
            $table->text('kepemilikan')->nullable(); 
            $table->text('nama_sertifikat')->nullable(); 
            $table->text('keterangan')->nullable(); 
            $table->text('archive')->nullable(); 
            $table->text('kelurahan')->nullable(); 
            $table->text('kecamatan')->nullable(); 
            $table->text('kota')->nullable(); 
            $table->integer('luas_sertifikat')->nullable();
            $table->text('addrees')->nullable(); 
            $table->text('purposes')->nullable(); 
            $table->text('penanggung_pbb')->nullable(); 
            $table->text('wajib_pajak')->nullable(); 
            $table->string('published_date')->nullable(); // tgl sertifikat di keluarkan
            $table->string('expired_date')->nullable(); // tgl sertifikat berakhir (hanya utk SHCB dan SHMSRS)
            
            // AJB
            $table->double('ajb_nominal', 12, 2)->nullable(); // nominal uang di ajb
            $table->string('ajb_date')->nullable(); // tanggal ajb di tanda tangani
            
            // MAPS
            $table->text('map_coordinate')->nullable(); // JSON {lat:xxx, lng:xxx}

            //PBB 
            $table->text('letak_objek_pajak')->nullable(); 
            $table->text('kelurahan_pbb')->nullable(); 
            $table->text('kota_pbb')->nullable(); 
            $table->text('nop')->nullable(); 
            $table->integer('luas_tanah_pbb')->nullable(); 
            $table->integer('luas_bangun_pbb')->nullable(); 


            

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

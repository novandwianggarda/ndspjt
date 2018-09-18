<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificateDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_docs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('certificate_id');
            $table->string('nama_file'); // singkatan: HGB
            $table->string('title'); // kepanjangan: Hak Guna Bangunan
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
        Schema::dropIfExists('certificate_docs');
    }
}

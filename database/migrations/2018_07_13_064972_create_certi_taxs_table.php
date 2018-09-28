<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertiTaxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certi_taxs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tax_id');
            $table->unsignedInteger('certificate_id');
            $table->timestamps();

            $table->unique(['tax_id','certificate_id']);
            $table->foreign('tax_id')->references('id')->on('taxs')->onDelete('cascade');
            $table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certi_taxs');
    }
}

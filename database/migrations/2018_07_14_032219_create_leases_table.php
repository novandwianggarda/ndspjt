<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('certificate_ids')->unique(); // bisa lebih dari satu sertifikat
            $table->integer('lease_type_id'); // tipe properti (rumah, tanah, dll)
            $table->integer('lease_payment_id'); // payment terms id

            // LEASE
            $table->string('lessor')->nullable(); // yang menyewakan
            $table->string('tenant')->nullable(); // nama penyewa
            $table->string('purpose')->nullable(); // keperluan disewa untuk
            $table->date('start')->nullable(); // tanggal mulai sewa
            $table->date('end')->nullable(); // tanggal berakhir sewa
            $table->text('note')->nullable(); // keterangan

            // PROPERTY
            $table->string('prop_name')->nullable(); // nama lokasi
            $table->string('prop_address')->nullable(); // alamat
            $table->string('prop_land_area')->nullable(); // luas tanah
            $table->string('prop_building_area')->nullable(); // luas bangunan
            $table->string('prop_block')->nullable(); // blok
            $table->string('prop_floor')->nullable(); // lantai
            $table->string('prop_unit')->nullable(); // unit
            $table->string('prop_electricity')->nullable(); // listirk
            $table->string('prop_water')->nullable(); // air
            $table->string('prop_telephone')->nullable(); // telepon

            // BROKER
            $table->string('brok_name')->nullable(); // nama makelar
            $table->double('brok_fee_yearly', 12, 2)->default(0); // harga per tahun
            $table->double('brok_fee_paid', 12, 2)->default(0); // total dibayar

            // GRACE
            $table->string('grace_period')->nullable(); // berapa bulan
            $table->date('grace_start')->nullable(); // tgl awal grace
            $table->date('grace_end')->nullable(); // tgl akhir grace

            // PRICES
            $table->double('sell_monthly', 12, 2)->default(0); // harga penawaran perbulan
            $table->double('sell_yearly', 12, 2)->default(0); // harga penawaran pertahun
            // $table->double('rent_monthly', 12, 2)->default(0); // harga tersewa perbulan
            // $table->double('rent_yearly', 12, 2)->default(0); // harga tersewa pertahun
            $table->double('rent_assurance', 12, 2)->default(0); // jaminan sewa

            // INCOMES
            // $table->double('inc_total', 12, 2)->default(0); // pendapatan total termasuk pph
            // $table->double('inc_pph_yearly', 12, 2)->default(0); // PPH per tahun

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
        Schema::dropIfExists('leases');
    }
}

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
            $table->integer('lease_type_id'); // tipe properti (rumah, tanah, dll) id
            $table->integer('lease_payment_id')->default(0); // payment history id

            // LEASE BASE
            $table->string('lessor')->nullable(); // yang menyewakan
            $table->boolean('lessor_pkp'); // pkp yg menyewakan, true jika ya, false jika tidak
            $table->string('tenant')->nullable(); // nama penyewa
            $table->string('purpose')->nullable(); // keperluan disewa untuk apa
            $table->date('start')->nullable(); // tanggal mulai sewa
            $table->date('end')->nullable(); // tanggal berakhir sewa
            $table->text('note')->nullable(); // keterangan

            // LEASE DEED aka Akta Sewa
            $table->text('lease_deed'); // nomor akta sewa
            $table->text('lease_deed_date'); // tanggal akta sewa

            // PAYMENT TERMS
            $table->text('payment_terms')->nullable(); // as json
            // ex: {['number':1, 'total':900000, 'due_date':'2019-01-15', 'note':'lorem ipsum'],
            //      ['number':2, 'total':1000000, 'due_date':'2019-05-15', 'note':'lorem ipsum']}

            // PRICES
            $table->double('sell_monthly', 13, 2)->default(0); // harga penawaran perbulan
            $table->double('sell_yearly', 13, 2)->default(0); // harga penawaran pertahun
            $table->double('rent_m2_monthly', 13, 2)->default(0); // harga tersewa permeter perbulan
            $table->enum('rent_m2_monthly_type', ['land', 'building'])->default('building'); // tipe harga sewa permeter perbulan (land/building)
            $table->double('rent_price', 13, 2)->default(0); // harga tersewa (bisa perbulan/pertahun)
            $table->enum('rent_price_type', ['monthly', 'yearly'])->default('yearly'); // bulanan / tahunan
            $table->double('rent_assurance', 13, 2)->default(0); // jaminan sewa

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
            $table->double('brok_fee_yearly', 13, 2)->default(0); // harga per tahun
            $table->double('brok_fee_paid', 13, 2)->default(0); // total dibayar

            // GRACE
            $table->date('grace_start')->nullable(); // tgl awal grace
            $table->date('grace_end')->nullable(); // tgl akhir grace

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

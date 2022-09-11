<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggarans', function (Blueprint $table) {
            $table->id();
            $table->string('petugas');
            $table->string('nama');
            $table->string('nik');
            $table->string('fl_nik');
            $table->string('pekeerjaan');
            $table->string('nohp');
            $table->string('jns_pelanggaran');
            $table->string('lks_pelanggaran');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('sanksi');
            $table->text('alamat');
            $table->longText('desk_pelanggaran');
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
        Schema::dropIfExists('pelanggarans');
    }
}

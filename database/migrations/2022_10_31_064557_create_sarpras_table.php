<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarpras', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sarpras');
            $table->string('kategori_id');
            $table->string('nama_sarpras');
            $table->string('jumlah_sarpras');
            $table->string('jumlah_normal');
            $table->string('jumlah_rusak');
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
        Schema::dropIfExists('sarpras');
    }
};

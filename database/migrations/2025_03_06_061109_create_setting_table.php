<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       // Setting Table
       Schema::create('setting', function (Blueprint $table) {
        $table->id('id_setting');
        $table->string('nama_perusahaan');
        $table->text('alamat')->nullable();
        $table->string('telepon');
        $table->string('path_logo')->nullable();
        $table->string('path_kartu_member')->nullable();
        $table->tinyInteger('tipe_nota');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting');
    }
};

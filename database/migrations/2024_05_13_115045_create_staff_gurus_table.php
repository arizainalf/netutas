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
        Schema::create('staff_gurus', function (Blueprint $table) {
            $table->id();
            $table->string('image')->default('staff.png');
            $table->string('nama');
            $table->UnsignedBigInteger('id_jabatan');
            $table->UnsignedBigInteger('id_mapel');
            $table->timestamps();

            $table->foreign('id_jabatan')->references('id')->on('jabatans')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id')->on('mapels')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_gurus');
    }
};
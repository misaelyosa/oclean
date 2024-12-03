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
        Schema::create('BankSampah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('totalSampah');
            $table->unsignedBigInteger('admin');
            $table->foreign('admin')->references('id')->on('users');
            $table->unsignedBigInteger('id_lokasi');
            $table->foreign('id_lokasi')->references('id')->on('ekosistems');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BankSampah');
    }
};

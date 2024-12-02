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
        Schema::create('TransaksiSampah', function (Blueprint $table) {
            $table->id();
            $table->integer('berat');
            $table->boolean('status')->nullable()->default(false);
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_bnksmph');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_bnksmph')->references('id')->on('BankSampah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TransaksiSampah');
    }
};

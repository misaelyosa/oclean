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
            // $table->integer('berat');
            $table->boolean('status')->nullable()->default(false);
            $table->integer("berat");
            $table->string("foto")->nullable();
            // $table->boolean("verified")->default(false);
            // $table->bigInteger("admin_id");
            
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_bnksmph');
            $table->foreign('user_id')->references('id')->on('users');
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

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
        Schema::create('ordines', function (Blueprint $table) {
            $table->id();
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto5')->nullable();
            $table->string('foto6')->nullable();
            $table->string('foto7')->nullable();
            $table->string('foto8')->nullable();
            $table->string('foto9')->nullable();
            $table->string('foto10')->nullable();
            $table->string('numero_ordine')->nullable();
            $table->string('fotografo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordines');
    }
};

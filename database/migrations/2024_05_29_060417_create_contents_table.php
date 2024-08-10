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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('parent');
            $table->integer('parentId');
            $table->string('lang');
            $table->string('baslik');
            $table->string('baslik2')->nullable();
            $table->text('aciklama')->nullable();
            $table->text('kisaaciklama')->nullable();
            $table->text('deger1')->nullable();
            $table->text('deger2')->nullable();
            $table->text('deger3')->nullable();
            $table->string('dosya1')->nullable();
            $table->string('dosya2')->nullable();
            $table->string('dosya3')->nullable();
            $table->string('url')->nullable();
            $table->string('link')->nullable(); // harici bir link verilmek istenirse kullanılacak
            $table->string('const_url')->nullable();
            $table->string('tag')->nullable();
            $table->string('tarih')->nullable(); // blog ve haber gibi kısımlarda kullanılacak
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};

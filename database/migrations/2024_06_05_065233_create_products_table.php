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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('parentId')->default(0);
            $table->integer('markaId')->default(0);
            $table->decimal('fiyat', 8, 2)->default(0);
            $table->decimal('onceki_fiyat', 8, 2)->default(0);
            $table->decimal('bayi_fiyati', 8, 2)->default(0);
            $table->integer('sira')->default(0);
            $table->integer('isActive')->default(1);
            $table->integer('stok')->default(0);
            $table->string('urunkodu')->nullable();
            $table->integer('satisadedi')->default(0);
            $table->integer('izlenme')->default(0);
            $table->text('varyasyon')->nullable();
            $table->text('video_linki')->nullable();
            $table->datetime('sure')->default('2000-01-01 01:01:01');
            $table->decimal('kargoucreti', 8, 2)->default(0);
            $table->integer('yeni')->default(0);
            $table->integer('populer')->default(0);
            $table->integer('onecikar')->default(0);
            $table->text('bagimlilik')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void {
        Schema::dropIfExists('products');
    }
};

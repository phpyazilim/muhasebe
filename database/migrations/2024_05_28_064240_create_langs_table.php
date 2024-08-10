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
        Schema::create('langs', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');
            $table->string('kisabaslik')->nullable();;
            $table->string('kod');
            $table->string('icon')->nullable();
            $table->enum('varsayilan' , [1 , 0] )->default(0);
            $table->integer('isActive')->default(1);
            $table->integer('sira')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('langs');
    }
};

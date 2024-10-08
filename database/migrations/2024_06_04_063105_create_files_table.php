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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->enum('type' , ['image' , 'file', 'video'] )->default('image');
            $table->string('parent');
            $table->integer('parentId');
            $table->string('url');
            $table->string('sira')->default(0);
            $table->integer('isActive')->default(1);
            $table->integer('isCover')->default(0);
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};

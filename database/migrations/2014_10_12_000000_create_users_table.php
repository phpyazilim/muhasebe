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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->default('/default/avatar.png');
            $table->string('banner')->default('/default/img1.jpg');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_type' , ['user' , 'admin'] )->default('user');
            $table->integer('yetki_id')->default(0);
            $table->text('vergi_no')->nullable();
            $table->text('phone')->nullable();
            $table->text('adres')->nullable();
            $table->text('website')->nullable();
            $table->text('facebook')->nullable();
            $table->text('x_link')->nullable();
            $table->text('instagram')->nullable();
            $table->text('il')->nullable();
            $table->text('ilce')->nullable();
            $table->integer('isActive')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

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
        Schema::create('brokers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->string('address')->required();
            $table->string('city')->required();
            $table->string('zip_code')->required();
            $table->integer('phone_number')->required();
            $table->string('logo_path')->required();
            $table->timestamps();

            $table->unique(['name', 'zip_code', 'phone_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brokers');
    }
};

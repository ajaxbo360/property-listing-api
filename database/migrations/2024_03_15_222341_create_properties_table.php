<?php

use App\Enums\ListingTypesEnum;
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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('broker_id');
            $table->string('address');
            $table->string('city');
            $table->string('zip_code');
            $table->enum('listing_type', [
                ListingTypesEnum::OPEN->value,
                ListingTypesEnum::SELL->value,
                ListingTypesEnum::RENT->value,
                ListingTypesEnum::EXCLUSIVE->value,
                ListingTypesEnum::NET->value,
            ])->default(ListingTypesEnum::OPEN);
            $table->longText('description');
            $table->year('build_year');


            $table->timestamps();

            $table->foreign('broker_id')->references('id')->on('brokers')->delete('cascade');
            $table->unique(['address', 'zip_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};

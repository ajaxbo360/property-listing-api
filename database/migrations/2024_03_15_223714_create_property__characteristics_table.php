<?php

use App\Enums\PropertyStatusEnum;
use App\Enums\PropertyTypeEnum;
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
        Schema::create('property__characteristics', function (Blueprint $table) {
            $table->unsignedBigInteger("property_id")->unique();
            $table->float("price");
            $table->float("sqft")->required();
            $table->float("price_sqft")->required();
            $table->integer("bedrooms")->required();
            $table->integer("bathrooms")->required();
            $table->enum("property_type", [
                PropertyTypeEnum::SINGLE->value,
                PropertyTypeEnum::TOWNHOUSE->value,
                PropertyTypeEnum::MULTIFAMILY->value,
                PropertyTypeEnum::BUNGALOW->value,

            ])->default(PropertyTypeEnum::SINGLE->value);
            $table->enum("status", [
                PropertyStatusEnum::SOLD->value,
                PropertyStatusEnum::SALE->value,
                PropertyStatusEnum::HOLD->value
            ])->default(PropertyStatusEnum::SALE->value)->required();
            $table->foreign("property_id")->references("id")->on("properties")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property__characteristics');
    }
};

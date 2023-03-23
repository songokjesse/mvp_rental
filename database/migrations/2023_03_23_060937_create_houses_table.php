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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('landlord_id');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('landlord_id')->references('id')->on('landlords');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};

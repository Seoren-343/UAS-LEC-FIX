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
        Schema::create('bus_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus_id');
            $table->string('image_path');
            $table->timestamps();

            $table->foreign('bus_id')->references('id')->on('busfleet')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_images');
    }
};

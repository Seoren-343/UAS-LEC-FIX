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
        Schema::create('busfleet', function (Blueprint $table) {
            $table->id();
            $table->string('bus_picture')->nullable();
            $table->enum('bus_type', ['big bus', 'medium bus', 'small bus']);
            $table->string('specs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('busfleet');
    }
};

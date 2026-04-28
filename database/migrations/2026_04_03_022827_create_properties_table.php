<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('address');
            $table->text('description')->nullable();

            // Property fields
            $table->string('room')->nullable();
            $table->string('room2')->nullable();
            $table->string('size')->nullable();
            $table->string('total')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
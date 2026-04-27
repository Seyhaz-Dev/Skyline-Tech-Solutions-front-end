<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('property');
            $table->date('lease_start')->nullable();
            $table->date('lease_end')->nullable();
            $table->decimal('monthly_rent', 10, 2);
            $table->enum('status', ['active', 'pending', 'inactive'])->default('pending');
            $table->timestamps();
            
            // Indexes for better performance
            $table->index(['name', 'email', 'phone']);
            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tenants');
    }
};
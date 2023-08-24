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
        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->string('hall_name');
            $table->text('description')->nullable();
            $table->string('price');
            $table->unsignedDecimal('charity_discount')->nullable();
            $table->string('status')->default('available');
            $table->datetime('check_in_datetime')->nullable();
            $table->datetime('check_out_datetime')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('halls');
    }
};

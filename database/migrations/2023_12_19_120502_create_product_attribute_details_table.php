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
        Schema::create('product_attribute_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_attribute_id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->boolean('is_active')->default(false);

            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attribute_details');
    }
};

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
        Schema::create('product_promotional_offer', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->constrained('products');
            $table->foreignUuid('promotional_offer_id')->constrained('promotional_offers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_promotional_offers');
    }
};

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
        Schema::create('product_color_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('product_item_id')->constrained('product_items');
            $table->foreignUuid('color_id')->constrained();
            $table->float('quantity')->default(0);
            $table->decimal('price')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_color_items');
    }
};

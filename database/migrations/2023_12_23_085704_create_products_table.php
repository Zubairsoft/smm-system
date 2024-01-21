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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('shop_id')->constrained();
            $table->foreignUuid('product_attribute_detail_id')->constrained();
            $table->foreignUuid('category_id')->constrained();
            $table->foreignUuid('brand_id')->constrained();
            $table->string('name');
            $table->text('description');
            $table->string('colors');
            $table->float('quantity');
            $table->decimal('price');
            $table->decimal('additional_price_for_size')->default(0);
            $table->decimal('additional_price_for_color')->default(0);
            $table->decimal('discount')->default(0);
            $table->integer('minimum_quantity');
            $table->boolean('is_active')->default(false);
            $table->boolean('can_refund_money')->default(true);
            $table->boolean('can_show_quantity')->default(true);

            $table->index(['shop_id', 'category_id', 'brand_id', 'name']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

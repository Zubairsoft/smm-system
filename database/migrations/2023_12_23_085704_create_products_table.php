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
            $table->uuid('shop_id');
            $table->uuid('product_attribute_detail_id');
            $table->uuid('category_id');
            $table->uuid('brand_id');
            $table->string('name');
            $table->text('description');
            $table->string('colors');
            $table->float('quantity');
            $table->decimal('price');
            $table->decimal('additional_price_for_size')->default(0);
            $table->decimal('additional_price_for_color')->default(0);
            $table->decimal('discount')->default(0);
            $table->decimal('total_price');
            $table->integer('minimum_quantity');
            $table->boolean('is_active')->default(false);
            $table->boolean('can_refund_money')->default(true);
            $table->boolean('can_show_quantity')->default(true);

            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('product_attribute_detail_id')->references('id')->on('product_attribute_details');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->index(['shop_id','product_attribute_detail_id','category_id','brand_id','name']);

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

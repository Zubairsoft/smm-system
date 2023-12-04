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
        Schema::create('shops', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('owner_name');
            $table->string('email');
            $table->string('email_verified_at')->nullable();
            $table->string('phone');
            $table->string('phone_verified_at')->nullable();
            $table->string('password');
            $table->text('description');
            $table->string('address'); //TODO it will foreign key
            $table->boolean('is_active')->default(true);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('cart_id'); // Foreign key to the carts table
            $table->unsignedBigInteger('product_id'); // Foreign key to the products table
            $table->integer('quantity')->default(1); // Number of items of this product
            $table->decimal('price', 10, 2); // Price of the product at the time it was added to the cart
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};

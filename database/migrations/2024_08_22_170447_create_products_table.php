<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('brand');
            $table->decimal('price', 10, 2);
            $table->decimal('shipping_fee', 10, 2);
            $table->decimal('weight', 8, 2);
            $table->unsignedInteger('stock');
            $table->enum('condition', ['New', 'Refurbished', 'Pre-Owned'])->default('New');
            $table->string('ship_from_address');
            $table->longText('description');
            $table->enum('status', ['Available', 'Sold', 'Out of Stock'])->default('Available');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}

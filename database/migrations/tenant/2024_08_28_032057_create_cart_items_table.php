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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key for user
            $table->foreignUuid('product_id')->constrained()->onDelete('cascade'); // Foreign key for product
            $table->unsignedInteger('quantity')->default(1); // Quantity of product in cart
            $table->decimal('price', 10, 2); // Price at the time the product was added to the cart
            $table->decimal('total_price', 10, 2); // Total price (price * quantity)
            $table->timestamps();
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

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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // primary key for order items
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // foreign key to orders
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // foreign key to products
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null'); // foreign key to categories
            Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // primary key for order items
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // foreign key to orders
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // foreign key to products
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null'); // foreign key to categories
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('set null');
            $table->integer('quantity'); // number of items ordered
            $table->decimal('price', 10, 2); // price at the time of the order
            $table->decimal('total_price', 10, 2); // total price for that product (quantity * price)
            $table->timestamps();
        });
            $table->integer('quantity'); // number of items ordered
            $table->decimal('price', 10, 2); // price at the time of the order
            $table->decimal('total_price', 10, 2); // total price for that product (quantity * price)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // order_id (primary key)
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade'); // foreign key to users table (assuming users table is for customers)
            $table->string('status')->default('pending'); // order status (e.g., pending, completed, canceled)
            $table->decimal('total_amount', 10, 2); // total amount of the order
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

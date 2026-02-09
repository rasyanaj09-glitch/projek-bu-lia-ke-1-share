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

    $table->engine = 'InnoDB';

    $table->id();

    $table->foreignId('user_id')
          ->constrained('users')
          ->cascadeOnDelete();

    $table->string('order_number')->unique();

    $table->decimal('total_amount', 12, 2);

    $table->enum('status', [
        'pending',
        'processing',
        'completed',
        'cancelled'
    ])->default('pending');

    $table->string('shipping_address');
    $table->string('shipping_phone');

    $table->enum('payment_method', [
        'transfer bank',
        'qr',
        'ewallet'
    ])->default('transfer bank');

    $table->enum('payment_status', [
        'pending',
        'paid',
        'failed'
    ])->default('pending');

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

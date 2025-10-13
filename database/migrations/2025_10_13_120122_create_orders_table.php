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
            $table->id();
            $table->string('order_no', 50)->unique();
            $table->foreignId('customer_id')->constrained('users');
            $table->foreignId('vendor_id')->constrained('vendors');
            $table->foreignId('address_id')->constrained('addresses');
            $table->enum('status',['pending','accepted','dispatched','delivered','cancelled'])->default('pending');
            $table->decimal('total_amount',10,2)->default(0.00);
            $table->enum('payment_type',['COD','PREPAID'])->default('COD');
            $table->foreignId('invoice_id')->nullable();
            $table->timestamps();
            $table->dateTime('delivered_at')->nullable();
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

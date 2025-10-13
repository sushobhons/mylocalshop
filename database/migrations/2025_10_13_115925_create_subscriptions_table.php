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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors');
            $table->foreignId('plan_id')->constrained('plans');
            $table->foreignId('payment_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['active', 'expired', 'cancelled'])->default('active');
            $table->dateTime('started_at');
            $table->dateTime('expires_at');
            $table->timestamps();
            $table->index('vendor_id', 'idx_sub_vendor');
            $table->index('status', 'idx_sub_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};

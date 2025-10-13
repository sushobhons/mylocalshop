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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable()->constrained('orders');
            $table->foreignId('subscription_id')->nullable()->constrained('subscriptions');
            $table->foreignId('user_id')->constrained('users');
            $table->decimal('amount',10,2);
            $table->string('payment_method',50);
            $table->enum('payment_status',['initiated','success','failed'])->default('initiated');
            $table->string('ref_no',100)->nullable();
            $table->timestamps();
            $table->index('payment_status','idx_payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

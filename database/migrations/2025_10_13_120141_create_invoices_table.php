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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no',50)->unique();
            $table->enum('entity_type',['subscription','order']);
            $table->unsignedBigInteger('entity_id');
            $table->decimal('amount',10,2);
            $table->string('prefix',10)->default('INV');
            $table->string('suffix',10)->default('');
            $table->string('financial_year',10)->nullable();
            $table->dateTime('generated_at')->useCurrent();
            $table->timestamps();
            $table->index(['entity_type','entity_id'],'idx_invoice_entity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

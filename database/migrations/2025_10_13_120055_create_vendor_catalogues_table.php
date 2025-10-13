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
        Schema::create('vendor_catalogues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors');
            $table->foreignId('product_id')->constrained('products');
            $table->decimal('vendor_price', 10, 2);
            $table->decimal('vendor_mrp', 10, 2);
            $table->integer('available_qty')->default(0);
            $table->boolean('is_available')->default(true);
            $table->timestamps();

            $table->unique(['vendor_id', 'product_id'], 'uq_vendor_product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_catalogues');
    }
};

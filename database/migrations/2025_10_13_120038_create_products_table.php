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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 100)->unique()->nullable();
            $table->string('name');
            $table->foreignId('brand_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->string('hsn_code', 50)->nullable();
            $table->string('uom', 50)->nullable();
            $table->decimal('mrp', 10, 2);
            $table->decimal('gst_rate', 5, 2)->default(0.00);
            $table->string('default_image', 512)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index('name', 'idx_product_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

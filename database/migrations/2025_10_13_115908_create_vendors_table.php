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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('shop_name');
            $table->string('authorized_person')->nullable();
            $table->string('pan_number', 50)->nullable();
            $table->string('shop_photo_url', 512)->nullable();
            $table->text('address')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('market_area')->nullable();
            $table->string('locality')->nullable();
            $table->string('pin_code', 10)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('office_code', 50)->nullable();
            $table->decimal('delivery_radius_km', 3, 1)->default(3.0);
            $table->boolean('handling_charge_enabled')->default(false);
            $table->decimal('handling_charge', 10, 2)->default(0.00);
            $table->boolean('delivery_charge_enabled')->default(false);
            $table->decimal('delivery_charge', 10, 2)->default(0.00);
            $table->dateTime('subscription_valid_to')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['latitude', 'longitude'], 'idx_vendor_location');
            $table->index('city', 'idx_vendor_city');
            $table->index('pin_code', 'idx_vendor_pin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};

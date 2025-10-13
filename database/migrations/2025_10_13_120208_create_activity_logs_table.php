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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('entity_type',100)->nullable();
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->string('action',100)->nullable();
            $table->json('details')->nullable();
            $table->string('ip_address',45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
            $table->index(['entity_type','entity_id'],'idx_entity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};

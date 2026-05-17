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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['ventas', 'rrhh'])->default('ventas');
            $table->string('business_name');
            $table->string('cuit');
            $table->string('business_type');
            $table->string('market_experience')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('phone');
            $table->string('mobile')->nullable();
            $table->string('business_hours');
            $table->string('email');
            $table->text('observations')->nullable();
            $table->boolean('read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};

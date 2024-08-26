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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100)->unique();
            $table->string('name', 100);
            $table->string('phone', 20);
            $table->string('nik', 20);
            $table->string('customer_code', 50)->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->json('additional_participant')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};

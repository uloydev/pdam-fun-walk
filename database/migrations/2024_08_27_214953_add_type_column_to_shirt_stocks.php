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
        Schema::table('shirt_stocks', function (Blueprint $table) {
            if (!Schema::hasColumn('shirt_stocks', 'type')) {
                $table->enum('type', ['public', 'customer'])->default('customer')->after('size');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shirt_stocks', function (Blueprint $table) {
            if (Schema::hasColumn('shirt_stocks', 'type')) {
                $table->dropColumn('type');
            }
        });
    }
};

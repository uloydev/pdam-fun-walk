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
        if (!Schema::hasColumn('participants', 'checkin_at')) {
            Schema::table('participants', function (Blueprint $table) {
                $table->timestamp('checkin_at')->nullable()->after('email_verified_at');
            });
        }

        if (!Schema::hasColumn('participants', 'kit_received_at')) {
            Schema::table('participants', function (Blueprint $table) {
                $table->timestamp('kit_received_at')->nullable()->after('checkin_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('participants', 'checkin_at')) {
            Schema::table('participants', function (Blueprint $table) {
                $table->dropColumn('checkin_at');
            });
        }

        if (Schema::hasColumn('participants', 'kit_received_at')) {
            Schema::table('participants', function (Blueprint $table) {
                $table->dropColumn('kit_received_at');
            });
        }
    }
};

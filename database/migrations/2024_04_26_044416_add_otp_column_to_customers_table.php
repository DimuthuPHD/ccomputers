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
        Schema::table('customers', function (Blueprint $table) {
            $table->string('otp')->nullable()->default(null)->after('email_verified_at');
            $table->integer('otp_sent_count')->nullable()->default(null)->after('otp');
            $table->dateTime('last_otp_at')  ->nullable()->default(null)->after('otp_sent_count');
            $table->dateTime('blocked_until')  ->nullable()->default(null)->after('last_otp_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('otp');
            $table->dropColumn('otp_sent_count');
            $table->dropColumn('last_otp_at');
            $table->dropColumn('blocked_until');
        });
    }
};

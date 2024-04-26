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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_type');
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->string('payment_method');
            $table->unsignedBigInteger('payment_status');
            $table->string('sub_total');
            $table->unsignedBigInteger('status');
            $table->timestamps();

            $table->foreign('status')->references('id')->on('order_statuses')->onDelete('cascade');
            $table->foreign('payment_status')->references('id')->on('payment_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

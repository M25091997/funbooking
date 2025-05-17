<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('invoice_no')->nullable();
            $table->unsignedBigInteger('park_id');
            $table->foreign('park_id')->references('id')->on('parks')->onDelete('cascade');
            $table->json('park_details')->nullable();
            $table->date('booking_date');
            $table->decimal('total_amount', 10, 2);
            $table->enum('discount_type', ['None', 'Percentage', 'Flat'])->default('None');
            $table->string('coupan_code')->nullable();
            $table->decimal('discount', 10, 2)->default(0.00);
            $table->decimal('tax', 10, 2)->default(0.00);
            $table->decimal('final_amount', 10, 2); // total - discount + tax
            // Payment
            $table->string('transaction_no')->nullable();
            $table->enum('method', ['Cash', 'Online', 'Check or Draft']);
            $table->string('transaction_mode')->nullable();
            $table->string('signature')->nullable();
            $table->boolean('payment_status')->default(0); // 0 = unpaid, 1 = paid
            $table->enum('booking_status', ['Pending', 'Confirmed', 'Cancelled', 'Refund'])->default('Pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

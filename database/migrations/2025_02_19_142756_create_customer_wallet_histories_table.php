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
        Schema::create('customer_wallet_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->constrained('customer_wallets')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // For quick lookup
            $table->enum('type', ['cashback', 'refund', 'booking', 'deposit', 'reward'])->index();           
            $table->decimal('amount', 10, 2);            
            $table->unsignedBigInteger('park_id')->nullable();  
            $table->string('transaction_id');          
            $table->string('remarks');          
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_wallet_histories');
    }
};

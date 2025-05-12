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
        Schema::create('subscription_benefits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('park_id')->nullable();            
            $table->string('name');
            $table->decimal('discount', 5, 2)->nullable();
            $table->enum('type', ['fixed', 'percentage'])->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        
            // Adding foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_benefits');
    }
};

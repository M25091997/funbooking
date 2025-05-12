<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discount_type_id');
            $table->string('name');
            $table->string('code')->unique()->nullable();
            $table->decimal('discount', 5, 2);
            $table->enum('type', ['fixed', 'percentage'])->default('percentage');
            $table->date('valid_from')->nullable();
            $table->date('valid_until')->nullable();
            $table->integer('usage_limit')->nullable();
            $table->integer('used_count')->default(0);
            $table->unsignedBigInteger('park_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('discount_type_id')->references('id')->on('discount_types')->onDelete('cascade');
            $table->foreign('park_id')->references('id')->on('parks')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};

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
        Schema::create('parks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id');
            $table->string('address');
            $table->unsignedBigInteger('area_id');
            $table->string('state');
            $table->string('district');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->string('location');
            $table->time('booking_threshold');
            $table->json('social_links')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parks');
    }
};

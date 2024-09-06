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
        Schema::create('food_dishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_food_dish_categories')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('instructions')->nullable();
            $table->string('image')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by');
            $table->string('deleted_by');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_food_dish_categories')
                  ->references('id')
                  ->on('food_dish_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_dishes');
    }
};

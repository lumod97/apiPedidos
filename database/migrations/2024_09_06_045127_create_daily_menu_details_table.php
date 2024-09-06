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
        Schema::create('daily_menu_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_daily_menus');
            $table->unsignedBigInteger('id_food_dishes');
            $table->decimal('price', 18, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_menu_details');
    }
};

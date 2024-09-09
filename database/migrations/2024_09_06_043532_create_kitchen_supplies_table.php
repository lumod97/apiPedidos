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
        Schema::create('kitchen_supplies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kitchen_supplies_categories');
            $table->string('name');
            $table->string('category');
            $table->string('unit');
            $table->text('notes')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_kitchen_supplies_categories')
                ->references('id')
                ->on('kitchen_supplies_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kitchen_supplies');
    }
};

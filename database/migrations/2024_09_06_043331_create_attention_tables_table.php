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
        Schema::create('attention_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_branches');
            $table->unsignedBigInteger('id_table_categories');
            $table->string('details');
            $table->string('created_by')->nullable();
            $table->string('updated_by');
            $table->string('deleted_by');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_branches')
                ->references('id')
                ->on('branches');
            $table->foreign('id_table_categories')
                ->references('id')
                ->on('table_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attention_tables');
    }
};

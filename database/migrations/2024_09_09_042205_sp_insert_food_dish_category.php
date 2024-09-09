<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $query = 'CREATE PROCEDURE insert_new_food_dish_category(
            _name varchar(255),
            _description varchar(255)
        )
        
            BEGIN
                INSERT INTO food_dish_categories(
                    name,
                    description,
                    created_by
                )
                VALUES
                (
                    _name,
                    _description,
                    NOW()
                );
            END;';

        DB::unprepared($query);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

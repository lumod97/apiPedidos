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
        $query = 'CREATE PROCEDURE edit_food_dish_category(
            _id bigint unsigned,
            _name varchar(255),
            _description varchar(255)
        )
        
            BEGIN
                UPDATE
                    food_dish_categories
                SET
                    name = _name,
                    description = _description,
                    updated_by = NOW()
                WHERE
                    id = _id;
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

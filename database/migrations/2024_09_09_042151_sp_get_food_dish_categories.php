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
        $procedure = 'CREATE PROCEDURE
            get_food_dish_categories()
                BEGIN
                    SELECT
                        fdc.id,
                        fdc.name,
                        fdc.description,
                        count(fd.id) number_of_food_dishes
                    from food_dish_categories fdc
                    left join food_dishes fd on fd.id_food_dish_categories = fdc.id
                    where
                        fdc.deleted_at is null
                    and
                        fd.deleted_at is null
                    group by
                        fdc.id,
                        fdc.description;
                END;
        ';
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

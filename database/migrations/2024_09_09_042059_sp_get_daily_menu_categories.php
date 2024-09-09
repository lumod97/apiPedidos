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
            get_daily_menu_categories()
                BEGIN
                    SELECT
                        dmc.id,
                        dmc.name,
                        dmc.description,
                        count(dm.id) number_of_daily_menus
                    from daily_menu_categories dmc
                    left join daily_menus dm on dm.id_daily_menu_categories = dmc.id
                    where
                        dmc.deleted_at is null
                    and
                        dm.deleted_at is null
                    group by
                        dmc.id,
                        dmc.description;
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

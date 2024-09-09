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
            get_kitchen_supplies_categories()
                BEGIN
                    SELECT
                        ksc.id,
                        ksc.name,
                        ksc.description,
                        count(ks.id) number_of_kitchen_supplies
                    from kitchen_supplies_categories ksc
                    left join kitchen_supplies ks on ks.id_kitchen_supplies_categories = ksc.id
                    where
                        ksc.deleted_at is null
                    and
                        ks.deleted_at is null
                    group by
                        ksc.id,
                        ksc.description;
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

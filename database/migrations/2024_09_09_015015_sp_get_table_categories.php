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
            get_table_categories()
                BEGIN
                    SELECT
                        tc.id,
                        tc.name,
                        tc.description,
                        count(att.id) number_of_tables
                    from table_categories tc
                    left join attention_tables att on att.id_table_categories = tc.id
                    where
                        tc.deleted_at is null
                    and
                        att.deleted_at is null
                    group by
                        tc.id,
                        tc.description;
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

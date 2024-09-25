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
        $procedure = "CREATE PROCEDURE edit_attention_table(
            _id bigint unsigned,
            _id_branches bigint unsigned,
            _id_table_categories bigint unsigned,
            _details varchar(255)
        )
        BEGIN
            UPDATE
                attention_tables
            SET
                id_branches = _id_branches,
                id_table_categories = _id_table_categories,
                details = _details,
                updated_at = NOW()
            WHERE
                id = _id;

        END;";

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

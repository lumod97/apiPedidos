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
        $query = 'CREATE PROCEDURE insert_new_attention_table(
            _id_branches bigint unsigned,
            _id_table_categories bigint unsigned,
            _details varchar(255)
        )
        
            BEGIN
                INSERT INTO attention_tables(
                    id_branches,
                    id_table_categories,
                    details,
                    created_at
                )
                VALUES
                (
                    _id_branches,
                    _id_table_categories,
                    _details,
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

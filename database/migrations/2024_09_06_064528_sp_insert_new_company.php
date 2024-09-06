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
        $query = 'CREATE PROCEDURE insert_new_company(
            name varchar(255),
            ruc varchar(255)
        )
        
            BEGIN
                INSERT INTO companies(
                    name,
                    ruc,
                    created_at
                )
                VALUES
                (
                    name,
                    ruc,
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

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
        $procedure = "CREATE PROCEDURE edit_company(
            _id bigint unsigned,
            _name varchar(255),
            _ruc varchar(255)
        )
        BEGIN
            UPDATE
                companies
            SET
                name = _name,
                ruc = _ruc,
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

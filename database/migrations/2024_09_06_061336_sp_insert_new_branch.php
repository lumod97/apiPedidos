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
        $query = 'CREATE PROCEDURE insert_new_branch(
            id_companies bigint,
            name varchar(255),
            address varchar(255),
            district varchar(255),
            province varchar(255),
            departament varchar(255),
            phone varchar(12),
            email varchar(90),
            website varchar(100)
        )
        
            BEGIN
                INSERT INTO branches(
                    id_companies,
                    name,
                    address,
                    district,
                    province,
                    departament,
                    phone,
                    email,
                    website,
                    created_at
                )
                VALUES
                (
                    id_companies,
                    name,
                    address,
                    district,
                    province,
                    departament,
                    phone,
                    email,
                    website,
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

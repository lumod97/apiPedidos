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
        $procedure = "CREATE PROCEDURE edit_branch(
            _id bigint unsigned,
            _id_companies bigint unsigned,
            _name varchar(255),
            _address varchar(255),
            _district varchar(255),
            _province varchar(255),
            _departament varchar(255),
            _phone varchar(255),
            _email varchar(255),
            _website varchar(255)
        )
        BEGIN
            UPDATE
                branches
            SET
                id_companies = _id_companies,
                name = _name,
                address = _address,
                district = _district,
                province = _province,
                departament = _departament,
                phone = _phone,
                email = _email,
                website = _website,
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

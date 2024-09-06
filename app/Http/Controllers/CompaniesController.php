<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    public function getCompanies(Request $request){
        $params = [

        ];

        $data = DB::select('SELECT id, name, ruc, created_by, created_at, updated_by, updated_at from companies WHERE deleted_at IS NULL', $params);

        return response()->json($data);
    }

    public function insertCompany(Request $request){

        $params = [
            $request->name,
            $request->ruc
        ];

        $response = DB::statement("CALL insert_new_company(?, ?)", $params);

        return response()->json($response);
    }

    public function deleteCompany(Request $request){
        $params = [
            $request->id_company
        ];

        $response = DB::statement("UPDATE companies SET deleted_at = NOW() WHERE id = ?", $params);
        return response()->json($response);
    }
}

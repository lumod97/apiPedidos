<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchesController extends Controller
{

    public function getBranches(Request $request)
    {
        $params = [];

        $data = DB::select('select
                                c.name company_name,
                                b.id_companies,
                                b.id,
                                b.name,
                                b.address,
                                b.district,
                                b.province,
                                b.departament,
                                b.phone,
                                b.email,
                                b.website,
                                b.created_by,
                                b.created_at,
                                b.updated_by,
                                b.updated_at
                            from branches as b
                            inner join companies as c on c.id = b.id_companies
                            where b.deleted_at is null;'
        , $params);

        return response()->json($data);
    }

    public function insertBranch(Request $request)
    {

        $params = [
            $request->id_companies,
            $request->name,
            $request->address,
            $request->district,
            $request->province,
            $request->departament,
            $request->phone,
            $request->email,
            $request->website,
        ];

        $response = DB::statement("CALL pedidos_db.insert_new_branch(?, ?, ?, ?, ?, ?, ?, ?, ?)", $params);

        return response()->json($response);
    }

    public function editBranch(Request $request){

        $params = [
            $request->id,
            $request->id_companies,
            $request->name,
            $request->address,
            $request->district,
            $request->province,
            $request->departament,
            $request->phone,
            $request->email,
            $request->website
        ];

        $response = DB::statement("CALL edit_branch(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", $params);

        return response()->json($response);
    }

    public function deleteBranch(Request $request){
        $params = [
            $request->id_branch
        ];

        $response = DB::statement("UPDATE branches SET deleted_at = NOW() WHERE id = ?", $params);
        return response()->json($response);
    }
}

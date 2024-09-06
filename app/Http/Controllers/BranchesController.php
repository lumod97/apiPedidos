<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchesController extends Controller
{

    public function getBranches(Request $request){
        $params = [

        ];

        $data = DB::select('select id, name, address, district, province, departament, phone, email, website , created_by, created_at, updated_by, updated_at from branches', $params);

        return response()->json($data);
    }

    public function insertBranch(Request $request){

        $params = [
            $request->id_empresa,
            $request->name,
            $request->address,
            $request->district,
            $request->province,
            $request->departament,
            $request->phone,
            $request->email,
            $request->website,
        ];

        $response = DB::statement("CALL pedidos_db.insert_new_branch(:id_empresa, :name, :address, :district, :province, :departament, :phone, :email, :website)", $params);

        return response()->json($response);
    }
}

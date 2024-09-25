<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttentionTableController extends Controller
{
    public function getAttentionTables(Request $request)
    {
        $params = [];

        $data = DB::select(
            'select
                at.id,
                at.id_branches,
                b.name branch,
                at.id_table_categories,
                tc.name table_category,
                at.details
            from attention_tables at
            inner join branches b on b.id = at.id_branches
            inner join table_categories tc ON tc.id = at.id_table_categories
            where at.deleted_at is null;',
            $params
        );

        return response()->json($data);
    }

    public function insertAttentionTable(Request $request)
    {

        $params = [
            $request->id_branch,
            $request->id_table_category,
            $request->description
        ];

        $response = DB::statement("CALL pedidos_db.insert_new_attention_table(?, ?, ?)", $params);

        return response()->json($response);
    }

    public function editAttentionTable(Request $request)
    {

        $params = [
            $request->id,
            $request->id_branches,
            $request->id_table_categories,
            $request->details
        ];

        $response = DB::statement("CALL pedidos_db.edit_attention_table(?, ?, ?, ?)", $params);

        return response()->json($response);
    }
}

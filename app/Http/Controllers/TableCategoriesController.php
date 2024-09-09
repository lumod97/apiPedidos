<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableCategoriesController extends Controller
{
    function getTableCategories(Request $request){
        $data = DB::select('call get_table_categories');
        return $data;
    }

    function insertTableCategory(Request $request){
        $params = [
            $request->name,
            $request->description
        ];
        $query = "call insert_new_table_category(?, ?)";
        $response = DB::statement($query, $params);
        return response()->json($response);
    }
    
    function editTableCategory(Request $request){
        $params = [
            $request->id,
            $request->name,
            $request->description
        ];
        $query = "call edit_table_category (?, ?, ?)";
        DB::statement($query, $params);
    }

    function deleteTableCategory(Request $request){
        $params = [
            $request->id_table_category
        ];

        $response = DB::statement("UPDATE table_categories SET deleted_at = NOW() WHERE id = ?", $params);
        return response()->json($response);
    }

}

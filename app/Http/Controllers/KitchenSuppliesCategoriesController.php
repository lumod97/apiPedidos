<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KitchenSuppliesCategoriesController extends Controller
{
    function getKitchenSuppliesCategories(Request $request){
        $data = DB::select('call get_kitchen_supplies_categories');
        return $data;
    }
    
    function insertKitchenSuppliesCategory(Request $request){
        $params = [
            $request->name,
            $request->description
        ];
        $query = "call insert_new_kitchen_supplies_category(?, ?)";
        $response = DB::statement($query, $params);
        return response()->json($response);
    }
    
    function editKitchenSuppliesCategory(Request $request){
        $params = [
            $request->id,
            $request->name,
            $request->description
        ];
        $query = "call edit_kitchen_supplies_category (?, ?, ?)";
        $response = DB::statement($query, $params);
        return response()->json($response);
    }

    function deleteKitchenSuppliesCategory(Request $request){
        $params = [
            $request->id_kitchen_supplies_category
        ];

        $response = DB::statement("UPDATE kitchen_supplies_categories SET deleted_at = NOW() WHERE id = ?", $params);
        return response()->json($response);
    }
}

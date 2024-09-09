<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DailyMenuCategoriesController extends Controller
{
    function getDailyMenuCategories(Request $request){
        $data = DB::select('call get_daily_menu_categories');
        return $data;
    }

    function insertDailyMenuCategory(Request $request){
        $params = [
            $request->name,
            $request->description
        ];
        $query = "call insert_new_daily_menu_category(?, ?)";
        $response = DB::statement($query, $params);
        return response()->json($response);
    }
    
    function editDailyMenuCategory(Request $request){
        $params = [
            $request->id,
            $request->name,
            $request->description
        ];
        $query = "call edit_daily_menu_category (?, ?, ?)";
        DB::statement($query, $params);
    }

    function deleteDailyMenuCategory(Request $request){
        $params = [
            $request->id_daily_menu_category
        ];

        $response = DB::statement("UPDATE daily_menu_categories SET deleted_at = NOW() WHERE id = ?", $params);
        return response()->json($response);
    }
}

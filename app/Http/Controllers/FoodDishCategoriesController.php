<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodDishCategoriesController extends Controller
{
    function getFoodDishCategories(Request $request){
        $data = DB::select('call get_food_dish_categories');
        return $data;
    }

    function insertFoodDishCategory(Request $request){
        $params = [
            $request->name,
            $request->description
        ];
        $query = "call insert_new_food_dish_category(?, ?)";
        $response = DB::statement($query, $params);
        return response()->json($response);
    }
    
    function editFoodDishCategory(Request $request){
        $params = [
            $request->id,
            $request->name,
            $request->description
        ];
        $query = "call edit_food_dish_category (?, ?, ?)";
        DB::statement($query, $params);
    }

    function deleteFoodDishCategory(Request $request){
        $params = [
            $request->id_food_dish_category
        ];

        $response = DB::statement("UPDATE food_dish_categories SET deleted_at = NOW() WHERE id = ?", $params);
        return response()->json($response);
    }
}

<?php

use App\Http\Controllers\BranchesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DailyMenuCategoriesController;
use App\Http\Controllers\FoodDishCategoriesController;
use App\Http\Controllers\KitchenSuppliesCategoriesController;
use App\Http\Controllers\MenuCategoriesController;
use App\Http\Controllers\TableCategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'companies'], function () {
    Route::post('get-companies', [CompaniesController::class,'getCompanies']);
    Route::post('get-companies-for-select', [CompaniesController::class,'getCompaniesForSelect']);
    Route::post('insert-company', [CompaniesController::class,'insertCompany']);
    Route::post('edit-company', [CompaniesController::class,'editCompany']);
    Route::post('delete-company', [CompaniesController::class,'deleteCompany']);
});

Route::group(['prefix' => 'branches'], function () {
    Route::post('get-branches', [BranchesController::class,'getBranches']);
    // Route::post('get-branches-for-select', [BranchesController::class,'getBranchesForSelect']);
    Route::post('insert-branch', [BranchesController::class,'insertBranch']);
    Route::post('edit-branch', [BranchesController::class,'editBranch']);
    Route::post('delete-branch', [BranchesController::class,'deleteBranch']);
});

Route::group(['prefix' => 'table-categories'], function () {
    Route::post('get-table-categories', [TableCategoriesController::class,'getTableCategories']);
    Route::post('insert-table-category', [TableCategoriesController::class,'insertTableCategory']);
    Route::post('edit-table-category', [TableCategoriesController::class,'editTableCategory']);
    Route::post('delete-table-category', [TableCategoriesController::class,'deleteTableCategory']);
});

Route::group(['prefix' => 'daily-menu-categories'], function () {
    Route::post('get-daily-menu-categories', [DailyMenuCategoriesController::class,'getDailyMenuCategories']);
    Route::post('insert-daily-menu-category', [DailyMenuCategoriesController::class,'insertDailyMenuCategory']);
    Route::post('edit-daily-menu-category', [DailyMenuCategoriesController::class,'editDailyMenuCategory']);
    Route::post('delete-daily-menu-category', [DailyMenuCategoriesController::class,'deleteDailyMenuCategory']);
});

Route::group(['prefix' => 'kitchen-supplies-categories'], function () {
    Route::post('get-kitchen-supplies-categories', [KitchenSuppliesCategoriesController::class,'getKitchenSuppliesCategories']);
    Route::post('insert-kitchen-supplies-category', [KitchenSuppliesCategoriesController::class,'insertKitchenSuppliesCategory']);
    Route::post('edit-kitchen-supplies-category', [KitchenSuppliesCategoriesController::class,'editKitchenSuppliesCategory']);
    Route::post('delete-kitchen-supplies-category', [KitchenSuppliesCategoriesController::class,'deleteKitchenSuppliesCategory']);
});

Route::group(['prefix' => 'food-dish-categories'], function () {
    Route::post('get-food-dish-categories', [FoodDishCategoriesController::class,'getFoodDishCategories']);
    Route::post('insert-food-dish-category', [FoodDishCategoriesController::class,'insertFoodDishCategory']);
    Route::post('edit-food-dish-category', [FoodDishCategoriesController::class,'editFoodDishCategory']);
    Route::post('delete-food-dish-category', [FoodDishCategoriesController::class,'deleteFoodDishCategory']);
});

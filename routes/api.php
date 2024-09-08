<?php

use App\Http\Controllers\BranchesController;
use App\Http\Controllers\CompaniesController;
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

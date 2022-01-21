<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportLoanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\NewAssetController;
use App\Http\Controllers\ServiceAssetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('layouts.dashboard');
// });

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/department/delete/{id}', [DepartmentController::class, 'destroy']);
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy']);
    Route::get('/service/delete/{id}', [ServiceAssetController::class, 'destroy']);
    Route::get('/new/delete/{id}', [NewAssetController::class, 'destroy']);
    Route::get('/user/delete/{id}', [UserController::class, 'destroy']);
    Route::get('/loan/delete/{id}', [LoanController::class, 'destroy']);

    Route::post('/service/{id}/repair', [ServiceAssetController::class, 'repair']);
    Route::get('/report-loan/export_excel', [ReportLoanController::class, 'export_excel'])->name('export');
    Route::get('/report-parameter/export_excel_parameter', [ReportLoanController::class, 'export_excel_parameter'])->name('export-parameter');

    Route::resources([
        'service' => ServiceAssetController::class,
        'new' => NewAssetController::class,
        'loan' => LoanController::class,
        'report-repairing' => ReportController::class,
        'report-loan' => ReportLoanController::class,
        'category' => CategoryController::class,
        'department' => DepartmentController::class,
        'user' => UserController::class,
    ]);
});

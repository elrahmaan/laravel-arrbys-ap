<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportLoanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ListPriceController;
use App\Http\Controllers\SerialController;
use App\Http\Controllers\ServiceAssetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::middleware(['auth', 'cekrole:superadmin'])->group(function () {
    Route::resources([
        'user' => UserController::class,
    ]);
    Route::get('/user/delete/{id}', [UserController::class, 'destroy']);
});
Route::middleware(['auth', 'cekrole:superadmin,teknisi,viewer'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::resources([
        'lpp' => ListPriceController::class,
        'report-repairing' => ReportController::class,
        'report-loan' => ReportLoanController::class,
    ]);
    //export excel
    Route::get('/report-loans/export_excel', [ReportLoanController::class, 'export_excel'])->name('export-loan.index');
    Route::get('/report-parameter/export_excel_parameter', [ReportLoanController::class, 'export_excel_parameter'])->name('export-loan-parameter');
    Route::get('/report-service/export_excel', [ReportController::class, 'export_excel'])->name('export-service');
    Route::get('/report-service-parameter/export_excel_parameter', [ReportController::class, 'export_excel_parameter'])->name('export-service-parameter');
    
});
Route::middleware(['auth', 'cekrole:superadmin,teknisi'])->group(function () {
    Route::get('/report-asset/export_excel', [AssetController::class, 'export_excel'])->name('export-asset.index');
    Route::post('asset/import', [AssetController::class,'import'])->name('asset.import');
    Route::post('/service/{id}/repair', [ServiceAssetController::class, 'repair']);
    Route::post('/loan/{id}/returned', [LoanController::class, 'returned']);
    Route::get('/department/delete/{id}', [DepartmentController::class, 'destroy']);
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy']);
    Route::get('/service/delete/{id}', [ServiceAssetController::class, 'destroy']);
    Route::get('/asset/delete/{id}', [AssetController::class, 'destroy']);
    Route::get('/loan/delete/{id}', [LoanController::class, 'destroy']);
    Route::resources([
        'service' => ServiceAssetController::class,
        'asset' => AssetController::class,
        'serial' => SerialController::class,
        'loan' => LoanController::class,
        'category' => CategoryController::class,
        'department' => DepartmentController::class,
    ]);
});
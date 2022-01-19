<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportLoanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\NewAssetController;
use App\Http\Controllers\ServiceAssetController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('layouts.dashboard');
})->name('home');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Delete
Route::get('/delete/department/{id}', [DepartmentController::class, 'destroy']);
Route::get('/department/delete/{id}', [DepartmentController::class, 'confirm']);
Route::get('/delete/{id}', [UserController::class, 'destroy']);
Route::get('/user/delete/{id}', [UserController::class, 'confirm']);

Route::post('/service/{id}/repair', [ServiceAssetController::class, 'repair']);
Route::get('/report-loan/export_excel', [ReportLoanController::class,'export_excel'])->name('export');

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
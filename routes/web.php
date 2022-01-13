<?php

use App\Http\Controllers\CpuController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\MouseController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\OthersController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportLoanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
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


Route::resources([
    'monitor' => MonitorController::class,
    'printer' => PrinterController::class,
    'keyboard' => KeyboardController::class,
    'mouse' => MouseController::class,
    'cpu' => CpuController::class,
    'others' => OthersController::class,
    'loan' => LoanController::class,
    'report-repairing' => ReportController::class,
    'report-loan' => ReportLoanController::class,
    'category' => CategoryController::class,
    'department' => DepartmentController::class,
    'user' => UserController::class,
]);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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
    return view('login');
})->middleware('auth');
Route::get('/test', function () {
    return view('test');
});

Route::middleware('only_guest')->group(function () {
    // login (midleware manual)
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);

    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'create']);
});

// login (midleware manual)
// Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('only_guest');
// Route::post('login', [AuthController::class, 'authenticating'])->middleware('only_guest');
// Route::get('register', [AuthController::class, 'register'])->middleware('only_guest');
Route::get('/logout', [AuthController::class, 'logout']);

// dashbord
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'only_admin']);
Route::get('/profile', [UserController::class, 'profile'])->middleware(['auth', 'only_client']);
Route::get('/books', [BookController::class, 'index']);

Route::resource('/categories', CategoryController::class);
// Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/rent-logs', [RentLogController::class, 'index']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// These are the routes created to direct the user to the index and the transaction history.
Route::controller(UsersController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('transactions/{id}', 'showDetails');
});


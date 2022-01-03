<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
    return view('welcome');
});


Route::get('/home', function () {
    echo"Welcome Home !";
});


// Route::get('/contact', function () {
//     return view('contact');
// });

Route::get('/contact', [ContactController::class, 'index'])->middleware('CheckAge');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    
    $users_ORM = User::all(); //using eloquenr ORM

    $users = DB::table('users')->get(); //using query builder

    return view('dashboard', compact('users'));
})->name('dashboard');

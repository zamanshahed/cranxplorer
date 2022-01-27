<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
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

//Welcome screen
Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('welcome');
});


//For Category Routes
//category with controller
Route::middleware(['auth:sanctum', 'verified'])->get('/catrgory/all', [CategoryController::class, 'AllCat'])->name('all.category');
//add new category
Route::middleware(['auth:sanctum', 'verified'])->post('/catrgory/add', [CategoryController::class, 'AddCat'])->name('store.category');
//edit category 
Route::middleware(['auth:sanctum', 'verified'])->get('/category/edit/{id}', [CategoryController::class, 'EditCat']);
//update category 
Route::middleware(['auth:sanctum', 'verified'])->post('/category/update/{id}', [CategoryController::class, 'UpdateCat']);
//delete category 
Route::middleware(['auth:sanctum', 'verified'])->get('/soft_delete/category/{id}', [CategoryController::class, 'SoftDelete']);
//restore category 
Route::middleware(['auth:sanctum', 'verified'])->get('/category/restore/{id}', [CategoryController::class, 'Restore']);
//restore category 
Route::middleware(['auth:sanctum', 'verified'])->get('/category/permanent_delete/{id}', [CategoryController::class, 'P_Delete']);


//For Brand Routes
//All Brand home
Route::middleware(['auth:sanctum', 'verified'])->get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
//add new brand
Route::middleware(['auth:sanctum', 'verified'])->post('/brand/add', [BrandController::class, 'AddBrand'])->name('store.brand');
//edit brand
Route::middleware(['auth:sanctum', 'verified'])->get('/brand/edit/{id}', [BrandController::class, 'EditBrand']);
//update category 
Route::middleware(['auth:sanctum', 'verified'])->post('/brand/update/{id}', [BrandController::class, 'UpdateBrand']);


//Home / Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $users_ORM = User::all(); //using eloquenr ORM

    $users = DB::table('users')->get(); //using query builder

    return view('dashboard', compact('users'));
})->name('dashboard');

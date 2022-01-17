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

                    //For Category Routes

//category with controller
Route::get('/catrgory/all', [CategoryController::class, 'AllCat'])->name('all.category');

//add new category
Route::post('/catrgory/add', [CategoryController::class, 'AddCat'])->name('store.category');

//edit category 
Route::get('/category/edit/{id}', [CategoryController::class, 'EditCat']);

//update category 
Route::post('/category/update/{id}', [CategoryController::class, 'UpdateCat']);

//edit category 
Route::get('/soft_delete/category/{id}', [CategoryController::class, 'SoftDelete']);

//restore category 
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

//restore category 
Route::get('/category/permanent_delete/{id}', [CategoryController::class, 'P_Delete']);


                    //For Brand Routes
//All Brand home
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');

//add new brand
Route::post('/brand/add', [BrandController::class, 'AddBrand'])->name('store.brand');



                    //For Brand Routes
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    
    $users_ORM = User::all(); //using eloquenr ORM

    $users = DB::table('users')->get(); //using query builder

    return view('dashboard', compact('users'));
})->name('dashboard');

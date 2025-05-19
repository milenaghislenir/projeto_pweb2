<?php

use App\Http\Controllers\MovieCategoryController;
use App\Http\Controllers\MovieDirectorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//movies
use App\Http\Controllers\MoviesController;

Route::get('/movie',[MoviesController::class,'index'])->name('movies.index');
Route::get('/movie/create',[MoviesController::class,'create'])->name('movies.create');
Route::post('/movie/store',[MoviesController::class,'store'])->name('movies.store');
Route::get('/movie/{id}',[MoviesController::class,'edit'])->name('movies.edit');
Route::put('/movie/update/{id}',[MoviesController::class,'update'])->name('movies.update');
Route::delete('/movie/{id}',[MoviesController::class,'destroy'])->name('movies.destroy');
Route::post('/movie',[MoviesController::class,'search'])->name('movies.search');

//employees
use App\Http\Controllers\EmployeesController;

Route::get('/employee',[EmployeesController::class,'index'])->name('employees.index');
Route::get('/employee/create',[EmployeesController::class,'create'])->name('employees.create');
Route::post('/employee/store',[EmployeesController::class,'store'])->name('employees.store');
Route::get('/employee/{id}',[EmployeesController::class,'edit'])->name('employees.edit');
Route::put('/employee/update/{id}',[EmployeesController::class,'update'])->name('employees.update');
Route::delete('/employee/{id}',[EmployeesController::class,'destroy'])->name('employees.destroy');
Route::post('/employee',[EmployeesController::class,'search'])->name('employees.search');

//categories
use App\Http\Controllers\CategoriesController;

Route::get('/category',[CategoriesController::class,'index'])->name('categories.index');
Route::get('/category/create',[CategoriesController::class,'create'])->name('categories.create');
Route::post('/category/store',[CategoriesController::class,'store'])->name('categories.store');
Route::get('/category/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
Route::put('/category/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
Route::delete('/category/{id}',[CategoriesController::class,'destroy'])->name('categories.destroy');
Route::post('/category',[CategoriesController::class,'search'])->name('categories.search');

//bombonieres
use App\Http\Controllers\BombonieresController;

Route::get('/bomboniere',[BombonieresController::class,'index'])->name('bombonieres.index');
Route::get('/bomboniere/create',[BombonieresController::class,'create'])->name('bombonieres.create');
Route::post('/bomboniere/store',[BombonieresController::class,'store'])->name('bombonieres.store');
Route::get('/bomboniere/{id}',[BombonieresController::class,'edit'])->name('bombonieres.edit');
Route::put('/bomboniere/update/{id}',[BombonieresController::class,'update'])->name('bombonieres.update');
Route::delete('/bomboniere/{id}',[BombonieresController::class,'destroy'])->name('bombonieres.destroy');
Route::post('/bomboniere',[BombonieresController::class,'search'])->name('bombonieres.search');

//directors
Route::get('/categories/movie/{category}',[MovieCategoryController::class,'index'])->name('moviecategory.index');
Route::get('/categories/movie/{category}/create',[MovieCategoryController::class,'create'])->name('moviecategory.create');
Route::post('/categories/movie/store',[MovieCategoryController::class,'store'])->name('moviecategory.store');
Route::delete('/categories/movie/{category}/{id}',[MovieCategoryController::class,'edit'])->name('moviecategory.destroy');
Route::get('/categories/movie/{category}/update/{id}',[MovieCategoryController::class,'update'])->name('moviecategory.edit');
Route::put('/categories/movie/{category}/{id}',[MovieCategoryController::class,'destroy'])->name('moviecategory.update');
Route::post('/categories/movie/{category}',[MovieCategoryController::class,'search'])->name('moviecategory.search');

//relatorios
Route::get('/relatorio-filmes', [MoviesController::class, 'report'])->name('movies.report');
Route::get('/relatorio-funcionarios', [EmployeesController::class, 'report'])->name('employees.report');


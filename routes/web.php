<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ImployeeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/imployee', [ImployeeController::class, 'index']);
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.index');

Route::get('/users/{username}/{email}',[UserController::class,'getUsernameEmail'])
    ->name('users.getUsernameEmail');

// categories route
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index'); 
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/show', [CategoryController::class, 'show'])->name('categories.show');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Movies Route
Route::get('/movies', [MovieController::class, 'index'])->name('categories.index');

// Student Routes
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('/students/show', [StudentController::class, 'show'])->name('students.show');
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/show', [ProductController::class, 'show'])->name('products.show');
Route::post('/products/store', [ProductController::class, 'store'])->name('propducts.store');
Route::get('/products/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ImployeeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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

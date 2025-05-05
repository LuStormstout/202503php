<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// This is the home page of the application
Route::get('/', [IndexController::class, 'home'])->name('home');

// Show the login form
Route::get('/login', [SessionsController::class, 'create'])->name('login');
// Login the user
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
// Logout the user
Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');

// Show the registration form
Route::get('/register', [UsersController::class, 'create'])->name('register');
// Register the user
Route::post('/register', [UsersController::class, 'store'])->name('register.store');
// Show the user profile
Route::get('/users/{id?}', [UsersController::class, 'show'])->name('users.show');

// 使用 resource 路由来定义 RESTful 路由
Route::resource('categories', CategoriesController::class);
//  GET|HEAD   categories .................... categories.index › CategoriesController@index
//  POST       categories .................... categories.store › CategoriesController@store
//  GET|HEAD   categories/create ........... categories.create › CategoriesController@create
//  GET|HEAD   categories/{category} ........... categories.show › CategoriesController@show
//  PUT|PATCH  categories/{category} ....... categories.update › CategoriesController@update
//  DELETE     categories/{category} ..... categories.destroy › CategoriesController@destroy
//  GET|HEAD   categories/{category}/edit ...... categories.edit › CategoriesController@edit

// 这里的 only 是表示只允许访问 index 和 show 方法
//Route::resource('categories', CategoriesController::class)->only('index', 'show');
// 这里的 except 是表示不允许访问 create 和 edit 方法
//Route::resource('categories', CategoriesController::class)->except('create', 'edit');

// 定义 products 资源的路由
Route::resource('products', ProductsController::class);
// Route::get('products', [ProductsController::class, 'index'])->name('products.index');
// Route::post('products', [ProductsController::class, 'store'])->name('products.store');
// ...

Route::get('/test', [\App\Http\Controllers\TestController::class, 'index'])->name('test');

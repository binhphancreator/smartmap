<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\WayController;
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

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('index');
Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('post.login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/point', [HomeController::class, 'point'])->name('point');
Route::get('/get-way/{start_point_id}/{end_point_id}', [HomeController::class, 'getWay'])->name('getWay');

Route::resource('groups', GroupController::class)->middleware('auth');
Route::resource('points', PointController::class)->middleware('auth');
Route::resource('ways', WayController::class)->middleware('auth');

Route::get('/import/group', [ImportController::class, "importGroupIndex"])->middleware('auth')->name('import.group.index');
Route::get('/import/point', [ImportController::class, "importPointIndex"])->middleware('auth')->name('import.point.index');
Route::get('/import/way', [ImportController::class, "importWayIndex"])->middleware('auth')->name('import.way.index');
Route::post('/import/group', [ImportController::class, "importGroup"])->middleware('auth')->name('import.group');
Route::post('/import/point', [ImportController::class, "importPoint"])->middleware('auth')->name('import.point');
Route::post('/import/way', [ImportController::class, "importWay"])->middleware('auth')->name('import.way');
<?php

use App\Http\Controllers\vacancyControler;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/post-job', [vacancyControler::class, 'postingPage']);
Route::POST('/insertJob', [vacancyControler::class, 'insertJob']);
Route::get('/view-jobs', [vacancyControler::class, 'veiwJobLists']);
Route::get('/edit-job/{id}', [vacancyControler::class, 'editJob']);
Route::POST('/goForEdition', [vacancyControler::class, 'goForEdition']);
Route::get('/deleteJob/{id}', [vacancyControler::class, 'deleteJob']);
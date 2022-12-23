<?php

use App\Http\Controllers\vacancyControler;
use App\Http\Controllers\loginSignupController;
use App\Http\Controllers\myAccountController;
use App\Http\Controllers\admin;
use App\Http\Controllers\XssSanitizer;

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

Route::group(
    ['middleware' => ['XssSanitization']],
    function () {

        Route::get('/adminoC', [admin::class, 'admin'])->middleware('admin');
        Route::get('/adminoLogout', [admin::class, 'adminoLogout']);

        Route::get('/', [vacancyControler::class, 'welcome']);
        Route::get('/post-job', [vacancyControler::class, 'postingPage'])->middleware('isLoggedIn');
        Route::POST('/insertJob', [vacancyControler::class, 'insertJob']);
        Route::get('/view-jobs', [vacancyControler::class, 'veiwJobLists']);
        Route::get('/edit-job/{id}', [vacancyControler::class, 'editJob']);
        Route::POST('/goForEdition', [vacancyControler::class, 'goForEdition']);
        Route::get('/deleteJob/{id}', [vacancyControler::class, 'deleteJob']);
        Route::get('/donation', [vacancyControler::class, 'donation']);
        Route::get('/search', [vacancyControler::class, 'search']);
        Route::get('/about', [vacancyControler::class, 'about']);
        Route::get('/contact', [vacancyControler::class, 'contact']);
        Route::get('privacy-policy', [vacancyControler::class, 'privacyPolicy']);
        Route::post('contactFormsData', [vacancyControler::class, 'contactFormsData']);

        Route::get('/login', [loginSignupController::class, 'login'])->middleware('alreadyLogged');
        Route::get('/signup', [loginSignupController::class, 'signup'])->middleware('alreadyLogged');
        Route::POST('/register', [loginSignupController::class, 'register']);
        Route::POST('/loginChecker', [loginSignupController::class, 'loginChecker']);
        Route::get('/logout', [loginSignupController::class, 'logout']);
        Route::get('/password-recovery', [loginSignupController::class, 'passwordRecovery'])->middleware('alreadyLogged');
        Route::post('/sendReset', [loginSignupController::class, 'sendReset']);
        Route::get('/codeSent', [loginSignupController::class, 'codeSent']);
        Route::get('passwordRecoveryLink/{email}/{code}', [loginSignupController::class, 'verify']);
        Route::get('/setNewPassword', [loginSignupController::class, 'setNewPassword'])->middleware('alreadyLogged');
        Route::POST('/putNewPassword', [loginSignupController::class, 'putNewPassword']);
        Route::get('/activation', [loginSignupController::class, 'activation']);
        Route::get('ActivationLink/{email}/{code}', [loginSignupController::class, 'ActivationLink']);

        Route::get('/my-account', [myAccountController::class, 'myAccount'])->middleware('isLoggedIn');
        Route::get('/my-account/under-review', [myAccountController::class, 'underReview'])->middleware('isLoggedIn');
        Route::get('/my-account/decline', [myAccountController::class, 'decline'])->middleware('isLoggedIn');
        Route::get('/my-account/approved', [myAccountController::class, 'approved'])->middleware('isLoggedIn');
        Route::get('/closeJob/{jobId}', [myAccountController::class, 'closeJob']);
        Route::get('/job-preview/{id}/{vacantName}', [myAccountController::class, 'preview']);
    }
);
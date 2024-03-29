<?php

use App\Http\Controllers;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Cashier\AdditionalFeesController;
use App\Http\Controllers\Cashier\FeesController as CashierFeesController;
use App\Http\Controllers\Cashier\TemplateController;
use App\Http\Controllers\Registrar\FeesController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


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


//ADMIN ROUTES
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::put('dashboard/{id}', [Admin\DashboardController::class, 'update'])->name('dashboard.update');
    Route::resource('application', Admin\ApplicationController::class);
    Route::resource('application/logs', Admin\LogsController::class);
    Route::resource('programs', Admin\ProgramsController::class);
    Route::resource('users', Admin\UsersController::class);
    Route::resource('subjects', Admin\SubjectsController::class);
    /*Route::get('subjects', [Admin\SubjectsController::class, 'list'])->name('subjects.list');*/
    Route::resource('terms', Admin\TermsController::class);
});

//REGISTRAR ROUTES
Route::group(['as' => 'registrar.', 'prefix' => 'registrar', 'middleware' => ['auth', 'registrar',]], function () {
    Route::get('/dashboard', [App\Http\Controllers\Registrar\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('programs', App\Http\Controllers\Registrar\ProgramsController::class);
    Route::resource('subjects', App\Http\Controllers\Registrar\SubjectsController::class);
    Route::resource('application', App\Http\Controllers\Registrar\ApplicationController::class);
    Route::resource('terms', App\Http\Controllers\Registrar\TermsController::class);
    Route::resource('fees', App\Http\Controllers\Registrar\FeesController::class);
});
//Route::get('fees',  [App\Http\Controllers\Registrar\FeesController::class, 'index'])->name('fees.index');
//Route::get('fees/{id}/generate',  [App\Http\Controllers\Registrar\FeesController::class, 'show'])->name('fees.show');
//DEAN ROUTES
Route::group(['as' => 'dean.', 'prefix' => 'dean', 'middleware' => ['auth', 'dean']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Dean\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('programs', App\Http\Controllers\Dean\ProgramsController::class);
    Route::get('/subjects', [App\Http\Controllers\Dean\SubjectsController::class, 'index'])->name('subjects.index');
    Route::resource('application', App\Http\Controllers\Dean\ApplicationController::class);
});

//ADVISER ROUTES
Route::group(['as' => 'adviser.', 'prefix' => 'adviser', 'middleware' => ['auth', 'adviser']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Adviser\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('programs', App\Http\Controllers\Adviser\ProgramsController::class);
    Route::resource('application', App\Http\Controllers\Adviser\ApplicationController::class);
});

//APPLICANT ROUTES
//note: do NOT forget to reinsert the 'verified' in the middleware section to implement the verification email first for applicants
Route::group(['as' => '', 'prefix' => '', 'middleware' => ['auth', 'applicant', 'verified']], function () {
    Route::get('dashboard', [App\Http\Controllers\Applicant\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('application', App\Http\Controllers\Applicant\ApplicationController::class);
});

//CASHIER ROUTES
Route::group(['as' => 'cashier.', 'prefix' => 'cashier', 'middleware' => ['auth', 'cashier']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Cashier\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('template', TemplateController::class);
    Route::resource('additional', AdditionalFeesController::class);
    Route::resource('fees', CashierFeesController::class);
});

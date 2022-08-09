<?php
use App\Http\Controllers;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Applicant;
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


//NEW
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('application', Admin\ApplicationController::class);
    Route::resource('programs', Admin\ProgramsController::class);
    Route::resource('users', Admin\UsersController::class);
});


Route::group(['as' => 'registrar.', 'prefix' => 'registrar', 'middleware' => ['auth', 'registrar']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Registrar\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('programs', App\Http\Controllers\Registrar\ProgramsController::class);
    Route::resource('application', App\Http\Controllers\Registrar\ApplicationController::class);
});

Route::group(['as' => 'dean.', 'prefix' => 'dean', 'middleware' => ['auth', 'dean']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Dean\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/programs', [App\Http\Controllers\Dean\ProgramsController::class, 'index']);
    Route::resource('application', App\Http\Controllers\Dean\ApplicationController::class);
});

Route::group(['as' => 'adviser.', 'prefix' => 'adviser', 'middleware' => ['auth', 'adviser']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Adviser\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('programs', App\Http\Controllers\Adviser\ProgramsController::class);
    Route::resource('application', App\Http\Controllers\Adviser\ApplicationController::class);
});

Route::group(['as' => '', 'prefix' => '', 'middleware' => ['auth', 'applicant']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Applicant\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('application', App\Http\Controllers\Applicant\ApplicationController::class);
});


/*
Route::resource('/application', ApplicationController::class);
Route::resource('/programs', ProgramsController::class);
*/
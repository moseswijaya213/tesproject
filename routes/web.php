<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KantongController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DetailProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Authentication Routes
Route::get('/', function () {
    return view('login');
});

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'regist'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/projects', [ProjectController::class, 'displayProjects'])->name('projects');

    Route::get('/addproject', function () {
        return view('addproject');
    });
    Route::post('/addproject', [ProjectController::class, 'newProject'])->name('addproject');

    Route::get('/addkantong', [KantongController::class, 'showAllProject'])->name('addkantong');
    Route::post('/addkantong', [KantongController::class, 'newKantong'])->name('addkantong.store');

    Route::get('/addacc', [AccessController::class, 'showAccessForm'])->name('addacc');
    Route::post('/addacc', [AccessController::class, 'newAccess'])->name('addacc.store');

    Route::get('/additem/{projectCode?}', [ItemController::class, 'create'])->name('additem');
    Route::post('/additem', [ItemController::class, 'store']);

    Route::get('/invoice', function () {
        return view('invoice');
    });
    Route::post('/invoice', [ItemController::class, 'generateInvoice'])->name('invoice');

    Route::get('/location/{project_name}', [DetailProjectController::class, 'showCurrentProject'])
        ->name('locationpage');
});
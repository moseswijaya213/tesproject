<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KantongController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/tes', function () {
    return view('rahasia');
});

Route::get('/register', [UserController::class, 'regist'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/home', [ProjectController::class, 'Index']);
    Route::get('/check-status', [ProjectController::class, 'checkAndUpdateStatus'])->name('check.status');

    Route::get('/projects', [ProjectController::class, 'displayProjects'])->name('projects');
    Route::get('/projects', [ProjectController::class, 'search'])->name('projects.search');


    Route::get('/addproject', function () {
        return view('addproject');
    });
    Route::post('/addproject', [ProjectController::class, 'newProject'])->name('addproject');

    Route::get('/addkantong', [KantongController::class, 'showCurrentProject'])->name('addkantong');
    Route::post('/addkantong', [KantongController::class, 'newKantong'])->name('addkantong.store');

    Route::get('/addaccess', function () {
        return view('addacc');
    });
    Route::get('/addaccess', [AccessController::class, 'showAccessForm'])->name('addaccess');
    Route::post('/addaccess', [AccessController::class, 'newAcc'])->name('addaccess.store');

    Route::get('/additem/{projectCode?}', [ItemController::class, 'create'])->name('additem');
    Route::post('/additem', [ItemController::class, 'store']);

    Route::get('/invoice/{project_code?}', [InvoiceController::class, 'show'])->name('invoice');
    Route::get('/invoice/{project_code?}/pdf', [InvoiceController::class, 'generatePDF'])->name('invoice.pdf');

    Route::get('/location/{project_name}', [ItemController::class, 'showCurrentProject'])
        ->name('location.page');
    Route::put('/location/update-entry', [ItemController::class, 'updateItemEntry'])
        ->name('update.item.entry');
    Route::put('/location/update-exit', [ItemController::class, 'updateItemExit'])
        ->name('update.item.exit');
    Route::put('/location/update-admin', [ItemController::class, 'updateItemAdmin'])
        ->name('update.item.admin');
    Route::put('/location/update-rambu', [ItemController::class, 'updateItemRambu'])
        ->name('update.item.rambu');
    Route::post('/location/create-task', [TaskController::class, 'createTask'])
        ->name('create.task');
    Route::post('/location/update-task', [TaskController::class, 'updateTask'])
        ->name('update.task');

});
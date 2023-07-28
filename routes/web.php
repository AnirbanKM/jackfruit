<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginAction', [AuthController::class, 'loginAction'])->name('loginAction');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/createUser', [AuthController::class, 'createUser'])->name('createUser');

Route::group(['middleware', 'auth'], function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Task Routes
    Route::get('/create-Task', [TaskController::class, 'createTask'])->name('createTask');
    Route::post('/store-task', [TaskController::class, 'storeTask'])->name('storeTask');
    Route::get('/delete-task/{id}', [TaskController::class, 'deleteTask'])->name('deleteTask');
    Route::get('/edit-task/{task}', [TaskController::class, 'editTask'])->name('editTask');
    Route::post('/update-task', [TaskController::class, 'updateTask'])->name('updateTask');
    Route::post('/task-status-update', [TaskController::class, 'taskStatusUpdate'])->name('taskStatusUpdate');
    Route::get('/set-reminder/{task}', [TaskController::class, 'setReminder'])->name('setReminder');
    Route::get('/view-task/{task}', [TaskController::class, 'viewTask'])->name('viewTask');

    // Set Reminder
    Route::post('/create-reminder', [ReminderController::class, 'createReminder'])->name('createReminder');

    // Manual Cron Trigger
    Route::get('/send-mail', [ReminderController::class, 'sendMail'])->name('sendMail');
});

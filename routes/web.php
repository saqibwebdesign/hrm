<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\employee\employeeController;
use App\Http\Controllers\employee\attendanceController;

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

//Authentication
    Route::get('login', [authController::class,'login'])->name('login');
    Route::post('login', [authController::class,'loginAttempt'])->name('login');
    Route::get('logout', [authController::class,'logout'])->name('logout');

    //Employee
    Route::prefix('employee')->namespace('employee')->middleware('employeeAuth')->group(function(){
        //Dashboard
        Route::get('/', [employeeController::class, 'index'])->name('employee.dashboard');

        //Attendance
        Route::prefix('attendance')->group(function(){
            Route::get('/clockAttempt/{id}', [attendanceController::class, 'clockAttempt']);
        });

        //General Settings
        Route::prefix('settings')->group(function(){
            Route::get('profile', [employeeController::class, 'profile'])->name('employee.settings.profile');
            Route::post('profile', [employeeController::class, 'profileUpdate'])->name('employee.settings.profile');
            Route::post('updateImage', [employeeController::class, 'updateImage'])->name('employee.settings.profile.updateImage');

            Route::get('social', [employeeController::class, 'social'])->name('employee.settings.social');
            Route::post('social', [employeeController::class, 'socialUpdate'])->name('employee.settings.social');

            Route::get('bank', [employeeController::class, 'bank'])->name('employee.settings.bank');
            Route::post('bankAdd', [employeeController::class, 'bankAdd'])->name('employee.settings.bank.add');

            Route::get('experience', [employeeController::class, 'experience'])->name('employee.settings.experience');
            Route::post('experienceAdd', [employeeController::class, 'experienceAdd'])->name('employee.settings.experience.add');

            Route::get('qualification', [employeeController::class, 'qualification'])->name('employee.settings.qualification');
            Route::post('qualificationAdd', [employeeController::class, 'qualificationAdd'])->name('employee.settings.qualification.add');

            Route::get('changePassword', [employeeController::class, 'changePassword'])->name('employee.settings.changePassword');
            Route::post('changePassword', [employeeController::class, 'changePasswordSubmit'])->name('employee.settings.changePassword');
        });
    });
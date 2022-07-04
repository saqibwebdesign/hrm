<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\employee\employeeController;
use App\Http\Controllers\employee\attendanceController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\employeeController as adminEmployee;
use App\Http\Controllers\admin\portfolioController;
use App\Http\Controllers\admin\testimonialController;
use App\Http\Controllers\admin\notificationController;

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

    Route::middleware('employeeAuth')->group(function(){
        Route::get('/',[authController::class, 'check']);
        //Employee
        Route::prefix('employee')->namespace('employee')->group(function(){
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
    });


    // Admin
    Route::prefix('admin')->namespace('admin')->group(function(){
        Route::get('/login', [adminController::class, 'login'])->name('admin.login');
        Route::post('/login', [adminController::class, 'loginSubmit'])->name('admin.login');
        Route::get('/logout', [adminController::class, 'logout'])->name('admin.logout');

        //Middleware
            Route::middleware('adminAuth')->group(function(){
                Route::get('/', [adminController::class, 'index'])->name('admin.dashboard');
                    //Portfolio
                        Route::prefix('employee')->group(function(){
                            Route::get('/', [adminEmployee::class, 'index'])->name('admin.employee');   
                            Route::post('/add', [adminEmployee::class, 'employeeAdd'])->name('admin.employee.add');
                            Route::get('/edit/{id}', [adminEmployee::class, 'employeeEdit']);
                            Route::post('/update', [adminEmployee::class, 'employeeUpdate'])->name('admin.employee.update');
                            Route::get('/delete/{id}', [adminEmployee::class, 'employeeDelete']);
                        });

                    //Testimonials
                        Route::prefix('notification')->group(function(){
                            Route::get('/', [notificationController::class, 'notification'])->name('admin.notification');
                            Route::get('/delete/{id}', [notificationController::class, 'notificationDelete']);
                            Route::get('/edit/{id}', [notificationController::class, 'notificationEdit']);
                            Route::post('/add', [notificationController::class, 'notificationAdd'])->name('admin.notification.add');
                            Route::post('/update', [notificationController::class, 'notificationUpdate'])->name('admin.notification.update');
                        });


                    //Categories
                        Route::prefix('holidays')->group(function(){
                            Route::get('/', [holidaysController::class, 'holidays'])->name('admin.holidays');
                            Route::get('/delete/{id}', [holidaysController::class, 'holidaysDelete']);
                            Route::get('/edit/{id}', [holidaysController::class, 'holidaysEdit']);
                            Route::post('/add', [holidaysController::class, 'holidaysAdd'])->name('admin.holidays.add');
                            Route::post('/update', [holidaysController::class, 'holidaysUpdate'])->name('admin.holidays.update');
                        });
                });   
    });  
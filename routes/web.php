<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\employee\employeeController;
use App\Http\Controllers\employee\attendanceController;
use App\Http\Controllers\employee\leaveController;
use App\Http\Controllers\employee\payrollController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\employeeController as adminEmployee;
use App\Http\Controllers\admin\portfolioController;
use App\Http\Controllers\admin\testimonialController;
use App\Http\Controllers\admin\notificationController;
use App\Http\Controllers\admin\holidaysController;
use App\Http\Controllers\admin\departmentController;
use App\Http\Controllers\admin\attendanceController as adminAttendance;
use App\Http\Controllers\admin\leaveController as adminLeaves;
use App\Http\Controllers\admin\payrollController as adminPayroll;
use App\Http\Controllers\employee\sales\projectController as salesProjectController;
use App\Http\Controllers\employee\manager\projectController as managerProjectController;

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

    Route::get('/attendanceCheck', [attendanceController::class, 'attendanceCheck']);
    Route::middleware('employeeAuth')->group(function(){
        Route::get('/',[authController::class, 'check']);
        //Employee
        Route::prefix('employee')->namespace('employee')->group(function(){
            //Dashboard
            Route::get('/', [employeeController::class, 'index'])->name('employee.dashboard');

            //Attendance
            Route::prefix('attendance')->group(function(){
                Route::get('/', [attendanceController::class, 'monthly'])->name('employee.attendance.monthly');
                Route::get('/clockAttempt/{id}', [attendanceController::class, 'clockAttempt']);
            });

            //Leaves
            Route::prefix('leaves')->group(function(){
                Route::get('/', [leaveController::class, 'index'])->name('employee.leaves');
                Route::post('/add', [leaveController::class, 'add'])->name('employee.leaves.add');
            });

            //Payroll
                Route::prefix('payroll')->group(function(){
                    Route::get('/current', [payrollController::class, 'current'])->name('employee.payroll.current');
                    Route::get('/payslip', [payrollController::class, 'payslip'])->name('employee.payroll.payslip');
                    Route::get('/payslip/detail/{id}', [payrollController::class, 'payslipDetail'])->name('employee.payroll.payslip.detail');
                });

            //Sales
                Route::prefix('sales')->namespace('sales')->middleware('salesAuth')->group(function(){
                    //Project
                        Route::prefix('project')->group(function(){
                            Route::get('/', [salesProjectController::class, 'index'])->name('employee.sales.project');
                            Route::get('create', [salesProjectController::class, 'create'])->name('employee.sales.project.create');
                            Route::post('create', [salesProjectController::class, 'createSubmit']);
                        });
                });

            //Project Management
                Route::prefix('management')->namespace('manager')->middleware('managerAuth')->group(function(){
                    //Project
                        Route::prefix('project')->group(function(){
                            Route::get('/', [salesProjectController::class, 'index'])->name('employee.sales.project');
                            Route::get('detail', [managerProjectController::class, 'detail'])->name('employee.sales.project.detail');
                        });
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
                    //Employee
                        Route::prefix('employee')->group(function(){
                            Route::get('/', [adminEmployee::class, 'index'])->name('admin.employee');   
                            Route::get('/add', [adminEmployee::class, 'employeeAdd'])->name('admin.employee.add');
                            Route::post('/add', [adminEmployee::class, 'employeeInsert'])->name('admin.employee.add');
                            Route::get('/edit/{id}', [adminEmployee::class, 'employeeEdit']);
                            Route::post('/update', [adminEmployee::class, 'employeeUpdate'])->name('admin.employee.update');
                            Route::get('/delete/{id}', [adminEmployee::class, 'employeeDelete']);
                        });

                    //Attendance
                        Route::prefix('attendance')->group(function(){
                            Route::get('employee/{id}', [adminAttendance::class, 'employee'])->name('admin.attendance.employee');
                            Route::get('today', [adminAttendance::class, 'today'])->name('admin.attendance.today');
                            Route::post('today', [adminAttendance::class, 'todayFilter'])->name('admin.attendance.today');
                            Route::get('sheet', [adminAttendance::class, 'sheet'])->name('admin.attendance.sheet');

                            Route::prefix('shift')->group(function(){
                                Route::get('/', [adminAttendance::class, 'shift'])->name('admin.attendance.shift');
                                Route::post('add', [adminAttendance::class, 'shiftAdd'])->name('admin.attendance.shift.add');
                                Route::get('/delete/{id}', [adminAttendance::class, 'shiftDelete']);
                                Route::get('/edit/{id}', [adminAttendance::class, 'shiftEdit']);
                                Route::post('update', [adminAttendance::class, 'shiftUpdate'])->name('admin.attendance.shift.update');
                            });
                        });

                    //Leaves
                        Route::prefix('leaves')->group(function(){
                            Route::get('/', [adminLeaves::class, 'index'])->name('admin.leaves');
                            Route::get('/status/{type}/{id}', [adminLeaves::class, 'statusChange']);
                            Route::get('/assign/{id}', [adminLeaves::class, 'assign'])->name('admin.leaves.assign');
                            Route::post('/update', [adminLeaves::class, 'leaveUpdate'])->name('admin.leaves.assign.update');
                        });

                    //Payroll
                        Route::prefix('payroll')->group(function(){
                            Route::get('/', [adminPayroll::class, 'index'])->name('admin.payroll');
                            Route::get('generate', [adminPayroll::class, 'generate'])->name('admin.payroll.generate');
                            Route::get('details/{id}', [adminPayroll::class, 'details'])->name('admin.payroll.details');
                            Route::get('payslip/{id}', [adminPayroll::class, 'payslip']);
                        });

                    //Notification
                        Route::prefix('notification')->group(function(){
                            Route::get('/', [notificationController::class, 'notification'])->name('admin.notification');
                            Route::get('/delete/{id}', [notificationController::class, 'notificationDelete']);
                            Route::get('/edit/{id}', [notificationController::class, 'notificationEdit']);
                            Route::post('/add', [notificationController::class, 'notificationAdd'])->name('admin.notification.add');
                            Route::post('/update', [notificationController::class, 'notificationUpdate'])->name('admin.notification.update');
                            Route::get('/view/{id}', [notificationController::class, 'notificationView']);
                        });


                    //Holidays
                        Route::prefix('holidays')->group(function(){
                            Route::get('/', [holidaysController::class, 'holidays'])->name('admin.holidays');
                            Route::get('/delete/{id}', [holidaysController::class, 'holidaysDelete']);
                            Route::get('/edit/{id}', [holidaysController::class, 'holidaysEdit']);
                            Route::post('/add', [holidaysController::class, 'holidaysAdd'])->name('admin.holidays.add');
                            Route::post('/update', [holidaysController::class, 'holidaysUpdate'])->name('admin.holidays.update');
                        });

                    //Settings
                        Route::prefix('settings')->group(function(){
                            //Departments
                                Route::prefix('departments')->group(function(){
                                    Route::get('/', [departmentController::class, 'index'])->name('admin.settings.department');
                                    Route::get('/delete/{id}', [departmentController::class, 'delete']);
                                    Route::get('/edit/{id}', [departmentController::class, 'edit']);
                                    Route::post('/add', [departmentController::class, 'add'])->name('admin.settings.department.add');
                                    Route::post('/update', [departmentController::class, 'update'])->name('admin.settings.department.update');
                                });
                        });
                });   
    });  
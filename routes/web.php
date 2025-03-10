<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Backend\Dashboardcontroller;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Backend\JobHistoryController;
use App\Http\Controllers\Backend\JobGradesController;
use App\Http\Controllers\Backend\RegionsController;
use App\Http\Controllers\Backend\CountriesController;
use App\Http\Controllers\Backend\LocationsController;
use App\Http\Controllers\Backend\DepartmentsController;
use App\Http\Controllers\Backend\ManagerController;
use App\Http\Controllers\Backend\MyaccountController;
use App\Http\Controllers\Backend\PayrollController;
use App\Http\Controllers\Backend\PositionController;
use App\Http\Controllers\Backend\InterviewController;



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



Route::get('/', [AuthController::class, 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::post('forgot-password/post', [AuthController::class, 'forget_password_post']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post', [AuthController::class, 'register_post']);

//This is on register.blade.php view
Route::post('checkemail', [AuthController::class, 'checkEmail']);

Route::post('login_post', [AuthController::class, 'login_post']);

//Admin || HR same name
//This is middleware group, all the login users can access these routes.
Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [Dashboardcontroller::class, 'dashboard']);

    //***********************\\Employee Routes//***********************\\
    Route::get('admin/employees', [EmployeeController::class, 'index']);

    Route::get('admin/employees/add', [EmployeeController::class, 'add']);

    //Employee submit, HTML form request
    Route::post('admin/employees/add', [EmployeeController::class, 'add_post']);

    Route::get('admin/employees/view/{id}', [EmployeeController::class, 'view']);

    Route::get('admin/employees/edit/{id}', [EmployeeController::class, 'edit']);

    //This route will run when the Update button clicked.
    Route::post('admin/employees/edit/{id}', [EmployeeController::class, 'edit_update']);

    Route::get('admin/employees/delete/{id}', [EmployeeController::class, 'delete']);

    //Delete User (Employee) Image
    Route::get('admin/employees/image_delete/{id}', [EmployeeController::class, 'image_delete']);

    
    //***********************\\Job Routes//***********************\\
    Route::get('admin/jobs', [JobController::class, 'index']);

    Route::get('admin/jobs/add', [JobController::class, 'add']);

    //Job submit, HTML form request
    Route::post('admin/jobs/add', [JobController::class, 'add_post']);

    Route::get('admin/jobs/view/{id}', [JobController::class, 'view']);

    Route::get('admin/jobs/edit/{id}', [JobController::class, 'edit']);

    Route::post('admin/jobs/edit/{id}', [JobController::class, 'edit_update']);

    Route::get('admin/jobs/delete/{id}', [JobController::class, 'delete']);

    Route::get('admin/jobs_export', [JobController::class, 'jobs_export']);



    //***********************\\Job History Routes//***********************\\

    Route::get('admin/job_history', [JobHistoryController::class, 'index']);

    Route::get('admin/job_history/add', [JobHistoryController::class, 'add']);

    Route::post('admin/job_history/add', [JobHistoryController::class, 'add_post']);

    Route::get('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit']);

    Route::post('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit_update']);

    Route::get('admin/job_history/delete/{id}', [JobHistoryController::class, 'delete']);

    Route::get('admin/job_history_export', [JobHistoryController::class, 'job_history_export']);


    //***********************\\Job Grades Routes//***********************\\

    Route::get('admin/job_grades', [JobGradesController::class, 'index']);

    Route::get('admin/job_grades/add', [JobGradesController::class, 'add']);

    Route::post('admin/job_grades/add ', [JobGradesController::class, 'add_post']);

    Route::get('admin/job_grades/edit/{id}', [JobGradesController::class, 'edit']);

    Route::post('admin/job_grades/edit/{id}', [JobGradesController::class, 'edit_update']);

    Route::get('admin/job_grades/delete/{id}', [JobGradesController::class, 'delete']);


    //***********************\\Regions Routes//***********************\\

    Route::get('admin/regions', [RegionsController::class, 'index']);

    Route::get('admin/regions/add', [RegionsController::class, 'add']);

    Route::post('admin/regions/add ', [RegionsController::class, 'add_post']);

    Route::get('admin/regions/edit/{id}', [RegionsController::class, 'edit']);

    Route::post('admin/regions/edit/{id}', [RegionsController::class, 'edit_update']);

    Route::get('admin/regions/delete/{id}', [RegionsController::class, 'delete']);


    //***********************\\Countries Routes//***********************\\

    Route::get('admin/countries', [CountriesController::class, 'index']);

    Route::get('admin/countries/add', [CountriesController::class, 'add']);

    Route::post('admin/countries/add ', [CountriesController::class, 'add_post']);

    Route::get('admin/countries/edit/{id}', [CountriesController::class, 'edit']);

    Route::post('admin/countries/edit/{id}', [CountriesController::class, 'edit_update']);

    Route::get('admin/countries/delete/{id}', [CountriesController::class, 'delete']);

    Route::get('admin/countries_export', [CountriesController::class, 'countries_export']);


    //***********************\\Locations Routes//***********************\\

    Route::get('admin/locations', [LocationsController::class, 'index']);

    Route::get('admin/locations/add', [LocationsController::class, 'add']);

    Route::post('admin/locations/add ', [LocationsController::class, 'add_post']);

    Route::get('admin/locations/edit/{id}', [LocationsController::class, 'edit']);

    Route::post('admin/locations/edit/{id}', [LocationsController::class, 'edit_update']);

    Route::get('admin/locations/delete/{id}', [LocationsController::class, 'delete']);

    Route::get('admin/locations_export', [LocationsController::class, 'locations_export']);


    //***********************\\Department Routes//***********************\\

    Route::get('admin/departments', [DepartmentsController::class, 'index']);

    Route::get('admin/departments/add', [DepartmentsController::class, 'add']);

    Route::post('admin/departments/add ', [DepartmentsController::class, 'add_post']);

    Route::get('admin/departments/edit/{id}', [DepartmentsController::class, 'edit']);

    Route::post('admin/departments/edit/{id}', [DepartmentsController::class, 'edit_update']);

    Route::get('admin/departments/delete/{id}', [DepartmentsController::class, 'delete']);

    Route::get('admin/departments_export', [DepartmentsController::class, 'departments_export']);


    //***********************\\Manager Routes//***********************\\  

    Route::get('admin/manager', [ManagerController::class, 'index']);

    Route::get('admin/manager/add', [ManagerController::class, 'add']);

    Route::post('admin/manager/add ', [ManagerController::class, 'add_post']);

    Route::get('admin/manager/edit/{id}', [ManagerController::class, 'edit']);

    Route::post('admin/manager/edit/{id}', [ManagerController::class, 'edit_update']);

    Route::get('admin/manager/delete/{id}', [ManagerController::class, 'delete']);

    Route::get('admin/manager_export', [ManagerController::class, 'manager_export']);


    //***********************\\My Account Routes//***********************\\ 

    Route::get('admin/my_account', [MyaccountController::class, 'my_account']);

    Route::post('admin/my_account/update ', [MyaccountController::class, 'edit_update']);


    //***********************\\Pay Roll Routes//***********************\\ 

    Route::get('admin/payroll', [PayrollController::class, 'index']);

    Route::get('admin/payroll/add', [PayrollController::class, 'add']);

    Route::post('admin/payroll/add ', [PayrollController::class, 'insert_add']);

    Route::get('admin/payroll/view/{id}', [PayrollController::class, 'view']);

    Route::get('admin/payroll/edit/{id}', [PayrollController::class, 'edit']);

    Route::post('admin/payroll/edit/{id}', [PayrollController::class, 'edit_update']);

    Route::get('admin/payroll/delete/{id}', [PayrollController::class, 'delete']);

    Route::get('admin/payroll_export', [PayrollController::class, 'payroll_export']);


    //***********************\\Position Routes//***********************\\ 

    Route::get('admin/position', [PositionController::class, 'index']);

    Route::get('admin/position/add', [PositionController::class, 'add']);

    Route::post('admin/position/add ', [PositionController::class, 'insert_add']);

    Route::get('admin/position/edit/{id}', [PositionController::class, 'edit']);

    Route::post('admin/position/edit/{id}', [PositionController::class, 'edit_update']);

    Route::get('admin/position/delete/{id}', [PositionController::class, 'delete']);


});


//This is middleware group, all the login users can access these routes.
Route::group(['middleware' => 'employee'], function () {

    Route::get('employee/dashboard', [Dashboardcontroller::class, 'dashboard']);

    Route::get('employee/my_account', [MyaccountController::class, 'employee_my_account']);

    Route::post('employee/my_account/update', [MyaccountController::class, 'employee_my_account_update']);

    Route::get('admin/interview', [InterviewController::class, 'interview']);

});

//User logout route.
Route::get('logout', [AuthController::class, 'logout']);

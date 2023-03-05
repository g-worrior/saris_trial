<?php

use App\Models\UndergraduateStudent;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

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



Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth', 'role_or_permission:Student'])->prefix('student')->group(function () {
    Route::get('fees-statement', [\App\Http\Controllers\StudentController::class, 'get_statement']);
    Route::get('academic-profile', [\App\Http\Controllers\StudentController::class, 'get_academic_profile']);
    Route::get('grades', [\App\Http\Controllers\StudentController::class, 'get_grades']);
    Route::get('register', [\App\Http\Controllers\StudentController::class, 'register']);
    Route::post('register', [\App\Http\Controllers\StudentController::class, 'register_courses']);
    Route::post('enroll', [\App\Http\Controllers\StudentController::class, 'enroll']);

});

Route::middleware(['auth', 'role:Admin'])->prefix('access')->group(function () {

    Route::get('students', [\App\Http\Controllers\StudentController::class, 'show'])->middleware('permission:view grades');
    Route::get('add-student', [\App\Http\Controllers\StudentController::class, 'create']);
    Route::post('add-student', [\App\Http\Controllers\StudentController::class, 'store']);
    
    Route::get('lecturers', [\App\Http\Controllers\LecturerController::class, 'index']);
    Route::get('add-lecturer', [\App\Http\Controllers\LecturerController::class, 'create']);
    Route::post('add-lecturer', [\App\Http\Controllers\LecturerController::class, 'store']);
    
    Route::get('other-users', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('add-user', [\App\Http\Controllers\UserController::class, 'create']);
    Route::post('add-user', [\App\Http\Controllers\UserController::class, 'store']);

    Route::post('update-department', [\App\Http\Controllers\DepartmentController::class, 'update']);
    Route::post('add-department', [\App\Http\Controllers\DepartmentController::class, 'store']);
    
    Route::post('add-program', [\App\Http\Controllers\ProgramController::class, 'store']);
    Route::post('update-program', [\App\Http\Controllers\ProgramController::class, 'update']);

    Route::post('add-academic-year', [\App\Http\Controllers\AcademicYearController::class, 'store']);
    Route::post('update-academic-year', [\App\Http\Controllers\AcademicYearController::class, 'update']);
    
    Route::post('add-semester', [\App\Http\Controllers\SemesterController::class, 'store']);
    Route::post('update-semester', [\App\Http\Controllers\SemesterController::class, 'update']);

    Route::post('add-course', [\App\Http\Controllers\CourseController::class, 'store']);
    Route::get('course-assignment', [\App\Http\Controllers\CourseController::class, 'course_assignment']);
    Route::post('course-assignment', [\App\Http\Controllers\CourseController::class, 'course_assignment_store']);
    

});

Route::middleware(['auth', 'role:Admin|Accounts'])->prefix('access')->group(function () {

    Route::get('students-balance', [\App\Http\Controllers\AccountsController::class, 'index']);

    Route::get('invoices', [\App\Http\Controllers\InvoiceController::class, 'index']);
    Route::get('invoice-student', [\App\Http\Controllers\InvoiceController::class, 'getInvoiceStudent']);
    Route::post('add-invoice', [\App\Http\Controllers\InvoiceController::class, 'store']);

    Route::get('receipts', [\App\Http\Controllers\ReceiptController::class, 'index']);
    Route::post('add-receipt', [\App\Http\Controllers\ReceiptController::class, 'store']);
    Route::post('update-receipt', [\App\Http\Controllers\ReceiptController::class, 'update']);


});

Route::middleware(['auth', 'role:Lecturer'])->prefix('access')->group(function () {
    Route::get('my-courses', [\App\Http\Controllers\LecturerController::class, 'my_courses']);
    Route::get('view/course/{encrypted_code}', [\App\Http\Controllers\LecturerController::class, 'view_course'])->name('access.view.course');

    Route::post('add-assessment', [App\Http\Controllers\AssessmentController::class, 'store']);
});


Route::middleware(['auth', 'role_or_permission:Lecturer|Admin|Accounts'])->prefix('access')->group(function () { 
    Route::get('courses', [\App\Http\Controllers\CourseController::class, 'index']);

    Route::get('departments', [\App\Http\Controllers\DepartmentController::class, 'index']);
   
    Route::get('programs', [\App\Http\Controllers\ProgramController::class, 'index']);
   
    Route::get('academic-years-list', [\App\Http\Controllers\AcademicYearController::class, 'index']);
   
    Route::get('semesters-list', [\App\Http\Controllers\SemesterController::class, 'index']);
});

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('auth')->prefix('student')->group(function () {
    Route::get('fees-statement', [\App\Http\Controllers\StudentController::class, 'get_statement']);
    Route::get('academic-profile', [\App\Http\Controllers\StudentController::class, 'get_academic_profile']);
    Route::get('grades', [\App\Http\Controllers\StudentController::class, 'get_grades']);
    Route::get('register', [\App\Http\Controllers\StudentController::class, 'register']);
    Route::post('register', [\App\Http\Controllers\StudentController::class, 'register_courses']);
    Route::post('enroll', [\App\Http\Controllers\StudentController::class, 'enroll']);

});

Route::middleware('auth')->prefix('access')->group(function () {

    Route::get('students', [\App\Http\Controllers\StudentController::class, 'show'])->middleware('permission:view grades');
    Route::get('add-student', [\App\Http\Controllers\StudentController::class, 'create']);
    Route::post('add-student', [\App\Http\Controllers\StudentController::class, 'store']);
    
    Route::get('lecturers', [\App\Http\Controllers\LecturerController::class, 'index']);
    Route::get('add-lecturer', [\App\Http\Controllers\LecturerController::class, 'create']);
    Route::post('add-lecturer', [\App\Http\Controllers\LecturerController::class, 'store']);

    Route::get('departments', [\App\Http\Controllers\DepartmentController::class, 'index']);
    Route::post('update-department', [\App\Http\Controllers\DepartmentController::class, 'update']);
    Route::post('add-department', [\App\Http\Controllers\DepartmentController::class, 'store']);
    
    Route::get('programs', [\App\Http\Controllers\ProgramController::class, 'index']);
    Route::post('add-program', [\App\Http\Controllers\ProgramController::class, 'store']);
    Route::post('update-program', [\App\Http\Controllers\ProgramController::class, 'update']);

    Route::get('academic-years-list', [\App\Http\Controllers\AcademicYearController::class, 'index']);
    Route::post('add-academic-year', [\App\Http\Controllers\AcademicYearController::class, 'store']);
    Route::post('update-academic-year', [\App\Http\Controllers\AcademicYearController::class, 'update']);
    
    Route::get('semesters-list', [\App\Http\Controllers\SemesterController::class, 'index']);
    Route::post('add-semester', [\App\Http\Controllers\SemesterController::class, 'store']);
    Route::post('update-semester', [\App\Http\Controllers\SemesterController::class, 'update']);

    Route::get('courses', [\App\Http\Controllers\CourseController::class, 'index']);
    
    
    Route::get('students-balance', [\App\Http\Controllers\AccountsController::class, 'index']);

    Route::get('invoices', [\App\Http\Controllers\InvoiceController::class, 'index']);
    Route::get('invoice-student', [\App\Http\Controllers\InvoiceController::class, 'getInvoiceStudent']);
    Route::post('add-invoice', [\App\Http\Controllers\InvoiceController::class, 'store']);

    Route::get('receipts', [\App\Http\Controllers\ReceiptController::class, 'index']);
    Route::post('add-receipt', [\App\Http\Controllers\ReceiptController::class, 'store']);
    Route::post('update-receipt', [\App\Http\Controllers\ReceiptController::class, 'update']);


}); 


Route::get('create-roles-pem', function() {
    $viewgrades = Permission::create(['name' => 'view grades']);
    $editgrades = Permission::create(['name' => 'edit grades']);
    $addgrades = Permission::create(['name' => 'add grades']);
    $adduser = Permission::create(['name' => 'add user']);
    $edituser = Permission::create(['name' => 'edit user']);
    $deleteuser = Permission::create(['name' => 'delete user']);
    $addcourse = Permission::create(['name' => 'add courses']);
    $editcourse = Permission::create(['name' => 'edit courses']);
    $deletecourse = Permission::create(['name' => 'delete courses']);
    $addinvoice = Permission::create(['name' => 'add invoice']);
    $editinvoice = Permission::create(['name' => 'edit invoice']);
    $deleteinvoice = Permission::create(['name' => 'delete invoice']);
    $addreceipt = Permission::create(['name' => 'add receipt']);
    $editreceipt = Permission::create(['name' => 'edit receipt']);
    $deletereceipt= Permission::create(['name' => 'delete receipt']);

    $admin = Role::create(['name' => 'Admin']);
    $admin->givePermissionTo([
        $viewgrades, $editgrades, $addgrades, $adduser, $edituser,
        $deleteuser, $addcourse, $editcourse, $deletecourse, $addinvoice,
        $deleteinvoice, $editinvoice, $addreceipt, $editreceipt, $deletereceipt
    ]);

    $student = Role::create(['name' => 'Student']);
    $principal = Role::create(['name' => 'Principal']);
    $accounts = Role::create(['name' => 'Accounts']);
    $teacher = Role::create(['name' => 'Teacher']);

    Auth::user()->assignRole('Admin');

    return 'Roles created';
});

Route::get('new', function () {
    UndergraduateStudent::create([
        'undergraduate_student_name' => 'All'
    ]);
});

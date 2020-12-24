<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ACLController;

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
//    return view('welcome');
    return redirect()->route('login'); // view auth/login.blade
});

Route::get('/refresh', function () {
    return redirect()->back();
})->name('back');

//Route::get('/test', function () {
//    return view('test/test');
//});
//Route::get('/testlogout', function () {
//    return view('test/testout');
//});




Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/permission-setup', [ACLController::class, 'permission'])->name('permission');
    Route::get('/permission-edit/{pid}', [ACLController::class, 'permissionEdit'])->name('permission.edit');
    Route::post('/permission-update/{pid}', [ACLController::class, 'permissionUpdate'])->name('permission.update');

    Route::get('/role-setup', [ACLController::class, 'role'])->name('role');
    Route::post('/role-store', [ACLController::class, 'roleStore'])->name('role.store');
    Route::delete('/role-delete/{rid}', [ACLController::class, 'roleDestroy'])->name('role.delete');
    Route::get('/role-edit/{rid}', [ACLController::class, 'roleEdit'])->name('role.edit');
    Route::post('/role-update/{rid}', [ACLController::class, 'roleUpdate'])->name('role.update');

    Route::get('/users-setup', [ACLController::class, 'users'])->name('users');
    Route::post('/user-store', [ACLController::class, 'userStore'])->name('user.store');
    Route::get('/user-edit/{uid}', [ACLController::class, 'userEdit'])->name('user.edit');
    Route::post('/user-update/{uid}', [ACLController::class, 'userUpdate'])->name('user.update');

    Route::get('/make_user_in_active/{uid}', [ACLController::class, 'makeUserInactive'])->name('make.user.in.active');
    Route::get('/make_user_active/{uid}', [ACLController::class, 'makeUserActive'])->name('make.user.active');
    Route::post('/make_user_active/{uid}', [ACLController::class, 'makeUserActiveUpdate'])->name('make.user.active');




});

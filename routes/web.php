<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ACLController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageCategoryController;
use App\Http\Controllers\ImageVendorController;

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

    Route::get('/role_setup', [ACLController::class, 'role'])->name('role');
    Route::post('/role_store', [ACLController::class, 'roleStore'])->name('role.store');
    Route::delete('/role_delete/{rid}', [ACLController::class, 'roleDestroy'])->name('role.delete');
    Route::get('/role_edit/{rid}', [ACLController::class, 'roleEdit'])->name('role.edit');
    Route::post('/role_update/{rid}', [ACLController::class, 'roleUpdate'])->name('role.update');

    Route::get('/users_setup', [UserController::class, 'users'])->name('users');
    Route::post('/user_store', [UserController::class, 'userStore'])->name('user.store');
    Route::get('/user_edit/{uid}', [UserController::class, 'userEdit'])->name('user.edit');
    Route::post('/user_update/{uid}', [UserController::class, 'userUpdate'])->name('user.update');

    Route::get('/make_user_in_active/{uid}', [UserController::class, 'makeUserInactive'])->name('make.user.in.active');
    Route::get('/make_user_active/{uid}', [UserController::class, 'makeUserActive'])->name('make.user.active');
    Route::post('/make_user_active/{uid}', [UserController::class, 'makeUserActiveUpdate'])->name('make.user.active');

    Route::get('/users_account_settings', [UserController::class, 'accountSettings'])->name('account.settings');
    Route::post('/users_account_settings', [UserController::class, 'accountSettingsUpdate'])
        ->name('account.settings.update');
    Route::post('/users_account_settings_info/{uid}', [UserController::class, 'accountSettingsUpdateInfo'])
        ->name('account.settings.update.info');

    Route::get('/images/category', [ImageCategoryController::class, 'index'])->name('image.category');
    Route::post('/images/category', [ImageCategoryController::class, 'store'])->name('image.category.store');
    Route::get('/images/category/edit/{cid}', [ImageCategoryController::class, 'edit'])->name('image.category.edit');
    Route::post('/images/category/edit/{cid}', [ImageCategoryController::class, 'update'])
        ->name('image.category.update');
    Route::delete('/images/category/delete/{cid}', [ImageCategoryController::class, 'destroy'])
        ->name('image.category.delete');

    Route::get('/images/vendor', [ImageVendorController::class, 'index'])->name('image.vendor');
    Route::post('/images/vendor', [ImageVendorController::class, 'store'])->name('image.vendor.store');
    Route::get('/images/vendor/edit/{vid}', [ImageVendorController::class, 'edit'])->name('image.vendor.edit');
    Route::post('/images/vendor/edit/{vid}', [ImageVendorController::class, 'update'])
        ->name('image.vendor.update');
    Route::delete('/images/vendor/delete/{vid}', [ImageVendorController::class, 'destroy'])
        ->name('image.vendor.delete');


});

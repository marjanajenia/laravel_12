<?php

use App\Http\Controllers\Admin\MailSettingController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'admin'])->get('/dasboard', function (){
    return view('backend.dashboard'); })->name('dashboard');

//other setting
Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::get('/debug', [SettingController::class, 'debug'])->name('setting.debug');
});
//mail setting
Route::get('/sendMail', [MailSettingController::class, 'sendMail']);
Route::get('/setting/mail', [MailSettingController::class, 'index'])->name('setting.mail');
Route::post('/setting/mailSend', [MailSettingController::class, 'send'])->name('setting.mail.send');
Route::post('/setting/mailUpdate', [MailSettingController::class, 'update'])->name('setting.mail.update');
//profile setting
Route::controller(ProfileSettingController::class)->group(function (){
    Route::get('/setting/profile', 'index')->name('setting.profile');
    Route::post('/setting/profile/update', 'updateProfile')->name('setting.profile.update');
    Route::post('/setting/profile/update/password', 'updatePassword')->name('setting.profile.updatePassword');
    Route::post('/setting/profile/update/picture', 'updatePicture')->name('setting.profile.updatePicture');
});

//roles
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
//user
Route::resource('users', UserController::class);
Route::post('/notifications/mark-as-read', [UserController::class, 'markAsRead'])->name('notifications.markAsRead');

//category
Route::controller(CategoryController::class)->prefix('blog')->group( function (){
    Route::get('/bgcategory', 'index')->name('bg_category');
    Route::get('/bgcategory/create', 'create')->name('bg_category.create');
    Route::post('/bgcategory/store', 'store')->name('bg_category.store');
    Route::get('/bgcategory/edit/{id}', 'edit')->name('bg_category.edit');
    Route::patch('/bgcategory/update/{id}', 'update')->name('bg_category.update');
    Route::get('/bgcategory/destroy/{id}', 'destroy')->name('bg_category.destroy');
    Route::get('/bgcategory/status/{id}', 'status')->name('bg_category.status');
});


require __DIR__.'/auth.php';

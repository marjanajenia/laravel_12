<?php

use App\Http\Controllers\Admin\MailSettingController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
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

//roles
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
//user
Route::resource('users', UserController::class);
Route::post('/notifications/mark-as-read', [UserController::class, 'markAsRead'])->name('notifications.markAsRead');


require __DIR__.'/auth.php';

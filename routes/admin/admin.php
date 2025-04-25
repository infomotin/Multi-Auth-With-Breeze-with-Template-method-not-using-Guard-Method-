<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Admin\AdminController;


Route::middleware(['auth', 'verified','roleMiddleware:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    //admin.logout
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
});
//admin login route it is not in the middleware group
// Route::get('/admin/login', function () {
//     return view('admin.login');
// })->name('admin.login')->middleware('guest:admin');
 // Only allow access to guests (not logged in)
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'AdminSubmit'])->name('admin.login.submit');
 
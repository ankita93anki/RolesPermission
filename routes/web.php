<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Permissions
     Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
     Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
      Route::post('/permissions/create', [PermissionController::class, 'store'])->name('permissions.store');
      Route::get('/permissions/{id}/edit', [PermissionController::class,'edit'])->name('permissions.edit');
       Route::post('/permissions/{id}', [PermissionController::class,'update'])->name('permissions.update');

       //Roles
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles/create', [RoleController::class, 'store'])->name('roles.store');

        
});

require __DIR__.'/auth.php';
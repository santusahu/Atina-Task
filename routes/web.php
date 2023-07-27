<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','CheckUserType'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/Change-Password', [CustomerController::class, 'ChangePasswordFoem'])->name('ChangePassword');
    

    // Customers Route
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/Customer', 'index')->name('CustomerList');
        Route::get('/AddCustomer', 'create')->name('AddCustomer');
        Route::POST('/AddCustomer', 'store')->name('SaveCustomer');

        Route::get('/EditCustomer/{id}', 'edit')->name('EditCustomer');
        Route::POST('/EditCustomer/{id}', 'update')->name('UpdateCustomer');
        Route::get('/DeleteCustomer/{id}', 'destroy')->name('DeleteCustomer');
    });
});





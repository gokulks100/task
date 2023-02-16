<?php

use App\Http\Controllers\employeeController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Route::get('getdata',[employeeController::class ,'getData'])->name('employee.getdata');
Route::post('store',[employeeController::class ,'store'])->name('employee.store');
Route::get('edit',[employeeController::class ,'getInvoiceById'])->name('employee.editdata');
Route::post('delete',[employeeController::class ,'delete'])->name('employee.delete');



<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ClientsAndContactsController;
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


Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard']);
	Route::resource('enquiries', EnquiryController::class);


    // Client and contacts
    Route::resource('clients-and-contacts', ClientsAndContactsController::class);
    
    
    Route::get('/', [LoginController::class, 'dashboard']);
 });




require __DIR__.'/auth.php';

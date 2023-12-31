<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\DetailController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::middleware('auth')->group(function(){
    Route::resource('wisatas', WisataController::class);
});

Route::get('home',[HomeController::class,'index'])->name('home');

Route::resource('details', DetailController::class);
Route::get('download-file/{wisataId}', [DetailController::class,'downloadFile'])->name('details.downloadFile');

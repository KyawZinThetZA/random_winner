<?php

use App\Http\Controllers\BlankController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\WinnerController;
use App\Models\Title;
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

Route::get('/', function () {
    $titles = Title::get()->last();
    return view('app', compact('titles'));
});

//Upload routes
Route::post('UploadTitle', [TitleController::class, 'uploadTitle'])->name('uploadTitle');
Route::get('uploadPage', [UploadController::class, 'goUploadPage'])->name('Upload');
Route::get('getCustomer', [UploadController::class, 'getCustomer'])->name('getCustomer');
Route::post('uploadCustomer', [UploadController::class, 'store'])->name('uploadCustomer');
Route::post('uploadProduct', [UploadController::class, 'storeProduct'])->name('uploadProduct');

//blank gifts routes
Route::get('enterBlank', [BlankController::class, 'creat'])->name('enterBlank');
Route::post('getCusProd', [BlankController::class, 'index'])->name('getCusProd');
Route::post('storeBlank', [BlankController::class, 'store'])->name('storeBlank');

//winner routes
Route::post('uploadWinner', [WinnerController::class, 'uploadWinner'])->name('uploadWinner');
Route::get('PickWinner', [WinnerController::class, 'goPickWinner'])->name('PickWinner');
Route::get('winnerList', [WinnerController::class, 'goWinnerList'])->name('goWinnerList');
Route::get('clearWinnerTable', [WinnerController::class, 'clearWinnerTable'])->name('clearWinnerTable');

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyFirstController;

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

Route::get('/mylaravel', function () {
    return view('mylaravel');
});

// untuk dinamik view, by default akan papar Hello world guest jika tiada hantar nama
Route::get('/mylaravel/{nama?}', function ($nama='guest') {
    $umur = 20;
    return view('mylaravel',compact('nama','umur'));
});


// Route::get('/aboutus/{kem}', function ($kem) {
//     return view('aboutus',compact('kem'));
// });

Route::get('/aboutus/{kementerian}', [MyFirstController::class,'aboutus']);

Route::get('/users',[UserController::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

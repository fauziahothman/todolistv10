<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyFirstController;
use Illuminate\Routing\Route as RoutingRoute;

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

// untk paparan semua query
DB::listen(function ($event) {
    dump($event->sql);
});

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


Route::get('/aboutus/{kementerian}', [MyFirstController::class,'aboutus']);

Route::get('/users',[UserController::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('tasks',[TaskController::class,'index']);
Route::get('tasks/{task}',[TaskController::class,'show'])->name('tasks.show');



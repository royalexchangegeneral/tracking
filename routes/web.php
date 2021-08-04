<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;


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

//-------------------------------------


//--------------------------------------



Route::get('/',[PageController::class,'index'])->name('index');

Route::get('/dashboard',[PageController::class,'dashboard'])->name('dashboard');
Route::get('/login',[PageController::class,'login'])->name('login');
Route::get('/logout',function(){
    session()->forget('user');
  return redirect('login');
});                                                                                                                                                                                                                        //

Route::get('/verdetail',[PageController::class,'verdetail'])->name('verdetail');
Route::get('/success',[PageController::class,'success'])->name('success');
// Route::get('/paynow',[PageController::class,'paynow'])->name('paynow');
// Route::get('payment',[CustomerController::class,'payment']);

//Route::webhooks('verifytransaction');
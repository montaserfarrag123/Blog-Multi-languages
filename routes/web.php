<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dashboard\SettingController;
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
    return view('dashbord.index');
});


Route::group(['prefix'=>'dashbord', 'as' => 'dashbord.' , 'middleware'=>['auth','checkLogin']],function(){

    route::get('/',function(){
        return view('dashbord.layouts.layout');
    });
    route::get('/settings',function(){
        return view('dashbord.settings');
    })->name('settings');

    Route::post('settings.update/{setting}',[SettingController::class , 'update'])->name('settings.update');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

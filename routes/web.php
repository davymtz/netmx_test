<?php

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
// Auth
Route::get('/', 'AuthController@showLoginForm')->name("login");
Route::post('/', 'AuthController@login');
Route::get('/logout', 'AuthController@logout')->name('logout');


// Panel
Route::group(["middleware"=>"CheckAuthenticatedUser"], function ()
{
    Route::get('/panel','PanelController@index')->name("panel");
    Route::get("/show/{id}","PanelController@show_detail");
    Route::get("/edit_task/{id}/edit","PanelController@edit_task");
    Route::get("/new_task","PanelController@create_task");
    Route::post("/create","PanelController@create");
    Route::post("/edit","PanelController@edit");
    Route::post("/delete","PanelController@delete");
    Route::post('/panel','PanelController@index');
});
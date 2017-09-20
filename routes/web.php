<?php

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
    return view('welcome');
});
Route::get('getLogin','LoController@getLogin');
Route::post('postLogin','LoController@postLogin');

Route::get('getRegister','ReController@getRegister');
Route::post('postRegister','ReController@postRegister');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('getManageWallet','WalletController@getManageWallet');
Route::post('postManageWallet','WalletController@postManageWallet');

Route::get('getAddWallet','WalletController@getAddWallet');
Route::post('postAddWallet','WalletController@postAddWallet');

Route::get('getEditWallet/{id}','WalletController@getEditWallet');
Route::post('postEditWallet/{id}','WalletController@postEditWallet');

Route::get('postDeleteWallet/{id}','WalletController@postDeleteWallet');

Route::get('getTransferWallet','WalletController@getTransferWallet');
Route::post('postTransferWallet','WalletController@postTransferWallet');

Route::get('getEditUser/{id}','UserController@getEditUser');
Route::post('postEditUser/{id}','UserController@postEditUser');

Route::get('getShowDetail/{id}','WalletController@getShowDetail');

Route::post('getSearch','WalletController@getSearch');

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('test', 'API\TradeController@test');
Route::get('config', 'API\Config@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('add/account', 'API\Account@add_bank_account');
    Route::post('add/bio', 'API\Account@update_profile');
    Route::get('accounts', 'API\Account@fetch_accounts');
    Route::post('password/change', 'API\Account@change_password');

});
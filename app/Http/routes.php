<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\TSHuawei;
use Illuminate\Support\Facades\DB;

Event::listen('illuminate.query',function($query){
	//var_dump($query);
});
Route::get('trafik', function(){

	return view('trafik.index');
});
Route::get('trafik/api', function(){
	//return TSHuawei::join('tg_data_reference' ,'tg_ss_huawei.Device','=','tg_data_reference.device')->get();
	return DB::table('tg_ss_huawei')
		->join('tg_data_reference',function($join)
		{
			$join->on('tg_data_reference.tgrp', '=','tg_ss_huawei.measuring_object_ID')
			->on('tg_ss_huawei.Device','=','tg_data_reference.device');
		})->get(['tg_ss_huawei.Measuring_Object_ID','tg_data_reference.node', 'tg_data_reference.f_xch', 'tg_data_reference.t_xch','tg_data_reference.tgrp','tg_data_reference.jenistraf']);
});


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

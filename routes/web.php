<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\DashboardController@loadDashboard')->name('dashboard');

//Route::get('/xmldata', 'App\Http\Controllers\DashboardController@storeXMLReadData')->name('xmldata');

Route::any('/searchUser', 'App\Http\Controllers\DashboardController@show')->name('searchUser');

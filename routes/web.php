<?php

use App\Routing\Route;


Route::add(['get', 'post'], 'test', function () {
    echo "Hello";
});

Route::get('', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('home/create', 'HomeController@create');
Route::get('user/edit/{id}', 'HomeController@edit');
Route::get('user/{id}/comment/{cid}', 'HomeController@comment');

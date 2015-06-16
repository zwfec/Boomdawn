<?php

Route::get('/', function () {
    return '主页';
});

//登录
Route::get('login', 'Home\LoginController@index');
Route::post('login', 'Home\LoginController@store');

//后台
Route::group(['middleware' => 'login', 'prefix' => 'manage','namespace' => 'Manage'], function(){
  Route::controller('link', 'LinkController');
  Route::controller('article', 'ArticleController');
  Route::controller('tag', 'TagController');
  Route::controller('category', 'CategoryController');
  Route::controller('/', 'WelcomeController');
});

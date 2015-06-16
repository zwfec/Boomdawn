<?php

//后台
Route::group(['middleware' => 'login', 'prefix' => 'manage','namespace' => 'Manage'], function(){
  Route::controller('about', 'AboutController');
  Route::controller('set', 'SetController');
  Route::controller('link', 'LinkController');
  Route::controller('article', 'ArticleController');
  Route::controller('tag', 'TagController');
  Route::controller('category', 'CategoryController');
  Route::controller('/', 'WelcomeController');
});

//前台
Route::group(['middleware' => 'getset','namespace' => 'Home'], function(){
  Route::controller('login', 'LoginController');
  Route::controller('/', 'HomeController');
});

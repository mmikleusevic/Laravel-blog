<?php

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/roles/admin','RoleController@adminShow');
Route::get('/roles/user','RoleController@userShow');
Route::post('/roles/admin','RoleController@store');

Route::get('/', 'PostsController@index');
Route::get('/posts', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/posts/tags/{tag}','TagsController@index');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Route::get('/login','SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout','SessionsController@destroy');
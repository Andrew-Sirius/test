<?php

Route::group(['middleware' => 'guest'], function() {
    Route::get('/', function() {return view('welcome');});
    Route::get('/news', ['uses' => 'NewsController@index']);
    Route::get('/news/add', ['uses' => 'NewsController@create']);
    Route::post('/news/save', ['uses' => 'NewsController@store', 'before' => 'csrf']);
    Route::get('/news/delete/{id}', ['uses' => 'NewsController@destroy']);
    Route::get('/comment/add/{new_id}', ['uses' => 'CommentsController@create']);
    Route::post('/comment/save', ['uses' => 'CommentsController@store']);
    Route::get('/comment/delete/{id}', ['uses' => 'CommentsController@destroy']);
});

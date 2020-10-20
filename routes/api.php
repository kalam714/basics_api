<?php


Route::ApiResource('/class','App\Http\Controllers\SclasseController');
Route::ApiResource('/subject','App\Http\Controllers\SubjectController');
Route::ApiResource('/section','App\Http\Controllers\SectionController');
Route::ApiResource('/student','App\Http\Controllers\StudentController');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
});


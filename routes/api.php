<?php

use Illuminate\Support\Facades\Route;

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


/*
|--------------------------------------------------------------------------
| Get Popular Movies API Route
|--------------------------------------------------------------------------
|
| This route will fetch the popular movies.
|
*/
Route::get('discover/movie/popular/{page}', 'APIControllers\MovieAPIController@getPopularMovies');


/*
|--------------------------------------------------------------------------
| Get Single Movie API Route
|--------------------------------------------------------------------------
|
| This route will fetch a single movie using an id.
|
*/
Route::get('movie/{id}', 'APIControllers\MovieAPIController@getSingleMovie');
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/


/*
|--------------------------------------------------------------------------
| Guest Web Routes
|--------------------------------------------------------------------------
|
| Thess routes will accepet all get requests from the client's browser. It
| will allow users to put any path or url and recieve a success status (200). The
| clients system will validate these routes. This is very useful for SPA (Single Page Application) Libraries
| or framework like vue.js. 
|
*/
Route::get('{path?}', [
        'uses' => 'GuestController', 
        'as' => 'guest', 
        'where' => ['path' => '.*']
]);
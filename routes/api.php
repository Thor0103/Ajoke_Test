<?php

use Illuminate\Http\Request;
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

Route::get('joke','App\\Http\\Controllers\\JokeController@getJoke')->name('joke.getJoke');
Route::post('jokeVote/{id}','App\\Http\\Controllers\\JokeController@voteFun')->name('jokeVote.voteFun');
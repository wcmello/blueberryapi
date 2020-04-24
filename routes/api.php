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

Route::group(['prefix' => '{database}'], function () {
	Route::prefix('feed')->group(function () {
		//This Route returns a specific amount of kills by 'desc or asc'
		//@kills
		Route::get('{amount}/{order}', 'FeedController@showAmount');
		//This Route returns the 10 most recent kills
		//@kills
		Route::get('recent', 'FeedController@showRecent');
	});
	Route::prefix('economics')->group(function () {
		//This Route returns the top 10 players based on economics
		//@top
		Route::get('top', 'EconomicsController@showTop');
		//This Route returns a specific amount of leaderboard of economics
		//@top{amount}
		Route::get('top/{amount}', 'EconomicsController@showAmount');
	});
	Route::prefix('player')->group(function () {
		//This Route returns the players stats
		//@Name @Kills @Balance 
		Route::get('{player}/stats', 'PlayerController@showStats');
		//This Route returns the players total kills
		//@kills
		Route::get('{player}/kills', 'PlayerController@showKillcount');
		//This Route returns the players killfeed
		//@feed
		Route::get('{player}/killfeed', 'PlayerController@showKillfeed');
		//This Route returns the players balance
		//@balance
		Route::get('{player}/balance', 'PlayerController@showBalance');
	});
});
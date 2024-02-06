<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tweet', [App\Http\Controllers\TweetController::class, 'index'])->name('route_tweet');
Route::get('/tweet/create', [App\Http\Controllers\TweetController::class, 'create'])->name('route_tweet_create')->middleware('auth');
Route::post('/tweet', [App\Http\Controllers\TweetController::class, 'store'])->middleware('auth');
Route::post('/tweet/save', [App\Http\Controllers\TweetController::class, 'store'])->name('tweet_save');
Route::delete('/tweet/{id}', [App\Http\Controllers\TweetController::class, 'destroy'])->name('tweet_destroy');
Route::get('/tweet/{id}/edit', [App\Http\Controllers\TweetController::class, 'edit'])->name('tweet_edit');
Route::put('/tweet/update/{id}', [App\Http\Controllers\TweetController::class, 'update'])->name('tweet_update');
Route::get('/tweet/search', [App\Http\Controllers\TweetController::class, 'index'])->name('tweet_search');

Route::get('/tweet/mypage/{id}', [App\Http\Controllers\UserController::class, 'mypage'])->name('tweet_mypage');



Route::get('/map', [App\Http\Controllers\MasterRegionController::class, 'index'])->name('route_map');
Route::get('/map/{region_code}', [App\Http\Controllers\MasterRegionController::class, 'show'])->name('region_show');
Route::get('/map/{region_code}/{area_code}', [App\Http\Controllers\MasterPrefectureController::class, 'show'])->name('prefecture_show');
Route::get('/map/{region_code}/{area_code}/{group_code}', [App\Http\Controllers\MasterMunicipalityController::class, 'show'])->name('municipality_show');



//Route::get('/map/{region_code}', [App\Http\Controllers\MasterRegionController::class, 'show_large'])->name('region.show');
//Route::get('/map/{region_code}', [App\Http\Controllers\MasterMunicipalityController::class, 'index'])->name('region.index');


//画面遷移用
//Route::get('/map/{region_code}/{area_code}', [App\Http\Controllers\MasterPrefectureController::class, 'show'])->name('municipalities.show');

//データ表示用
//Route::get('/map/{region_code}/{area_code}', [App\Http\Controllers\MasterMunicipalityController::class, 'index_large'])->name('index_large');


//Route::get('/map/{region_code}/{area_code}', [App\Http\Controllers\MasterPrefectureController::class, 'show'])->name('municipalities.show');

// データ表示用（GETメソッド、index_largeアクション）
//Route::get('/map/data/{region_code}/{area_code}', [App\Http\Controllers\MasterMunicipalityController::class, 'index_large'])->name('index_large');


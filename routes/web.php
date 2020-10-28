<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//commmitの練習
 // Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
     // Route::get('news/create', 'Admin\NewsController@add');
     // Route::post('news/create', 'Admin\NewsController@create');
    //
    // Route::get('profile/create', 'Admin\ProfileController@add'); //PHP/Laravel13課題３
     // Route::get('profile/edit', 'Admin\ProfileController@edit');
     // Route::post('profile/edit', 'Admin\ProfileController@update');//PHP/Laravel13課題6
// });
 

//PHP/Laravel15 Routingを実装する
 Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth'); // 追記
    
    Route::get('news/edit','Admin\NewsController@edit')->middleware('auth');
    Route::post('news/edit','Admin\NewsController@update')->middleware('auth');
    Route::get('news/delete','Admin\NewsController@delete')->middleware('auth');
    
    Route::get('profile/create', 'Admin\ProfileController@add'); //PHP/Laravel13課題３
    Route::post('profile/create', 'Admin\ProfileController@create')->middleware('auth');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');//PHP/Laravel13課題6
    Route::get('profile', 'Admin\ProfileController@index')->middleware('auth'); // 追記
    
    
});

//応用】11章で /admin/profile/create にアクセスしたら ProfileController の add Action に割り当てるように設定しました。 ログインしていない状態で /admin/profile/create にアクセスした場合にログイン画面にリダイレクトされるように設定しましょう。//
//↑と同じ意味
// Route::get('admin/news/create',
// 'Admin\NewController@add');

// 課題3; http://XXXXXX.jp/XXX というアクセスが来たときに、 AAAControllerのbbbというAction に渡すRoutingの設定」を書いてください。
    // Route::get('XXX','AAAController@bbb');


//【応用】 前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加しました。web.phpを編集して、admin/profile/create にアクセスしたら ProfileController の add Action に、admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てるように設定してください。
// Route::group(['prefix' => 'admin'], function(){
//     Route::get('news/create','Admin\NewsController@add');
//     Route::get('profile/edit','ProfileController@edit');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

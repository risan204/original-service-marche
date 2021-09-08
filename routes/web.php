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
//トップページ
Route::get('/', 'ItemsController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    //コントローラー毎に設定要
    Route::resource('items', 'ItemsController');
    Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    //購入履歴、出品履歴
    Route::get('purchase_histories','UsersController@purchase_histories')->name('users.purchase_histories');
    Route::get('listing_histories','UsersController@listing_histories')->name('users.listing_histories');
    
    Route::group(['prefix' => 'items/{id}'], function () {
        //購入フォームの表示
        Route::get('buy','ItemsController@buy')->name('items.buy');
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
        
        //購入処理(items.purchaseのルート)
        Route::post('purchase','ItemsController@purchase')->name('items.purchase');
    });
    
});

//購入後メール送信
Route::get('/mail', 'MailSendController@send');

//検索ボタンを押すとコントローラのindexメソッドを実行します
Route::get('index','ItemsController@index')->name('search');
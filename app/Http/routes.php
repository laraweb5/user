<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::resource('users', 'UsersController');

#メール送信
#Route::get('mail','MailController@index');  // 新規追加
#Route::post('mail','MailController@sendMail');  // getをpostに変更
Route::get('mail', 'MailController@index');
Route::post('mail','MailController@confirm');
Route::post('mail/complete','MailController@complete');


#認証
Route::get('profile', ['middleware' => 'auth.basic', function()
{
    // 認証済みユーザーのみが入れる
	return 'Hello World';
}]);
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

#�᡼������
#Route::get('mail','MailController@index');  // �����ɲ�
#Route::post('mail','MailController@sendMail');  // get��post���ѹ�
Route::get('mail', 'MailController@index');
Route::post('mail','MailController@confirm');
Route::post('mail/complete','MailController@complete');


#ǧ��
Route::get('profile', ['middleware' => 'auth.basic', function()
{
    // ǧ�ںѤߥ桼�����Τߤ������
	return 'Hello World';
}]);
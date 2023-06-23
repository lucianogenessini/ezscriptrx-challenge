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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	/**
	 * author
	 */
	Route::get('author', ['as' => 'author.index', 'uses' => 'AuthorController@index']);
	Route::get('author/create', ['as' => 'author.create', 'uses' => 'AuthorController@create']);
	Route::post('author', ['as' => 'author.store', 'uses' => 'AuthorController@store']);
	Route::get('author/{author}/edit', ['as' => 'author.edit', 'uses' => 'AuthorController@edit']);
	Route::put('author/{author}', ['as' => 'author.update', 'uses' => 'AuthorController@update']);
	Route::delete('author/{author}/destroy', ['as' => 'author.destroy', 'uses' => 'AuthorController@destroy']);

	/**
	 * member
	 */
	Route::get('member', ['as' => 'member.index', 'uses' => 'MemberController@index']);
	Route::get('member/create', ['as' => 'member.create', 'uses' => 'MemberController@create']);
	Route::post('member', ['as' => 'member.store', 'uses' => 'MemberController@store']);
	Route::get('member/{member}/edit', ['as' => 'member.edit', 'uses' => 'MemberController@edit']);
	Route::put('member/{member}', ['as' => 'member.update', 'uses' => 'MemberController@update']);
	Route::delete('member/{member}/destroy', ['as' => 'member.destroy', 'uses' => 'MemberController@destroy']);

	/**
	 * book
	 */
	Route::get('book', ['as' => 'book.index', 'uses' => 'BookController@index']);
	Route::get('book/create', ['as' => 'book.create', 'uses' => 'BookController@create']);
	Route::post('book', ['as' => 'book.store', 'uses' => 'BookController@store']);
	Route::get('book/{book}/edit', ['as' => 'book.edit', 'uses' => 'BookController@edit']);
	Route::put('book/{book}', ['as' => 'book.update', 'uses' => 'BookController@update']);
	Route::delete('book/{book}/destroy', ['as' => 'book.destroy', 'uses' => 'BookController@destroy']);

	/**
	 * BorrowedBook
	 */
	Route::get('borrowed-book', ['as' => 'borrowedBook.index', 'uses' => 'BorrowedBookController@index']);
	Route::get('borrowed-book/create', ['as' => 'borrowedBook.create', 'uses' => 'BorrowedBookController@create']);
	Route::post('borrowed-book', ['as' => 'borrowedBook.store', 'uses' => 'BorrowedBookController@store']);
});


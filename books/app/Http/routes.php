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

//login stuff
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

///show on mypage
Route::get('/mylist','listofbooksController@show');
//delete book
Route::get('delete/{book_name}', ['uses' =>'listofbooksController@delete']);
//change order of book up 
Route::get('change_order/up/{direction}/{book_name}', ['uses' =>'listofbooksController@change_order']);
//change order book down
Route::get('change_order/down/{direction}/{book_name}', ['uses' =>'listofbooksController@change_order']);
//add a book to book database
route::get('/addbook','BookController@show');
//add a book to users list
route::get('add_book/{name}/{author}/{publish_date}',['uses'=>'BookController@add_book']);
if (Auth::check())
{
     $id = Auth::user()->getId();
}

route::get('/book_to_list/{bookname}',['uses'=>'listofbooksController@add_a_book']);
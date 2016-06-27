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

Route::get('/hi{name}', function ($name) {
    echo '<form action="test" method="POST">' ;
    echo '<input type="submit" value="submit">';
    echo '<input type="hidden" name="_token"value="'.csrf_token().'">';
    echo '</form>';
});
Route::get('/book',function(){
	$books = App\Book::all()->sortby('name');
	foreach($books as $book){
		echo '<br/>';
		echo $book->name;
	};

});
//login stuff
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');


Route::get('/mylist','listofbooksController@show');
Route::get('delete/{book_name}', ['uses' =>'listofbooksController@delete']);
Route::get('change_order/up/{direction}/{book_name}', ['uses' =>'listofbooksController@change_order']);
Route::get('change_order/down/{direction}/{book_name}', ['uses' =>'listofbooksController@change_order']);
route::get('/addbook','BookController@show');
route::get('add_book/{name}/{author}/{publish_date}',['uses'=>'BookController@add_book']);
if (Auth::check())
{
     $id = Auth::user()->getId();
}

route::get('/book_to_list/{bookname}',['uses'=>'listofbooksController@add_a_book']);
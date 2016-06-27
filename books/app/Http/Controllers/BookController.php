<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book as Book;
use HTML;
class BookController extends Controller
{

      //  HTML::();
    
    //
    public $timestamps = false;
    public function show(){
    	return view('addbook');
    	/*
    	$books = Book::all()->sortby('name');

	foreach($books as $book){
		$name =(string) ($book->name) ;
		echo 'Title:';
		;
		echo $name; 
		echo '<br/>';
	};
	*/
    }


public function add_book($name, $author,$publish_date){
	 Book::insert(['name' => $name, 'author' => $author,'publish_date'=>$publish_date]);
	 return redirect('/mylist');



}
public function delete_book($book_title,$author){

	Book::where('book_title',$book_title)->where('author',$book_title)->delete();

}



}

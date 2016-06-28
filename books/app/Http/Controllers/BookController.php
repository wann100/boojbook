<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book as Book;
use HTML;
/*
Purpose: Access Bookdatabase;
*/
class BookController extends Controller
{

      //  HTML::();
    
    //disable timestamp because i am using save function;
    public $timestamps = false;
    public function show(){
    	return view('addbook');
    }


/**
    *add_book
    *INPut: $book_name($name:title of book,$author author of book, $publish_date:date published (all strings))
    *Description: Adds a book to books db
    *return :to mypage.php
    **/

public function add_book($name, $author,$publish_date){
	 Book::insert(['name' => $name, 'author' => $author,'publish_date'=>$publish_date]);
	 return redirect('/mylist');



}
 /**
    *delete_book: 
    *INPut: $book_name($book_title:title of book)
    *Description: Deletes book i
    **/
public function delete_book($book_title,$author){

	Book::where('book_title',$book_title)->where('author',$book_title)->delete();

}



}

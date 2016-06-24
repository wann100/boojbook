<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book as Book;
use App\listofbooks as listofbooks;
use Auth;

class listofbooksController extends Controller

{	
	/**
    *Place Description here
    **/
    public function show(){
    	$userid = 1;
	$listofbooks = listofbooks::where('user_id', $userid)->get();
	$hi = 
    	//create empty array
		$data = array();
		$bookname = array();
		//check if user has a list of books
    	if (!empty($listofbooks)){
    	//loop and find all book titles;
    	foreach ($listofbooks as $book){
    		 $book_name =$book->book_title;
    		 $thebook = Book::where('name',$book_name)->get();
    		 $keyindex = 0;
    		 //loop again to return list of all booknames;
    		 foreach($thebook as $book){
    		 //	echo $book->name;
    		 	$keyindex++;
    		 	// $data = array('book_name'=>$book->name );
    			$data[] ='Title:' . $book->name .','.'Author:'.$book->author;
    			$bookname[] = $book->name;
    			
    		 }
    		 

    	}
    	///print_r( $data);

    	return view('mypage',array('book_name'=>$data),array('book_title'=>$bookname));
    }
    if(empty($listofbooks)){
    	return view('mypage');
    }

    	

    }
    /**
    *Place Description here
    **/

    public function delete($book_name){

    	listofbooks::where('user_id',1)->where('book_title',$book_name)->delete();
    	$redirectval =  $var = $this->show();
    	return $redirectval;

    }
    /**
    *Place Description here
    **/

    public function add_a_book($bookname){
        $id = 1;
    if (Auth::check())
    {
     $id = Auth::user()->getId();
    }
    $count = listofbooks::count();
    listofbooks::insert(
    ['list_order' => $count, 'book_title' => $bookname,'user_id'=>$id]);


    }
  
}


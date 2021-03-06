<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book as Book;
use App\listofbooks as listofbooks;
use Auth;
/**
*Purpose: Functions used in my page and routes in order to display or get data
*
**/

class listofbooksController extends Controller

{	
	/**
    *Show()
    *returns a  view with data from booklist to be displayed
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
              $bookorder[]  = $book->list_order;

    		 $thebook = Book::where('name',$book_name)->get();
    		 $keyindex = 0;
    		 //loop again to return list of all booknames;
    		 foreach($thebook as $books){
    		 //	echo $book->name;
    		 	$keyindex++;
                $data[] ='<a href="delete/'.$books->name.'" class="sign">Delete</a>'.$books->name.'<a href ="change_order/up/0/'.$book->list_order.'"class ="btn" > Move up </a> <a href ="change_order/down/1/'.$book->list_order.'" class ="btn" > Move Down </a><br/>';

    			$bookname[] = $books->name;
                   			
    		 }
    		 

    	}

    	return view('mypage',array('book_data'=>$data));
    }
    if(empty($listofbooks)){
    	return view('mypage');
    }

    	

    }
    /**
    *Delete: 
    *INPut: $book_name( string of the book_name)
    *Description: Deletes booklist row with users information
    **/

    public function delete($book_name){
         $id = 1;

         if (Auth::check())
    {
     $id = Auth::user()->getId();
    }


    	listofbooks::where('user_id',$id)->where('book_title',$book_name)->delete();
    	$redirectval =  $var = $this->show();
    	return $redirectval;

    }
    /**
    *add_a_book
    *INPut: $book_name( string of the book_name)
    *Description: Adds a book to listofbooks db
    **/

    public function add_a_book($bookname){
        $id = 1;
           if (Auth::check())
    {
     $id = Auth::user()->getId();
    }
    $count =count( listofbooks::where('user_id',$id));
    listofbooks::insert(
    ['list_order' => $count+1, 'book_title' => $bookname,'user_id'=>$id]);


    }
    /**
    * Change Order: changes order of book in list
    *input:($id: order of where you are , $direction: Wether to move up or dwn(direction: 1=down 0 = up)
    * Description: shifts this listbook up or down users list.
    * input : bookname and
    * thinking about using insertion sort. so from the 
    * $connector->query("UPDATE `TopTips` SET `order` = `order` - 1 WHERE `id` = " . $_GET['lastid']);
    * $connector->query("UPDATE `TopTips` SET `order` = `order` + 1 WHERE `id` = " . $_GET['id']); }else if ( $_GET['move'] == "down")
    {  $connector->query("UPDATE `TopTips` SET `order` = `order` + 1 WHERE `order` = " . $_GET['nextid']);  $connector->query("UPDATE `TopTips` SET `order` = `order` - 1 WHERE `id` = " . $_GET['id']);
    **/

    public function change_order($id,$direction){
        $temp_list = Listofbooks::where('list_order',$id)->get();
        $order ='';
         $id = 1;
         foreach($temp_list as $list){
            echo $list->list_order;
            if($list->list_order == $id){
                $order= $list;
            }
        }
        echo $order;
        if(!is_null($order)){
        $prev_order = listofbooks::where('list_order','<',$order)->max('list_order');
        $next_order = listofbooks::where('list_order','>',$order)->min('list_order');
    }
   //check if logged in
    if (Auth::check())
    {
     $id = Auth::user()->getId();
    }
//down
if( $direction== 1){
        //echo $prev_order;
      // $prev_order=-1;
        listofbooks::where('list_order',$prev_order)->update(['list_order'=>$prev_order--]);
        $neworder = $order->list_order +1 ;

       $order->list_order= $neworder;
      $order->save();
      //echo $order->list_order;
}
//up
if($direction == 0){
            echo 'before'. $order->list_order;

      listofbooks::where('list_order',$next_order)->update(['list_order'=>$next_order++]);
        $neworder = $order->list_order -1 ;
        $order->list_order = $neworder ;
      $order->save();
}
}


}


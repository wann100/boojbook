<!DOCTYPE html>
<html>
<head>
	<title>mypage</title>

</head>
<body>
<h1> My list of books </h1>
<!-- RETURNING EACH NAME OF BOOKHERE !-->

<?php
	
		//foreach($book_name as $name){
		///looop through and get book titles and print them out
			foreach($book_title as $title){
			echo '<a href="delete/'.$title.'" class="sign">Delete</a>'
                 .$title ;
            foreach($list_orders as $order){

            echo '<a href ="change_order/up/0/'.$order.'"class ="btn" > Move up </a>';

            echo '<a href ="change_order/down/1/'.$order.'" class ="btn" > Move Down </a>';
            echo '<br/> ';}
        }

		

	?>
	</body>

</html>
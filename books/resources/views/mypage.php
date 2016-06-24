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
                 .$title . '<br/>';
		}

	?>
	</body>

</html>
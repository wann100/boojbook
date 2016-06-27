<!DOCTYPE html>
<html>
<head>
	<title>mypage</title>

</head>
<body>
<h1> My list of books </h1>
<!-- RETURNING EACH NAME OF BOOKHERE !-->

<?php
	//loop through data in order to display each;
				foreach($book_data as $data){
             echo $data;

		}

	?>
	</body>

</html>
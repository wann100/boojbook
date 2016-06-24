<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<h1> My list of books </h1>
	<?php
	foreach ($book_list as $book):?>
		<p> <?= $book->name; ?> </body> </p>
	}
	<?php endforeach?>
</body>
</html>
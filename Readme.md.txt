Dev Notes(until i get front end running the way i want)
Functionality available:

Book Functions:
show:
	-shows information about the book;
	-Route URL: /book_to_list/Abook

Add a book
	Description: Adds a book to database
	-Route URL:add_book/{name}/{author}/{publish_date}

add a book  to booklist
	Description-Adds a book to users booklist;
	-Route: url type /book_to_list/{title of book}{make sure that book already exists with title)
			Validation Note: gotta make sure to check if book already exists
remove book from booklist:
	Description: Remove a book from users booklist
        Route: None -Just click delete on /mylist page;
remove book
	Description: Remove book from book database
	-Route: no route yet but control is built in bookcontrooler

Auth functions:

register User
	-go to url /register
Login as user
	-login from first page

Missing functions:
Book functions:

Sort by author: sort button that shows book by author
changeorder: change order of books displayed (up and down buttons to move book up)(simple query to listofbooks and update order -1 or +1 depending on what the user presses)


	

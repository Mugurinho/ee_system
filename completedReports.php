<?php 
session_start();
if (isset($_SESSION['type'])){
if ($_SESSION['type']=="student"){
if (isset($_SESSION['user_id']))
{
	if($_SESSION['user_id']==true)
	{
?>
		<!doctype html>
		<html>
			<head>
				<meta charset="UTF-8">
				<title>Books Info for users</title>
				<link rel="stylesheet" href="../css/style1.css">
			</head>	
		<body>
		<header>REMUS UNY LIBRARY</header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="UbookInfo.php">List all Books</a></li>
                <li><a href="user_page.php">Search books</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="reservation.php">Reserved books</a></li>
                <li><a href="rating.php">Rate books</a></li>
                <li><a href="http://stuweb.cms.gre.ac.uk/~ro4323m/moodle/login/index.php" target="_blank">Website</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
			<span>logged in as: <?php echo $_SESSION["user_id"]; ?> <a href="logout.php"> logout </a></span>		 
		</nav>
		<section>
			<article>
			<h1 align="center">Books Info</h1>
		<table border="1">
		<th>No</th>
		<th>Cover</th>
		<th>ISBN</th>
		<th>Subject</th>
		<th>Title</th>
		<th>Author First Name</th>
		<th>Author Last Name</th>
		<th>Edition</th>
		<th>No of Books</th>
		<th>No of available books</th>
		<th>Rating</th>
		<th>Read</th>
		<th>Reserve</th>

<?php 
		require "db.php";
		$sql = mysqli_query($con, "select *, AVG(rating) from books inner join covers on books.ISBN = covers.ISBN inner join author_table on books.ISBN = author_table.ISBN inner join a_subject on books.ISBN = a_subject.ISBN inner join a_rating on books.ISBN = a_rating.ISBN group by books.ISBN");
		$no=1;
		while ($data = mysqli_fetch_array($sql))
		{
			?>
			<tr>
			<td><?php echo $no++ ?></td>
			<td><img src="<?php echo $data['file'] ?>" height="75" width="75"></td>
			<td><?php echo $data['ISBN'] ?></td>
			<td><?php echo $data['subject'] ?></td>
			<td><?php echo $data['book_title'] ?></td>
			<td><?php echo $data['author_firstName'] ?></td>
			<td><?php echo $data['author_lastName'] ?></td>
			<td><?php echo $data['edition'] ?></td>
			<td><?php echo $data['no_of_books'] ?></td>
			<td><?php echo $data['no_of_available_books'] ?></td>
			<td><?php echo $data['AVG(rating)'] ?></td>
			<td><a href="view.php?ISBN=<?php echo $data['ISBN'] ?>">Read</a></td>
			<td><a href="bookReservation.php?ISBN=<?php echo $data['ISBN'] ?>">Reserve</a></td>
			</tr>
			<?php
		}	
		?>
		</table>
			</article>
		</section>
		<footer>&copy Remus Orha &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../help.html">Help</a></footer>
		</body>
		</html>
<?php 
	} 
}
else {echo "You need to login first to see this page";}
}
else {echo "You need to login as student to access this page";}
}
else {echo "You need to login first to access this page";}
?>
<?php
require_once 'appConfigEE.php'; //required constants once
$conn = mysqli_connect($dbhost, $user, $password, $dbname);
//echo "You are connected to the database"; 
//database connection as localhost
if (!$conn){ 
	echo "You are not connected to the database"; 
	die("Database connection failed: " . mysqli_connect_error()); 
}
//database selection 
$db_select = mysqli_select_db($conn, "portal");
if (!$db_select){
	//echo "You're db name is wrong!";
   	die("Database selection failed: " . mysqli_error($conn));
}
//else echo "</br>Your db name is: " . $dbname;
?>
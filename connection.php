<?php
$servername = "mysql.cms.gre.ac.uk";
$username = "ka429";
$password = "careff7F";
$dbname = "mdb_ka429";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die("error connecting to database!");

if($conn == true){

	//echo "Connected";
}

?>
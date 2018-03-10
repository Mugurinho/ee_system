<?php
ob_start();
session_start();
include_once 'dbconnEE.php';
if(isset($_SESSION['User_Name'])){
		$user = $_SESSION['User_Name'];
}
if(!isset($_SESSION['User_Name'])){
		header("Location: indexEE.php");
		return;
		echo $_SESSION['User_Name'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html>
	<head>
		<title>Admin page</title>
<!-- Meta for resizing the site to device width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<img src="greenwich.png" alt="logo" height="80" width="160">
		<nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Admin home</a>
            </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                     <li>
                       <li class="active"><a href="admin.php">Home</a></li>
							<li><a href="registerEE.php">Register user</a></li>
							<li><a href="showUsers.php">Show users</a></li>
							<li><a href="addPrograms.php">Edit/Update programme</a></li>
							<li><a href="personalDetailsEE.php">Edit details</a></li>
							<li><a href="cReports.php">Completed reports</a></li>
							<li><a href="updatePass.php">Update password</a></li>
							<li><a href="logout.php">Log out</a></li>
							</ul>
			</div>
       </div>
	</div>
</nav>
<div class="container">
<h5><b>Welcome, <?php echo $_SESSION ['User_Name'];?></b></h5>
<h5>Hello administrator, here you can <a href="registerEE.php">add new users</a>
or choose from the menu above.</h5>
</div>
</div>
</div>
</body>
</html>
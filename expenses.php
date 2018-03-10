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
  <title>expenses</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<!-- tracking code for google analytics -->
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
                <a class="navbar-brand" href="welcomeEE.php">EE home</a>
            </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
			<li><a href="editEE.php">View/Update profile</a></li>
			<li><a href="updatePassEE.php">Update password</a></li>
			<li><a href="cReportsEE.php">Reports</a></li>
			<li><a href="expenses.php">Upload expense form</a></li>
			<li><a href="logout.php">Log out</a></li>
		</ul>
	</div>
	</div>
</nav>
<h5><b>Welcome, <?php echo $_SESSION ['User_Name'];?></b></h5><br>
<div class="container-fluid">
	<div class="row">
	<div class="col-md-6">
<h4>Expenses</h4>
<hr>
<form id="uploadForm" action = "" class="form-horizontal" method="POST">			
<h4>Here you can upload your expenses file.</h4>
<input type="file" name="file" class="form-control"><br>
		<input type="submit" value="Upload" class="btn btn-default" name="upload"><br><br>
</div><br>
</form> 

</div> 
</div>
</div>
</body>
</html>
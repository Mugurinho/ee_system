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
<!-- 
References :
C1: https://silktide.com/tools/cookie-consent/
1: http://99webtools.com/blog/php-simple-captcha-script/
2: http://sourceforge.net/projects/nbbc/
3: http://jackktutorials.com/
4: http://www.w3schools.com/php/
5: http://www.w3schools.com/js/js_cookies.asp-->
<html>
 <head>
  <title>Update password</title>
  
<!--
 <style type="text/css">
 body { width:500px margin: 0 auto; }
 .contentdiv { width:60%; margin:0 auto;  background:#C2C7C8; }
 </style>
-->

<!-- Meta for resizing the site to device width -->
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
                <a class="navbar-brand" href="PLpage.php">Programme Leader home </a>
            </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                <li><a href="personalDetailsPL.php">Edit details</a></li>
				<li class="active"><a href="updatePassPL.php">Update password</a></li>
				<li><a href="logout.php">Log out</a></li>	
			</ul>
       </div>
	</div>
</nav>
<h5><b>Welcome, <?php echo $_SESSION ['User_Name'];?></b></h5>
 <div class="container-fluid">
	<div class="row">
	<div class="col-md-6">
		<h4>Update password</h4>
		<form id="" class="form-horizontal" method="POST">
		  Old password: <input type="password" maxlength="16" class="form-control" name="oldpassword"><br>
		  New password: <input type="password" maxlength="16" class="form-control" name="newpassword"><br>
		  <input type="submit" class="btn btn-default" name="update" value="Update"><br>
		  
<?php
include 'dbconnEE.php';
if (isset($_POST['update'])){
$oldpassword = md5($_POST['oldpassword']);
$newpassword = md5($_POST['newpassword']);
$check_pass = "SELECT * from User WHERE Password = '$oldpassword'";
$run = mysqli_query($conn, $check_pass);
if(mysqli_num_rows($run) <= 0){
echo "Password not match, try again!";
exit();
}
else{
$user = $_SESSION['User_Name'];//query for user 2 
	$list = mysqli_query($conn, "select * from User where User_Name = '$user'");
	while($setAdmin = mysqli_fetch_array($list)){
	$user = $setAdmin['User_ID']; //this code displays the admin ID
	}
$sql = mysqli_query($conn, "UPDATE User SET Password = '$newpassword' WHERE User_ID = $user")or die (mysql_error());
echo "Your password has been changed!";
}
}
?>

</form> 
</div>
</div>
</div>
</div>
</body>
</html>
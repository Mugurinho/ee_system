<?php
ob_start();
session_start();
include 'dbconnEE.php';
?>
<?php
//script for denying access to certain ip addresses

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
  <title> Welcome ee</title>
  
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
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="indexEE.php">EE Report system</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                     <li>
                        <a href="indexEE.php">Home</a>
                    </li>
                    </ul>
                </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



	<div class="container-fluid">
	<div class="row">
	<div class="col-md-6">
		<h4>Please login</h4>
		<form id="contactForm" class="form-horizontal" method="POST">
		  Username: <input type="text" class="form-control" maxlength="16" name="user" id="user"><br>
		  Password: <input type="password" maxlength="16" class="form-control" name="pass"><br>
		  <input type="submit" class="btn btn-default" name="submit" value="Login"><br><br>
<?php
if(isset($_POST["submit"])){
 
if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$pass= md5($_POST['pass']);
	$query="SELECT * FROM User WHERE User_Name='".$user."' AND Password='".$pass."'";
	$result = mysqli_query($conn,$query);
	$numrows= mysqli_num_rows($result);
	if($numrows!=0){
	while($row=mysqli_fetch_assoc($result)){
	$dbuserID=$row['User_ID'];
	$dbusername=$row['User_Name'];
	$dbpassword=$row['Password'];
	$dbemail=$row['Email'];
	$type=$row['Staff_Type'];
	}
	if($user == $dbusername && $pass == $dbpassword){
		$_SESSION['id_session']=$dbuserID;
		if($type == 'ADMIN'){
			$_SESSION['User_Name']=$user;
			$_SESSION['sess_userID']=$dbuserID;
			header("Location:admin.php");
		}
		else if($type == 'EE'){
			$_SESSION['User_Name']=$user;
			$_SESSION['sess_userID']=$dbuserID;
			header("Location:welcomeEE.php");
		}else if($type == 'PVC'){			
			$_SESSION['User_Name']=$user;			
			$_SESSION['sess_userID']=$dbuserID;			
			header("Location:PVCpage.php");			
		}else if($type == 'DLT'){
			$_SESSION['User_Name']=$user;
			$_SESSION['sess_userID']=$dbuserID;
			header("Location:DLTpage.php");	
		}else if($type == 'PL'){
			$_SESSION['User_Name']=$user;
			$_SESSION['sess_userID']=$dbuserID;
			header("Location:PLpage.php");
		}else if ($type == 'Guest'){
			$_SESSION['User_Name']=$user;
			$_SESSION['sess_userID']=$dbuserID;
			header("Location:Gpage.php");
		}
	}
}
}
	echo "Invalid username or password!";
}
?>
</form> 
<a href="forgot.php">Forgot password</a>
<h4>UoG</h4>
</div>
</div>
</div>
</div>
</body>
</html>
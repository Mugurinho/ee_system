
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
  <title> forgot password</title>
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
		<h4>Please insert your email address</h4>
		<form id="contactForm" class="form-horizontal" method="POST">
		  Email:
		  <input type="email" class="form-control" maxlength="30" name="email" id="user" required><br>
		  <input type="submit" class="btn btn-default" name="submit" value="Submit"><br>
		  <b><?php if(isset($_GET['noemail'])){echo $_GET['noemail']; }?></b>
		  <b><?php if(isset($_GET['goodemail'])){echo $_GET['goodemail']; }?></b>
<?php 
include 'dbconnEE.php';
if (isset($_POST['submit'])){
$email = $_POST['email'];
//check email
$check_email = "SELECT * from User WHERE Email = '$email'";
$run = mysqli_query($conn, $check_email);
if(mysqli_num_rows($run) <= 0){
echo "Email not found, please try again!";
exit();
}
else{
//carry on
$query = mysqli_query($conn, "SELECT User_Name FROM User WHERE Email = '$email' ")or die (mysqli_error());
$result = mysqli_fetch_array($query);
$username = $result['User_Name'];//show username in email
$password = rand(111111, 999999); 
$pass = md5($password); //encrypted for database
$sql = mysqli_query($conn, "UPDATE User SET Password='$pass' WHERE Email = '$email'")or die (mysql_error());
mail($email,'Hi ' . $username ,' Your password has been reset '.'Your new password is: ' . $password);				
echo "Your password has been reset, please check your email!";
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
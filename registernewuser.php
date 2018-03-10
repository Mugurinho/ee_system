<?php
session_start();
if(!isset($_SESSION['sess_user'])){
		header("Location: index1.php");
		return;
		echo $_SESSION['sess_user'];
	}else{
		if(isset($_SESSION['verified'])){
		if($_SESSION['verified'] == '0'){
			header("Location: verify.php");
		}
		}else{
	echo "<script>
	var d = new Date();
    d.setTime(d.getTime() + (1*24*60*60*1000));
			document.cookie='username2=" .$_SESSION['sess_user']."';
		</script>";
		}
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
5: http://www.w3schools.com/js/js_cookies.asp

-->
<html>
 <head>
  <title> External examiner welcome page </title>
  
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

 </head>

 <body>

<div class="container">
<img src="logo/logo.png" alt="logo" height="60" width="100">
<nav class="navbar navbar-default">
	<div class="container-fluid">
	<!-- Logo -->
	<div class="navbar-header">
		<a href="admin.php" class="navbar-brand">External Examiner Reporting System</a>
	</div>

	<!-- Menu items go here -->
	<div>
		<ul class="nav navbar-nav">
			<li><a href="admin.php">Admin Home</a></li>
			<li class="active"><a href="registernewuser.php">Register new user</a></li>
			<li><a href="#">Show users</a></li>
			<li><a href="#">Edit/Update programmes</a></li>
			<li><a href="#">Edit my details</a></li>
			<li><a href="#">Log out</a></li>
		</ul>
	</div>
	</div>
</nav>
 <div class="container-fluid">
 <div class="row">
 <div class="col-lg-12">
<h3>Welcome, Admin!</h3>
<br>
<br>
<div class="col-md-8">
<form role="form">
    <div class="form-group">
      <label for="firstname" class="col-md-2">
        First Name:
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="firstname" placeholder="Enter First Name">
      </div>
 
 
    </div>
 <br><br>
    <div class="form-group">
      <label for="lastname" class="col-md-2">
        Last Name:
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name">
      </div>
 
 
    </div>
 <br><br>
    <div class="form-group">
      <label for="emailaddress" class="col-md-2">
        Email address:
      </label>
      <div class="col-md-10">
        <input type="email" class="form-control" name="emailaddress" placeholder="Enter email address">
        <p class="help-block">
          Example: yourname@domain.com
        </p>
      </div>
 
 
    </div>
 <br><br>
    <div class="form-group">
      <label for="password" class="col-md-2">
        Password:
      </label>
      <div class="col-md-10">
        <input type="password" class="form-control" name="password" placeholder="Enter Password">
        <p class="help-block">
          Min: 6 characters (Alphanumeric only)
        </p>
      </div>
 
 
    </div>
 <br><br>
    <div class="form-group">
      <label for="dob" class="col-md-2">
        DOB:
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="dob" placeholder="Enter your DOB (dd:mm:yy)">
      </div>
 
 <br> <br><br>
    </div>
	
 
    <div class="form-group">
      <label for="Faculty" class="col-md-2">
        Faculty:
      </label>
      <div class="col-md-10">
        <select name="facultyList" name="facultyList" class="form-control">
          <option>--Please Select--</option>
          <option>bla</option>
          <option>bla</option>
          <option>Others</option>
        </select>
      </div>
 
    </div>
 <br><br>


    <div class="form-group">
     
		<label for="Awards" class="col-md-2">
        Award:
      </label>
      
		<div class="col-md-10">
        
		<select name="awardList" name="awardList" class="form-control">
          
			<option>--Please Select--</option>

          
				<option>bla</option>
          
				<option>bla</option>
          
				<option>Others</option>
       
		</select>
      
		</div>
 
    
	</div>
 <br><br>

 
	
	<div class="form-group">
      
		<label for="startdate" class="col-md-2">
        Start date:
      </label>
      
		<div class="col-md-10">
        
		<input type="text" class="form-control" name="startdate" placeholder="Enter start date">
      
		</div>
 
 <br> <br>
   
	</div>

	
	
	<div class="form-group">
     
		<label for="enddate" class="col-md-2">
        End date:
      </label>
      
			<div class="col-md-10">
        
				<input type="text" class="form-control" name="enddate" placeholder="Enter end date">
      
			</div>
 
 <br> <br><br>
    
	</div>
 
 

    <div class="checkbox">
      <div class="col-md-2">
      </div>
      <div class="col-md-10">
        <label>
          <input type="checkbox">I aggree that all the information provided on this form is correct.</label>
      </div>
 
 
    </div>
 <br><br>
    <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-10">
        <button type="submit" class="btn btn-info">
          Register
        </button>
      </div>
    </div>

	<?php
		//php
	include 'dbconnEE.php';

	if(isset($_POST["submit1"])){
		if(isset($_POST['awards'])){
			$fn=strip_tags($_POST['firstname']);
			$sn=strip_tags($_POST['surname']);

			$email=strip_tags($_POST['email']);
			$pass=strip_tags($_POST['password']);
			$pass=md5($_POST['password']);
			
			

			$awards=strip_tags($_POST['awards']);
			$faculty=strip_tags($_POST['faculty']);
			$academic=strip_tags($_POST['academic']);
			
			
			$query1="SELECT * FROM User WHERE User_Name='".$user."'";
			$result1 = mysqli_query($conn,$query1);
			if(mysqli_num_rows($result1)!=0)
			{
				echo "Username already taken!";
			}
			else{
				
				$query = "INSERT INTO User (First_Name, Sur_Name, User_Name, Password, Email, Title, Awards, Academic, Faculty, Staff_Type) VALUES ('$fn','$sn','$user', '$pass', '$email','$title','$awards','$academic','$faculty','$type');";
				if(mysqli_query($conn, $query)){
					echo "Registration successful!";
					header( "refresh:3;url=indexEE.php" );
				
				
					
					die;					
					}
		}
	}else{
		
		$title=($_POST['title']);
			$type=strip_tags($_POST['type']);
			
			$academic=strip_tags($_POST['academic']);
			$fn=strip_tags($_POST['firstname']);
			$sn=strip_tags($_POST['surname']);
			$pass=strip_tags($_POST['password']);
			$pass=md5($_POST['password']);
			$user=strip_tags($_POST['username']);
			$email=strip_tags($_POST['email']);
			$query1="SELECT * FROM User WHERE User_Name='".$user."'";
			$result1 = mysqli_query($conn,$query1);
			if(mysqli_num_rows($result1)!=0)
			{
				echo "Username already taken!";
			}
			else{
				
				$query = "INSERT INTO User (First_Name, Sur_Name, User_Name, Password, Email, Title, Academic, Staff_Type) VALUES ('$fn','$sn','$user', '$pass', '$email','$title','$academic','$type');";
				if(mysqli_query($conn, $query)){
					echo "Registration successful!";
					header( "refresh:3;url=indexEE.php" );
				
				
					
					die;					
					}}
	
	}
}

	
	

	?>

  </form>
  
 </div>
</div>
</div>
</div>
</div>
</body>
</html>
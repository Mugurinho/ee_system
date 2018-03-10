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
<!DOCTYPE html>
<html>
 <head>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
<title>update details</title>
<!-- Meta for resizing the site to device width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
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
<h5><b>Welcome, <?php echo $_SESSION ['User_Name'];?></b></h5>
 <div class="container-fluid">
	<div class="row">
	<div class="col-md-6">
		<h4>Update profile details here</h4>
		<form class="form-horizontal" action="" method="POST">
<?php
include 'dbconnEE.php';
$user = $_SESSION['User_Name'];
	$check = "SELECT * FROM User WHERE User_Name = '$user'";
	$sql = mysqli_query($conn, $check);
	while($row = mysqli_fetch_array($sql)){	
				$id = $row['User_ID'];
	            $fn = $row["First_Name"];
	            $sn = $row["Sur_Name"];
	            $email = $row["Email"];
				$address = $row["Address"];
				$county = $row["County"];
				$country = $row["Country"];
				$phone = $row["Phone_Number"];

				?>
		  Firstname <input type="text" maxlength="30" class="form-control" name="fn" value="<?php echo $fn?>"><br>
		  Surname <input type="text" maxlength="30" class="form-control" name="sn" value="<?php echo $sn?>"><br>
		  Address <input type="text" maxlength="30" class="form-control" name="address" value="<?php echo $address?>"><br>
	      County <input type="text" maxlength="30" class="form-control" name="county" value="<?php echo $county?>"><br>
		  Country <input type="text" maxlength="30" class="form-control" name="country" value="<?php echo $country?>"><br>
		  Email <input type="email" maxlength="30" class="form-control" name="email" value="<?php echo $email?>"><br>
		  Phone <input type="text" maxlength="30" class="form-control" name="phone" value="<?php echo $phone?>"><br>
		  <input type="submit" name="Submit" class="btn btn-default" value="Update"><br>
<?php
//testing purposesecho $id.", ".$fn." ".$sn.", ".$email;
	if(isset($_POST['Submit'])){
		$fn = mysqli_real_escape_string($conn,$_POST['fn']);
		$sn = mysqli_real_escape_string($conn,$_POST['sn']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$address = mysqli_real_escape_string($conn,$_POST['address']);
		$county = mysqli_real_escape_string($conn,$_POST['county']);
		$country = mysqli_real_escape_string($conn,$_POST['country']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);
		$update="UPDATE User SET First_Name = '$fn', Sur_Name = '$sn', Email = '$email', Address = '$address', County = '$county', Country = '$country', Phone_Number = '$phone' WHERE User_Name='$user'"; 
         if( mysqli_query ($conn, $update)){
			  echo "<br>Your details have been updated";  
		  } else{
			  echo "Details not updated yet";  
		  }		
	}
	}
?>
</form> 
<br>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
ob_start();
session_start();
include_once 'dbconnEE.php';
if(isset($_SESSION['User_Name'])){
		$admin = $_SESSION['User_Name'];
}
//if no existing session, user logged out
if(!isset($_SESSION['User_Name'])){
		header("Location: indexEE.php");
		return;
		echo $_SESSION['User_Name'];
	}
?>
<!DOCTYPE html>
<html>
 <head>
  <title> Section 2 </title>
 
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
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="welcomeEE.php">EE home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
						<li><a href="editEE.php">View/Update profile</a></li>
						<li><a href="updatePassEE.php">Update password</a></li>
						<li><a href="expenses.php">Upload expense form</a></li>
						<li><a href="logout.php">Log out</a></li>
					</ul>
                </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<h5><b>Welcome, <?php echo $_SESSION ['User_Name'];?></b></h5>
<h5><b>YEAR: <?php echo $_SESSION ['year'];?></b></h5>

 <div class="container-fluid">
 <div class="row">
 <div class="col-sm-6">
 <h4>Section 2</h4>
   <form name="regForm" method="POST">
  <p></p>
  <div class="form-group">
  <label for="comment">Additional commentary:</label>
  <textarea class="form-control" rows="5" name="comment"></textarea>
</div>
  <p></p>
  <label>Choose again one of this:</label> 
<label class="radio-inline"><input type="radio" name="optradio" value="Option 1">Option 1</label>
<label class="radio-inline"><input type="radio" name="optradio" value="Option 2">Option 2</label>
<label class="radio-inline"><input type="radio" name="optradio" value="Option 3">Option 3</label>
  <p></p>
   &#09 <input type="submit"  class="btn btn-default" name="submit1" value="Submit"><br><br>
</form> 

<?php
	if(isset($_POST["submit1"])){
			$year = $_SESSION ['year'];
			
			$user= $_SESSION ['User_Name'];
			$comment=strip_tags($_POST['comment']);
			$optradio=strip_tags($_POST['optradio']);			
			$query = "UPDATE final_report SET s2_1 = '$comment', s2_2 = '$optradio' WHERE year = '$year' AND User_Name = '$user';";
				if(mysqli_query($conn, $query)){
					echo "Good job!";
					header( "refresh:1;url=section3.php" );					
					die;					
					}else{echo "not working";}
		}
?>
</div>
</div>
</div>
</div>
</body>
</html>
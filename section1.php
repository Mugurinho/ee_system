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
  <title> Section 1  </title>
 
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
 <h4>Section 1</h4>
   <form name="regForm" method="POST">
  Overal experience:
  <select class="form-control" name="title">
  <option value="Very Good">Very Good</option>
  <option value="Good">Good</option>
  <option value="Normal">Normal</option>
  <option value="Bad">Bad</option>
  </select><br>
  <p></p>
  <div class="form-group">
  <label for="comment">Additional commentary for internal school use:</label>
  <textarea class="form-control" rows="5" name="comment"></textarea>
</div>
  <p></p>
  <label>Choose one of this:</label> 
<label class="radio-inline"><input type="radio" name="optradio" value="YES">YES</label>
<label class="radio-inline"><input type="radio" name="optradio" value="NO">NO</label>
  <p></p>
  
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Question</th>
        <th>Choose one answer</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>Why bla bla?</td>
        <td>
<label class="radio-inline"><input type="radio" name="optradio1" value="Very Good">Very Good</label>
<label class="radio-inline"><input type="radio" name="optradio1" value="Good">Good</label>
<label class="radio-inline"><input type="radio" name="optradio1" value="Normal">Normal</label>
<label class="radio-inline"><input type="radio" name="optradio1" value="Bad">Bad</label>
		</td>		
        </tr>
        <tr>
        <td>Who bla bla?</td>
        <td>  
<label class="radio-inline"><input type="radio" name="optradio2" value="Very Good">Very Good</label>
<label class="radio-inline"><input type="radio" name="optradio2" value="Good">Good</label>
<label class="radio-inline"><input type="radio" name="optradio2" value="Normal">Normal</label>
<label class="radio-inline"><input type="radio" name="optradio2" value="Bad">Bad</label>
		</td>
        </tr>
<tr>
        <td>Where bla bla?</td>
        <td>
<label class="radio-inline"><input type="radio" name="optradio3" value="Very Good">Very Good</label>
<label class="radio-inline"><input type="radio" name="optradio3" value="Good">Good</label>
<label class="radio-inline"><input type="radio" name="optradio3" value="Normal">Normal</label>
<label class="radio-inline"><input type="radio" name="optradio3" value="Bad">Bad</label>
		</td>
        </tr>
    </tbody>
  </table>
  </div>
   &#09 <input type="submit" class="btn btn-default" name="submit1" value="Submit"><br><br>
</form> 

<?php
	if(isset($_POST["submit1"])){
		if(!isset($_SESSION['r_id'])){
			$year = $_SESSION ['year'];
			
			$user= $_SESSION ['User_Name'];
			$title=strip_tags($_POST['title']);
			$comment=strip_tags($_POST['comment']);
			$optradio=strip_tags($_POST['optradio']);
			$optradio1=strip_tags($_POST['optradio1']);
			$optradio2=strip_tags($_POST['optradio2']);
			$optradio3=strip_tags($_POST['optradio3']);				
			$query = "INSERT INTO final_report (report_id, year, User_Name, s1_1, s1_2, s1_3, s1_4, s1_5, s1_6,Start) VALUES (null,'$year','$user','$title','$comment','$optradio','$optradio1','$optradio2','$optradio3',now());";
				if(mysqli_query($conn, $query)){
					$last_id = mysqli_insert_id($conn);
					$_SESSION['last_id'] = $last_id;
				echo "Good job!";
				$_SESSION['year']=$year;
					header( "Location: section2.php" );	
														
					}
		}else{
			$year = $_SESSION ['year'];
			$user= $_SESSION ['User_Name'];
			$title=strip_tags($_POST['title']);
			$comment=strip_tags($_POST['comment']);
			$optradio=strip_tags($_POST['optradio']);
			$optradio1=strip_tags($_POST['optradio1']);
			$optradio2=strip_tags($_POST['optradio2']);
			$optradio3=strip_tags($_POST['optradio3']);	
			$query = "UPDATE final_report SET s1_1 = '$title', s1_2 = '$comment', s1_3 = '$optradio', s1_4='$optradio1', s1_5='$optradio2', s1_6='$optradio' WHERE year = '$year' AND User_Name = '$user';";
			mysqli_query($conn, $query);
			header( "Location: section2.php" );	
		}
		}
?>
</div>
</div>
</div>
</div>
</body>
</html>
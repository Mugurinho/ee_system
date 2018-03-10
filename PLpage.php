<?php
ob_start();
session_start();
include_once 'dbconnEE.php';
if(isset($_SESSION['User_Name'])){
		$user = $_SESSION['User_Name'];
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
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
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
                <a class="navbar-brand" href="PLpage.php">Programme Leader home</a>
            </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
				<li><a href="personalDetailsPL.php">Edit details</a></li>
				<li><a href="updatePassPL.php">Update password</a></li>
				<li><a href="logout.php">Log out</a></li>	
			</ul>
		</div>
	</div>
</nav>
<h5><b>Welcome, <?php echo $_SESSION ['User_Name'];?></b></h5><br>
<div class="container-fluid">
	<div class="row">
	<div class="col-md-6">
			Faculty:
			<form name="regForm" method="POST">
			<select class="form-control" name="faculty" id="facList">
			<option value="Architecture, Computing and Humanities">Architecture, Computing and Humanities</option>
			<option value="Business School">Business School</option>
			<option value="Faculty of Engineering & Science">Faculty of Engineering & Science</option>
			<option value="Faculty of Education and Health">Faculty of Education and Health</option>
			</select>
			<br>
			<input type="submit" class="btn btn-default" name="submit1" value="Select">
			<br><br>
			</form>
  		</div><br> 		  
		  <?php
			if(isset($_POST["submit1"]))
			{
			$faculty = $_POST['faculty'];
			$user = $_SESSION['User_Name'];	
			$sql1 = mysqli_query ($conn, "SELECT * FROM User WHERE User_Name='".$user."' AND Faculty='".$faculty."'");
					if(mysqli_num_rows($sql1)!=0)
					{
						?>
						<div class="container-fluid">
						<div class="row">
						<div class="col-md-12">
						<div class="table-responsive">
						<table class="table table-hover">
						<th>No</th>
						<th>Name</th>
						<th>Award</th>
						<th>Academic year</th>
						<th>Date started</th>
						<th>Date submitted</th>
						<th>View Report</th>
						<th>View Response</th>
						<?php
						$sql = mysqli_query($conn, "select * from User inner join final_report on User.User_Name = final_report.User_Name where Faculty = '$faculty'");
						$no=1;
						while ($data = mysqli_fetch_array($sql))
						{
						?>						
							<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $data['First_Name'] ?><b>&nbsp;</b><?php echo $data['Sur_Name'] ?></td>
							<td><?php echo $data['Awards'] ?></td>
							<td><?php echo $data['year'] ?></td>
							<td><?php echo $data['Start'] ?></td>
							<td><?php echo $data['Submitted'] ?></td>
							<td><a href="viewPL.php?report_id=<?php echo $data['report_id'] ?>"> <?php echo $data['complete'] ?></td>
							<td><a href="view1.php?report_id=<?php echo $data['report_id'] ?>">View Response</td>		
							</tr>
							<?php
						}
						?>
						</table>
						</div>
						</div>
						</div>
						</div>
						<?php																			
					}
					else{ echo "You are not allowed to see this records!";					
							die;					
						}
			}
			?>
	</div>
</div>
</div>
</body>
</html>
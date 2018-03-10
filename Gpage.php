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
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
                <a href="Gpage.php" class="navbar-brand">Guest home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                     <li class="active">				
				<li><a href="statistics.php">Statistical and exception reports</a></li>
				<li><a href="logout.php">Log out</a></li>
                    </ul>
                </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<h5><b>Welcome, <?php echo $_SESSION ['User_Name'];?></b></h5>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<br>
			Faculty:
			<form name="regForm" method="POST">
			<select class="form-control" name="faculty" id="facList">
			<option value="Architecture, Computing and Humanities">Architecture, Computing and Humanities</option>
			<option value="Business School">Business School</option>
			<option value="Faculty of Engineering & Science">Faculty of Engineering & Science</option>
			<option value="Faculty of Education and Health">Faculty of Education and Health</option>
			</select>
			<br>
			<input type="submit" class="btn btn-default" name="submit1" value="Submit">
			<br><br>
			</form>
  			</div><br> 	
		

		    <?php
			if(isset($_POST["submit1"])){
			$faculty = $_POST['faculty'];
			$user = $_SESSION['User_Name'];	
			$sql1 = mysqli_query ($conn, "SELECT * FROM User WHERE User_Name='".$user."' AND Faculty='".$faculty."'");
					if(mysqli_num_rows($sql1)!=0)
					{
					?>	
					<div class="col-md-12">
						<div class="table table-responsive">	
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
						$sql = mysqli_query($conn, "select * from User inner join final_report on User.User_Name = final_report.User_Name where Faculty = '$faculty' AND complete='Complete'");
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
							<td><a href="view.php?report_id=<?php echo $data['report_id'] ?>"> <?php echo $data['complete'] ?></td>
							<td><a href="view5.php?report_id=<?php echo $data['report_id'] ?>"> Response</td>		
							</tr>
						<?php
						}
						?>
						</table>	
						</div>
						</div>
						<?php																			
					}
					else{ 
						echo "<br>You are not allowed to see this records!";					
						die;					
						}
					}
					?>
</div>
</div>
</div>
</div>
</body>
</html>
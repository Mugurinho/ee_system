<?php
ob_start();
session_start();
include_once 'dbconnEE.php';
if(isset($_SESSION['User_Name'])){
		$admin = $_SESSION['User_Name'];
}
//if no existing session, user logged out
if(!isset($_SESSION['User_Name'])){
		header("Location: indexEE. ");
		return;
		echo $_SESSION['User_Name'];
	}
?>
<!DOCTYPE html>
<html>
 <head>
  <title> report  </title> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> </head>
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
                 <a class="navbar-brand" href="DLTpage.php">DLT home</a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
			<li><a href="personalDetailsDLT.php">View/Update profile</a></li>
			<li><a href="updatePassDLT.php">Update password</a></li>
			<li><a href="logout.php">Log out</a></li>				
		</ul>
	</div>
	</div>
</nav>

<?php
if(isset($_GET['report_id']))
{
	$sql = mysqli_query($conn, "SELECT * FROM final_report WHERE report_id ='".$_GET['report_id']."'" );
	$row = mysqli_fetch_array($sql);
	$res = $row ['res'];
	if (!$res==0)
	{
		?>
		<h5><b>Welcome, <?php echo $_SESSION ['User_Name'];?></b></h5>
		<h5><b>Report ID: <?php echo $_GET ['report_id'];?></b></h5>
	
		<br>
		 <div class="container-fluid">
		 <div class="row">
		 <div class="col-md-8">
		
		<br><h4>University response</h4><br>
		<div class="table">
		<table class="table">
		  <tbody>
		    <tr>
		      <th>DLT comments</th>
		      <td><?php echo $row['response']?></td>
			</tr>
		  </tbody>
		</table>
		</div>		
		
		<br><h4>Section 1</h4><br>
		<div class="table">
		<table class="table"> 
		  <tbody>
		    <tr>
		      <th>Overal experience</th>
		      <td><?php echo $row['s1_1']?></td>
			</tr>
			<tr>
			  <th>Additional comments</th>
		      <td><?php echo $row['s1_2']?></td>
			</tr>
			<tr>
			  <th>Option 1</th>
		      <td><?php echo $row['s1_3']?></td>
			</tr>
			<tr>
			  <th>Rating?</th>
		      <td><?php echo $row['s1_4']?></td>
			</tr>
			<tr>
			  <th>Rating?</th>
		      <td><?php echo $row['s1_5']?></td>
			</tr>
			<tr>
			  <th>Rating?</th>
		      <td><?php echo $row['s1_6']?></td>
		    </tr>	
		  </tbody>
		</table>
		</div>
						
		<br><h4>Section 2</h4><br>
		<div class="table">
		<table class="table">
		  <tbody>
		    <tr>
		      <th>Additional comments</th>
		      <td><?php echo $row['s2_1']?></td>
			</tr>
			<tr>
			  <th>Choose one</th>
		      <td><?php echo $row['s2_2']?></td>
			</tr>	
		  </tbody>
		</table>
		</div>		
		
		<br><h4>Section 3</h4><br>
		<div class="table">
		<table class="table"> 
		  <tbody>
		    <tr>
		      <th>Choose an option</th>
		      <td><?php echo $row['s3_1']?></td>
			</tr>
			<tr>
			  <th>Additional comments</th>
		      <td><?php echo $row['s3_2']?></td>
			</tr>	
		  </tbody>
		</table>
		</div>
		<p>
		UOG
		</p>
		</div>
		</div>
		</div>
		<?php
	}
	else
	{
	echo "No response had been submitted yet for this report";
	}
}?>
</div>
</body>
</html>
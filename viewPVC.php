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
  <title>View reports</title>
 
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
                  <a class="navbar-brand" href="PVCpage.php">PVC home</a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
			<li><a href="personalDetailsPVC.php">View/Update profile</a></li>
			<li><a href="updatePassPVC.php">Update password</a></li>
			<li><a href="logout.php">Log out</a></li>					
		</ul>
	</div>
	</div>
</nav>
<?php
if(isset($_GET['report_id'])){
$sql = mysqli_query($conn, "SELECT * FROM final_report WHERE report_id ='".$_GET['report_id']."'" );
$row = mysqli_fetch_array($sql);
}
?>
<h5><b>Welcome, <?php echo $_SESSION ['User_Name'];?></b></h5>
<h5><b>Report ID: <?php echo $_GET ['report_id'];?></b></h5>

<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<br><h4>Section 1</h4>
<div class="table">
<table class="table table-hover" >
  <tbody>
    <tr class="success">
      <th>Overal experience</th>
      <td><?php echo $row['s1_1']?></td>
	</tr>
	<tr class="success">
	  <th>Additional comments</th>
      <td><?php echo $row['s1_2']?></td>
	</tr>
	<tr class="success">
	  <th>Option 1</th>
      <td><?php echo $row['s1_3']?></td>
	</tr>
	<tr class="success">
	  <th>Rating?</th>
      <td><?php echo $row['s1_4']?></td>
	</tr>
	<tr class="success">
	  <th>Rating?</th>
      <td><?php echo $row['s1_5']?></td>
	</tr>
	<tr class="success">
	  <th>Rating?</th>
      <td><?php echo $row['s1_6']?></td>
    </tr>
  </tbody>
</table>
</div>
<h4>Section 2</h4>
<div class="table">
<table class="table table-hover">
  <tbody>
    <tr class="danger">
      <th>Additional comments</th>
      <td><?php echo $row['s2_1']?></td>
	</tr>
	<tr class="danger">
	  <th>Choose one</th>
      <td><?php echo $row['s2_2']?></td>
	</tr>
  </tbody>
</table>
</div>		
<h4>Section 3</h4>
<div class="table">
<table class="table table-hover">
  <tbody>
    <tr class="info">
      <th>Choose an option</th>
      <td><?php echo $row['s3_1']?></td>
	</tr>
	<tr class="info">
	  <th>Additional comments</th>
      <td><?php echo $row['s3_2']?></td>
	</tr>
  </tbody>
</table>

<!--<form method="POST">
<input type="submit" name="submit" class="btn btn-default" value="Send as Email">
</form>
<?php
if(isset($_POST['submit'])){
$query = mysqli_query($conn, "select Email from User where Staff_Type = 'EE' OR Staff_Type = 'PL' OR Staff_Type = 'DLT' OR Staff_Type = 'PVC'");
while($result = mysqli_fetch_array($query)){	
	
	$to = $result['Email'];
	$subject = 'Report';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$msg = "<html><head>
	  <meta charset='utf-8'>
	  <meta name='viewport' content='width=device-width, initial-scale=1'>
	  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
	  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
	  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
	  <title>Report</title>
	  </head><body>
	  <table class = 'table table-bordered'>
		<td class='success'>Section 1</td>
		<tr class='success'>
		  <th>Overal experience</th>
		  <td>$row[s1_1]</td>
		</tr>
		<tr class='success'>
		  <th>Additional comments</th>
		  <td>$row[s1_2]</td>
		</tr>
		<tr class='success'>
		  <th>Option 1</th>
		  <td>$row[s1_3]</td>
		</tr>
		<tr class='success'>
		  <th>Rating?</th>
		  <td> $row[s1_4]</td>
		</tr>
		<tr class='success'>
		  <th>Rating?</th>
		  <td>$row[s1_5]</td>
		</tr>
		<tr class='success'>
		  <th>Rating?</th>
		  <td> $row[s1_6]</td>
		</tr>
		<td class='danger'>Section 2</td>
		 <tr class='danger'>
		  <th>Additional comments</th>
		  <td>$row[s2_1]</td>
		</tr>
		 <tr class='danger'>
		  <th>Choose one</th>
		  <td>$row[s2_2]</td>
		</tr>
		<td class='info'>Section 3</td>
		 <tr class='info'>
		  <th>Choose an option</th>
		  <td>$row[s3_1]</td>
		</tr>
		 <tr class='info'>
		  <th>Additional comments</th>
		  <td>$row[s3_2]</td>
		</tr>
	</table>
	</body>
	</html>";
	mail($to, $subject, $msg, $headers);
}
echo "Email has been sent!";
}
?>
-->

</div>
</div>
</div>
</div>
</div>
</body>
</html>
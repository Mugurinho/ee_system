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
               <a class="navbar-brand" href="Gpage.php">Guest home</a>
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
<h5><b>Welcome, <?php echo $_SESSION ['User_Name'];?></b></h5><br>
<div class="container-fluid">
	<div class="row">
	<div class="col-md-6">
			Reports:
			<form name="regForm" method="POST">
			<select class="form-control" name="reports" id="reports">
			<option value="rep1">Number of completed reports for each EE for each academic year</option>
			<option value="rep2">Percentage of completed reports for each Faculty for any academic year</option>
			<option value="rep3">Percentage of reports with responses for each Faculty</option>
			<option value="rep4">Programmes without an EE or PL</option>
			<option value="rep5">Programmes without an EE report for each Faculty for any academic year</option>
			<option value="rep6">Reports without a response, listed with the days since the report was submitted</option>
			</select>
			<br>
			<input type="submit" class="btn btn-default" name="submit1" value="Select">
			<br><br>			
  			</div>
  			</form>
  		<br> 		  
		  <?php
			if(isset($_POST["submit1"]))
			{
			$reports = $_POST['reports'];
			if ($reports=='rep1')
				{
				$sql = mysqli_query($conn, "SELECT COUNT(User_Name), year from final_report WHERE complete = 'Complete' GROUP BY year");
				$no=1;
				?>						
					<table class="table table-hover">
					<th>No</th>
					<th>No of completed reports</th>
					<th>Academic year</th>					
					<?php												
					while ($data = mysqli_fetch_array($sql))
					{
					?>				
						<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $data['COUNT(User_Name)'] ?></td>
						<td><?php echo $data['year'] ?></td>								
						</tr>
						<?php
					}
					?>
					</table>													
					<?php																								
				}	
			else if ($reports=='rep2')
				{
				$sql1 = mysqli_query($conn, "SELECT COUNT(final_report.User_Name), Faculty from final_report INNER JOIN User ON final_report.User_Name=User.User_Name GROUP BY Faculty");
				?>						
				<table class="table table-hover">
				<th>No</th>
				<th>Percentage of completed reports</th>
				<th>Faculty</th>					
				<?php	
				while ($data1 = mysqli_fetch_array($sql1))
					{
					$faculty = $data1['Faculty'];
					$sql = mysqli_query($conn, "SELECT COUNT(final_report.User_Name), Faculty from final_report INNER JOIN User ON final_report.User_Name=User.User_Name WHERE complete = 'Complete' AND Faculty = '$faculty'");
					$no=1;																
						while ($data = mysqli_fetch_array($sql))
						{
						?>				
							<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $data['COUNT(final_report.User_Name)']*100/$data1['COUNT(final_report.User_Name)'] ?>%</td>
							<td><?php echo $data['Faculty'] ?></td>								
							</tr>
							<?php
						}						
					}
					?>
					</table>													
					<?php			
				}
			else if ($reports=='rep3')
				{
				$sql1 = mysqli_query($conn, "SELECT COUNT(final_report.User_Name), Faculty from final_report INNER JOIN User ON final_report.User_Name=User.User_Name WHERE complete = 'Complete' GROUP BY Faculty");
				?>						
						<div class="container-fluid">
						<div class="row">
						<div class="col-md-12">
						<div class="table-responsive">
						<table class="table table-hover">
				<th>No</th>
				<th>Percentage of completed reports</th>
				<th>Faculty</th>					
				<?php	
				while ($data1 = mysqli_fetch_array($sql1))
					{
					$faculty = $data1['Faculty'];
					$sql = mysqli_query($conn, "SELECT COUNT(final_report.User_Name), Faculty from final_report INNER JOIN User ON final_report.User_Name=User.User_Name WHERE res = '1' AND Faculty = '$faculty'");
					$no=1;																
						while ($data = mysqli_fetch_array($sql))
						{
						?>				
							<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $data['COUNT(final_report.User_Name)']*100/$data1['COUNT(final_report.User_Name)'] ?>%</td>
							<td><?php echo $data['Faculty'] ?></td>								
							</tr>
							<?php
						}						
					}
					?>
					</table></div></div></div></div>													
					<?php	
				}
			else if ($reports=='rep4')
				{
				$data = mysqli_fetch_array(mysqli_query($conn, "SELECT Awards FROM User WHERE Staff_Type='EE'"));
				/* $awards= $data['Awards'];
 */				?>						
				<table class="table table-hover">
				<th>No</th>
				<th>Award</th>
				<th>Program</th>
				<?php					
				foreach ($data as $val)
					{					
					$sql1 = mysqli_query($conn, "SELECT AwardsName, ProgramName FROM Awards WHERE AwardsName!='$val'");											
					}
					$no=1;
					while ($data1 = mysqli_fetch_array($sql1))
						{
						?>				
						<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $data1['AwardsName'] ?></td>
						<td><?php echo $data1['ProgramName'] ?></td>								
						</tr>
						<?php
						}																																			
					?>
					</table>													
					<?php								
				}
			else if ($reports=="rep5")
				{
				$sql = mysqli_query($conn, "SELECT * FROM final_report INNER JOIN User ON final_report.User_Name=User.User_Name");			
				?>						
				<table class="table table-hover">
				<th>No</th>
				<th>Faculty</th>
				<th>Award</th>
				<th>Program</th>
				<?php					
				while ($data = mysqli_fetch_array($sql))
					{
					$awards= $data['Awards'];
					$sql1 = mysqli_query($conn, "SELECT FacultyName, ProgramName, Faculty.AwardsName FROM Awards INNER JOIN Faculty ON Awards.AwardsName=Faculty.AwardsName WHERE Faculty.AwardsName!='$awards' ORDER BY FacultyName");					
					$no=1;
					}
					while ($data1 = mysqli_fetch_array($sql1))
						{
						?>				
						<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $data1['FacultyName'] ?></td>
						<td><?php echo $data1['AwardsName'] ?></td>
						<td><?php echo $data1['ProgramName'] ?></td>								
						</tr>
						<?php
						}																																
					?>
					</table>													
					<?php		
				}
			else if ($reports=="rep6")
				{
				$sql = mysqli_query($conn, "SELECT * FROM final_report WHERE res=0 AND complete='Complete' GROUP BY report_id");
				$no=1;
				?>						
					<table class="table table-hover">
					<th>No</th>
					<th>Report ID</th>
					<th>Academic year</th>
					<th>Date of submission</th>
					<th>Days</th>					
					<?php												
					while ($data = mysqli_fetch_array($sql))
					{
					?>				
						<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $data['report_id'] ?></td>
						<td><?php echo $data['year'] ?></td>
						<td><?php echo $data['Submitted'] ?></td>
						<td><?php echo (strtotime(date("Y-m-d")) - strtotime($data['Submitted']))/60/60/24 ?></td>		
						</tr>
						<?php
					}
					?>
					</table>													
					<?php	
				}
			}
			?>
	</div>
</div>
</div>
</div>
</body>
</html>
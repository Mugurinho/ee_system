<?php
ob_start();
session_start();
include_once 'dbconnEE.php';
if(isset($_SESSION['User_Name'])){
		if($_SESSION['User_Name'] == 'admin'){
		$admin = $_SESSION['User_Name'];
		}else if($_SESSION['User_Name'] != 'admin'){
			
			header("location:indexEE.php");
		}
}
else
	{
		header("location:indexEE.php");
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Edit/update programme</title>
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
                <a class="navbar-brand" href="admin.php">Admin home</a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
			<li><a href="admin.php">Home</a></li>
			<li><a href="registerEE.php">Register user</a></li>
			<li><a href="showUsers.php">Show users</a></li>
			<li class="active"><a href="addPrograms.php">Edit/Update programme</a></li>
			<li><a href="personalDetailsEE.php">Edit details</a></li>
			<li><a href="cReports.php">Completed reports</a></li>
			<li><a href="updatePass.php">Update password</a></li>
			<li><a href="logout.php">Log out</a></li>				
		</ul>
	</div>
	</div>
</nav>

 <h5><b>Welcome, <?php echo $_SESSION ['User_Name'];?></b></h5>
 <div class="container-fluid">
 <div class="row">
 <div class="col-sm-6">
 <h4>Add awards and faculty</h4>
  <form name="regForm" method="POST">
  <div id="faculty">
  Faculty:
  <select class="form-control" name="faculty" id="facList">
  <option value="0"> </option>
  <option value="Architecture, Computing and Humanities">Architecture, Computing and  Humanities</option>
  <option value="Business School">Business School</option>
  <option value="Faculty of Engineering & Science">Faculty of Engineering & Science</option>
  <option value="Faculty of Education and Health">Faculty of Education and Health</option>
  </select><br>
  </div>
  Awards:
  <select class="form-control" name="awards" id="award">
  <option value="0"> </option>
  </select><br>
  Programmes
  <select class="form-control" name="programs" multiple="multiple" id="programs">
  </select><br>
  &#09 <input type="submit" name="submit1" class="btn btn-default" value="Submit"><br><br>
</form> 

<script>
var first = document.getElementById('facList'),
    second = document.getElementById('award');
	third = document.getElementById('programs');

first.onchange = function (e)
{
  var val = e.target.value;
  empty(second);
  if(val == 'Business School')
  {
  addOption('', second);
  addOption('BBA', second);
  addOption('Accounting', second);
  addOption('MBA', second);
  }
  else if(val == 'Architecture, Computing and Humanities')
  {
  addOption('', second);
  addOption('Database', second);
  addOption('Networking', second);
  addOption('Programming', second);
  }
  else if(val == 'Faculty of Engineering & Science')
  {
  addOption('', second);
  addOption('Mechanical', second);
  addOption('Chemical', second);
  addOption('Electrical', second);
  }
  else if(val == 'Faculty of Education and Health')
  {
  addOption('', second);
  addOption('Education', second);
  addOption('Medical', second);
  addOption('Health', second);
  }  
};

second.onchange = function(f)
{
	var val1 = f.target.value;
	empty(third);
	if(val1 == 'BBA')
	{
		addOption('P1',third);
		addOption('P2',third);
	}
	else if(val1 == 'Accounting')
	{
		addOption('P3',third);
		addOption('P4',third);
	}
	else if(val1 == 'MBA')
	{
		addOption('P5',third);
		addOption('P6',third);
	}
	else if(val1 == 'Database')
	{
		addOption('P7',third);
		addOption('P8',third);
	}
	else if(val1 == 'Networking')
	{
		addOption('P9',third);
		addOption('P10',third);
	}
	else if(val1 == 'Programming')
	{
		addOption('P11',third);
		addOption('P12',third);
	}
	else if(val1 == 'Mechanical')
	{
		addOption('P13',third);
		addOption('P14',third);
	}
	else if(val1 == 'Chemical')
	{
		addOption('P15',third);
		addOption('P16',third);
	}
	else if(val1 == 'Electrical')
	{
		addOption('P17',third);
		addOption('P18',third);
	}
	else if(val1 == 'Education')
	{
		addOption('P19',third);
		addOption('P20',third);
	}
	else if(val1 == 'Medical')
	{
		addOption('P21',third);
		addOption('P22',third);
	}
	else if(val1 == 'Health')
	{
		addOption('P23',third);
		addOption('P24',third);
	}

}

function empty(select) {
  select.innerHTML = '';
}

function addOption(val, select) {
  var option = document.createElement('option');
  option.value = val;
  option.innerHTML = val;
  select.appendChild(option);
}
</script>

<?php

	if(isset($_POST["submit1"]))
	{
		if(isset($_POST['awards']))
		{
			$awards=strip_tags($_POST['awards']);
			$faculty=strip_tags($_POST['faculty']);
			$programs=strip_tags($_POST['programs']);			
			$query1="SELECT * FROM Awards WHERE AwardsName='".$awards."' and ProgramName ='" . $programs . "';";	
			$result1 = mysqli_query($conn,$query1);			
			if(mysqli_num_rows($result1)!=0)
			{				
			echo "Program already present!";		
			}
			else
			{				
			$query1="SELECT * FROM Faculty WHERE FacultyName='".$faculty."' and AwardsName ='" . $awards . "';";			
			$result1 = mysqli_query($conn,$query1);
			if(mysqli_num_rows($result1)==0)
				{				
					$query2 = "INSERT INTO Faculty ( FacultyName, AwardsName) VALUES ('$faculty','$awards')";				
					mysqli_query($conn, $query2);								
					$query = "INSERT INTO Awards ( AwardsName, ProgramName) VALUES ('$awards','$programs');";				
					mysqli_query($conn, $query);							
				}
				else
				{					
					$query = "INSERT INTO Awards ( AwardsName, ProgramName) VALUES ('$awards','$programs');";
					mysqli_query($conn, $query);			
				}
					echo "Changes submitted succesfully";
			}
		}
	}
?>
</div>
</div>
</div>
</div>
</body>
</html>
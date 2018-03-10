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
  <title> User Registration  </title>
 
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
			<li class="active"><a href="registerEE.php">Register user</a></li>
			
<li><a href="showUsers.php">Show users</a></li>
			
			<li><a href="addPrograms.php">Edit/Update programme</a></li>
			
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
 <h4>&nbsp&nbsp&nbspUser registration page</h4>

<form name="regForm" method="POST">
 <div class="col-sm-6">
  Title:
  <select class="form-control" name="title">
  <option value="mr">Mr</option>
  <option value="ms">Ms</option>
  <option value="mrs">Mrs</option>
  <option value="miss">Miss</option>
  </select><br></div>
  <div class="col-sm-6">
  Firstname: <input type="text" placeholder="Enter first name" title="First name" class="form-control" name="firstname" required><br></div>
  <div class="col-sm-6">
  Surname: <input type="text" placeholder="Enter surname" title="Surname" class="form-control" name="surname" required><br></div>
  <div class="col-sm-6">
  Username <input type="text" pattern=".{4,16}" placeholder="4-16 chars with underscore only" title="4 to 16 characters" class="form-control" name="username" required><br></div>
  <div class="col-sm-6">
  Password: <input type="password" class="form-control" placeholder="4-16 chars with period and underscore only" pattern=".{4,16}" title="4 to 16 characters" name="password" required><br></div>
  <div class="col-sm-6">
  Email: <input type="text" placeholder="Hello@hello.com" class="form-control" name="email" required><br></div>
  <div class="col-sm-6">
  Role:
  <select class="form-control" name="type" onchange="typeselect(this)">
  <option value="EE">EE</option>
  <option value="PVC">PVC</option>
  <option value="DLT">DLT</option>
  <option value="PL">PL</option>
  <option value="Guest">Guest</option>
  </select><br>
  
  <div id="faculty">
  Faculty:
  <select class="form-control" name="faculty" id="facList">
  <option value="Architecture, Computing and Humanities">Architecture, Computing and 
Humanities</option>
  <option value="Business School">Business School</option>
  <option value="Faculty of Engineering & Science">Faculty of Engineering & Science</option>
  <option value="Faculty of Education and Health">Faculty of Education and Health</option>
  </select><br>
</div></div>
  <div class="col-sm-6">
  
  Awards:
  <select class="form-control" name="awards" id="award">
  <option value="Databases">Databases</option>
  <option value="Programming">Programming</option>
  <option value="Networking">Networking</option>
  <option value="Project management">Project management</option>
  <option value="Security">Security</option>
  <option value="Web technology">Web technology</option>
  <option value="Multimedia systems">Multimedia systems</option>
  </select><br><br></div>
  <div class="col-sm-6">
  &#09 <input type="submit" class="btn btn-default" name="submit1" value="Submit" onclick="ValidateEmail(document.regForm.email)">
  <?php if(isset($_GET['register'])){echo $_GET['register']; }?>
  <?php if(isset($_GET['usertaken'])){echo $_GET['usertaken']; }?>
  <?php if(isset($_GET['pltaken'])){echo $_GET['pltaken']; }?>
  <?php if(isset($_GET['eetaken'])){echo $_GET['eetaken']; }?>
  <?php if(isset($_GET['guesttaken'])){echo $_GET['guesttaken']; }?>
  <?php if(isset($_GET['roletaken'])){echo $_GET['roletaken']; }?>
  <br><br></div>

</form>


<script>
function hide(){
var earrings = document.getElementById('facList');
//earrings.style.visibility = 'hidden';
earrings.disabled = true;

var awrd = document.getElementById('award');
	awrd.disabled = true;
}

function hideAward(){
	var awrd = document.getElementById('award');
	awrd.disabled = true;
	
}

function show(){
var earrings = document.getElementById('facList');
//earrings.style.visibility = 'visible';
earrings.disabled = false;

var awrd = document.getElementById('award');
	awrd.disabled = false;

}

function typeselect(select)
{
if(select.value == 'PVC')
 {
 hide();
 }
 else if(select.value == 'DLT')
 {
 hide();
 }
 else if(select.value == 'PL')
 {
  hideAward();
 }
 else if(select.value == 'Guest')
 {
  hideAward();
 }
 else
 {
 show();
 }
}
</script>

<script>
var first = document.getElementById('facList'),
    second = document.getElementById('award');

first.onchange = function (e) {
  var val = e.target.value;
  empty(second);
  if(val == 'Business School'){
  addOption('BBA', second);
  addOption('Accounting', second);
  addOption('MBA', second);
  }else if(val == 'Architecture, Computing and Humanities'){
  empty(second);
  addOption('Database', second);
  addOption('Networking', second);
  addOption('Programming', second);
  }else if(val == 'Faculty of Engineering & Science'){
  addOption('Mechanical', second);
  addOption('Chemical', second);
  addOption('Electrical', second);
  }else if(val == 'Faculty of Education and Health'){
  addOption('Education', second);
  addOption('Medical', second);
  addOption('Health', second);
  }
 
};

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
	if(isset($_POST["submit1"])){
		if(isset($_POST['faculty']))
		{
		if(isset($_POST['awards'])){

			$title=($_POST['title']);
			$type=strip_tags($_POST['type']);
			$awards=strip_tags($_POST['awards']);
			$faculty=strip_tags($_POST['faculty']);
			$fn=strip_tags($_POST['firstname']);
			$sn=strip_tags($_POST['surname']);
			$pass=strip_tags($_POST['password']);
			$pass=md5($_POST['password']);
			$user=strip_tags($_POST['username']);
			$email=strip_tags($_POST['email']);
			$query1="SELECT * FROM User WHERE Staff_Type='".$type."' AND Awards='" . $awards . "'";
			$result1 = mysqli_query($conn,$query1);
			if(mysqli_num_rows($result1)!=0)
			{
				$Message = urlencode("<h5 id='alerts'>One EE is already registered for this award!</h5>");
				header('Location: registerEE.php?eetaken='. $Message);
			}
			else{
				
				$query = "INSERT INTO User (First_Name, Sur_Name, User_Name, Password, Email, Title, Awards, Faculty, Staff_Type) VALUES ('$fn','$sn','$user', '$pass', '$email','$title','$awards','$faculty','$type');";
				if(mysqli_query($conn, $query)){
					mail($email,'Welcome ' . $user ,' You have been registered as an EE and Your Password is: '. $_POST['password']);
					$Message = urlencode("<h5 id='alerts'>Registration succesfull!</h5>");
					header('Location: registerEE.php?register='. $Message);			
					die;					
					}
		}
	}
	else if($_POST['type'] == 'PL'){
			$title=($_POST['title']);
			$type=strip_tags($_POST['type']);
			$faculty=strip_tags($_POST['faculty']);
			$fn=strip_tags($_POST['firstname']);
			$sn=strip_tags($_POST['surname']);
			$pass=strip_tags($_POST['password']);
			$pass=md5($_POST['password']);
			$user=strip_tags($_POST['username']);
			$email=strip_tags($_POST['email']);
			$query1="SELECT * FROM User WHERE Staff_Type='".$type."' AND Faculty='" . $faculty . "'";
			$result1 = mysqli_query($conn,$query1);
			if(mysqli_num_rows($result1)!=0)
			{
				$Message = urlencode("<h5 id='alerts'>A PL with the same faculty has already been registered!</h5>");
				header('Location: registerEE.php?pltaken='. $Message);	
				die();
			}
			else
			{				
				$query = "INSERT INTO User (First_Name, Sur_Name, User_Name, Password, Email, Title, Faculty, Staff_Type) VALUES ('$fn','$sn','$user', '$pass', '$email','$title','$faculty','$type');";
				if(mysqli_query($conn, $query))
				{
					mail($email,'Welcome ' . $user ,' You have been registered as a PL and Your Password is: '. $_POST['password']);
					$Message = urlencode("<h5 id='alerts'>Registration succesfull!</h5>");
					header('Location: registerEE.php?register='. $Message);				
					die();					
				}
			}	
	}
	
	else if($_POST['type'] == 'Guest')
	{
			$title=($_POST['title']);
			$type=strip_tags($_POST['type']);
			$faculty=strip_tags($_POST['faculty']);
			$fn=strip_tags($_POST['firstname']);
			$sn=strip_tags($_POST['surname']);
			$pass=strip_tags($_POST['password']);
			$pass=md5($_POST['password']);
			$user=strip_tags($_POST['username']);
			$email=strip_tags($_POST['email']);
			$query1="SELECT * FROM User WHERE Staff_Type='".$type."' AND Faculty='" . $faculty . "'";
			$result1 = mysqli_query($conn,$query1);
			if(mysqli_num_rows($result1)!=0)
			{
				$Message = urlencode("<h5 id='alerts'>A Guest with the same faculty has already been registered!!</h5>");
				header('Location: registerEE.php?guesttaken='. $Message);
				die();
			}
			else
			{				
				$query = "INSERT INTO User (First_Name, Sur_Name, User_Name, Password, Email, Title, Faculty, Staff_Type) VALUES ('$fn','$sn','$user', '$pass', '$email','$title','$faculty','$type');";
				if(mysqli_query($conn, $query))
				{
					$Message = urlencode("<h5 id='alerts'>Registration succesfull!</h5>");
					header('Location: registerEE.php?register='. $Message);			
					die();					
				}
			}	
	}
		}

	else{		
		$title=($_POST['title']);
		$type=strip_tags($_POST['type']);		
		$fn=strip_tags($_POST['firstname']);	
		$sn=strip_tags($_POST['surname']);			
		$pass=strip_tags($_POST['password']);			
		$pass=md5($_POST['password']);			
		$user=strip_tags($_POST['username']);			
		$email=strip_tags($_POST['email']);			
		$query1="SELECT * FROM User WHERE Staff_Type='".$type."'";
		$result1 = mysqli_query($conn,$query1);			
			if(mysqli_num_rows($result1)!=0)
		{
				$Message = urlencode("<h5 id='alerts'>This role is already taken!</h5>");
				header('Location: registerEE.php?roletaken='. $Message);
		}
		else
		{		
				$query = "INSERT INTO User (First_Name, Sur_Name, User_Name, Password, Email, Title, Staff_Type) VALUES ('$fn','$sn','$user', '$pass', '$email','$title','$type');";
	if(mysqli_query($conn, $query)){
		mail($email,'Welcome ' . $user ,' You have been registered as a ' . $_POST['type'] . ' and Your Password is: '. $_POST['password']);
		$Message = urlencode("<h5 id='alerts'>Registration succesfull!</h5>");
		header('Location: registerEE.php?register='. $Message);
		echo '<script language="javascript">';
		echo 'alert("message successfully sent")';
		echo '</script>';
	}	
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
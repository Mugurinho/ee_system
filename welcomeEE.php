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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html>
 <head>
  <title>ee welcome page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<!-- tracking code for google analytics -->
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
 <br>
Please select an academic year to start a report:
<form name="regForm" method="POST">
  <select class="form-control" name="year">
  <option value="2015-2016">2015-2016</option>
  <option value="2014-2015">2014-2015</option>
  <option value="2013-2014">2013-2014</option>
  <option value="2012-2013">2012-2013</option>
  </select><br>
  &#09 <input type="submit" class="btn btn-default" name="submit1" value="Select"><br><br>
</form>
  <?php
	if(isset($_POST["submit1"])){
	$year = $_POST['year'];
	$user = $_SESSION['User_Name'];
	$sql = mysqli_query ($conn, "SELECT * FROM User inner join final_report on User.User_Name=final_report.User_Name WHERE User.User_Name='".$user."' AND final_report.year='$year'");

$row = mysqli_fetch_array($sql);

	$dbusername=$row['User_Name'];
	$complete=$row['complete'];
	if ($complete=='Complete'){
	echo "Report submited already";
		}
			else{$_SESSION['year']=$year;
		$q1= mysqli_query ($conn,"SELECT * FROM final_report WHERE year = '$year' AND User_Name = '$user';");
			$row = mysqli_fetch_array($q1);
		$r_id= $row['report_id'];
$_SESSION['r_id']=$r_id;
			header( "refresh:3;url=section1.php" );	
			die;		
			}
}
?>
</div></div></div><br>

<div class="container-fluid">
<div class="row">
<div class="col-md-6">
<p style="text-align:justify;">
<strong>Few words about EE and REPORTS:</strong><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
</p>
</div></div></div>
<?php
include_once 'dbconnEE.php';
	// PAGINATION START
	//getting page number from url for pagination
	
	if(isset($_GET['page'])){
	$page = $_GET["page"];
	}else{
		$page = 0;
	}

	if($page == "" || $page == "1"){
		$page1=0;
	}else{
		$page1=($page*5)-5;
	}

	//PAGINATION END

//	$sql = "SELECT * FROM Item ORDER BY itemID DESC limit $page1,6";
//	
//	$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
//
//	
//	
//	$posts = "";
	
//	if(mysqli_num_rows($res) > 0){
//		while($row = mysqli_fetch_assoc($res)){
//			$id = $row['itemID'];
//			$title = $row['title'];
//			$location = $row['location'];
//			$content = $row['content'];
//			$date = $row['date'];
//			
//			//$admin = "<div><a href='del_post.php?pid=$id'>Delete</a>&nbsp;<a href='edit_post.php?pid=$id'>Edit</a><br /></div>";
//			
//			$output = $bbcode->Parse($content);
//			
//			$posts .= "<div class=\"col-md-4\"><h2><a href='view_post.php?pid=$id'>$title</a></h2><h4><i>$location</i></h4><p>$date</p><hr /></div>";
//		}
//		echo $posts . "<br>";
//
//		
//		
//	}else{
//		echo "There are no items available";
//	}
?>

</div>
<!--<?php
// $sqlpage = "SELECT * FROM Item ORDER BY itemID DESC";
//		$respage = mysqli_query($conn, $sqlpage) or die(mysqli_error($conn));
//
//		$cout = mysqli_num_rows($respage);
//
//		$a = $cout/5;
//		$a = ceil($a);
//		
//			for($b=1;$b<=$a;$b++){
//				?><b> <a href="?page=<?php echo $b; ?>" style="text-decoration:none "><?php echo $b . " - "; ?></a><b> <?php
//			}
//				echo "<br><br>";
//				?>-->
 
</div>
 
</div>



 
 </body>


</html>

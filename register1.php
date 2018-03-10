<?php
ob_start();
session_start();
include_once 'connection.php';
?>

<!DOCTYPE html>
<html>
 <head>
  <title> Register  </title>
 
<meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

 </head>

 <body>

 <?php 
  
  function generateRandomString($length = 5) {
    $characters = '012345678';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
  
  ?>
 
<div class="container">
<img src="logo/logo.png" alt="logo" height="60" width="100">
<nav class="navbar navbar-default">
	<div class="container-fluid">
	
	<!-- Logo -->
	<div class="navbar-header">
		<a href="index1.php" class="navbar-brand">External Examiner Reporting System</a>
	</div>

	<!-- Menu items go here -->
	<div>
		<ul class="nav navbar-nav">
			<li><a href="index1.php">Home</a></li>
			<li class="active"><a href="register1.php">Register</a></li>
		</ul>
	</div>

	</div>

</nav>
 <div class="container-fluid">
 <div class="row">

 <div class="col-sm-6">
 <h1>Welcome!</h1>
  <h3>Please enter your details to register!</h3>
  
   <form name="regForm" method="POST">
  Username: <input type="text" pattern=".{5,16}" placeholder="5-16 chars with underscore only" required title="5 to 16 characters" class="form-control" name="username" value="<?php if(isset($_SESSION['sess_user'])) echo $_SESSION['sess_user']; ?>" required><br>
  Password: <input type="password" class="form-control" placeholder="5-16 chars with period and underscore only" pattern=".{5,16}" required title="5 to 16 characters" name="password" required><br>
  Email : <input type="text" placeholder="Hello@hello.com" class="form-control" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>" name="email" required><br>
  
   <!--captcha image -->
  Enter captcha  : <input name="captcha" type="text" size="4" maxlength="4" required>
   <img src="captcha.php" /><br>
   <h6><a href="register1.php">Refresh captcha</a></h6>
  
  &#09 <input type="submit" name="submit1" value="Submit" onclick="ValidateEmail(document.regForm.email)"><br><br>
  
  <h4>Already a member?  <a href="index1.php">Login here!</a></h4>
   <?php
   
	if(isset($_POST["submit1"])){
		$_SESSION['sess_user'] = $_POST["username"];
		$_SESSION['email'] = $_POST["email"];
		if($_SESSION["code"] != $_POST["captcha"]){
		
			goto a;
	}
		
		if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
			
		
	if (empty($_POST["email"])) {
				$emailErr = "Email is required";
			  } else {
				$email = $_POST["email"];
				$uname = $_POST["username"];
				// check if e-mail address is well-formed
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				  $emailErr = "Invalid email format";
				  goto b;
				}
				if (filter_var($uname, FILTER_VALIDATE_EMAIL)) {
				  $usernameerror = "Username can't be an email!";
				  goto c;
				}
			  }

			//variables to be used including the generated verificaiton code
			$user=strip_tags($_POST['username']);

			
			$pass=strip_tags($_POST['password']);
			$email=strip_tags($_POST['email']);

			//prematch statements
			//checking username for correct format
			if (!preg_match('/^[a-z\d_]{5,16}$/i', $user)) {
				goto d;
			  }
			//checking password for correct format
			if (!preg_match('/^[a-z\d_.]{5,16}$/i', $pass)) {
				goto e;
			  }
						$query1="SELECT * FROM User WHERE username='".$user."'";
	
			$result1 = mysqli_query($conn,$query1);
			if(mysqli_num_rows($result1)!=0)
			{
				
				echo "Username already taken!";
			}else{
				
			$vericode=generateRandomString();
				$query = "INSERT INTO User (`userID`, `username`, `password`, `email`, `VerificationCode`, `Verified`) VALUES (NULL, '".$user."', '".$pass."', '".$email."', '".$vericode."', '0');";
				
				$result = mysqli_query($conn,$query);
				
				//storing the username in session variable 
				
				$_SESSION['verificationcode'] = $vericode;

				// code for getting the session user id
				$query3="SELECT * FROM User WHERE username='".$user."'";
	
				$result3 = mysqli_query($conn,$query3);
				$numrows= mysqli_num_rows($result3);
				if($numrows!=0)
				{
				while($row=mysqli_fetch_assoc($result3))
				{
				
				$_SESSION['sess_userID']=$row['userID'];
				}
				}

				mail($email, 'Freecycle Verification', 'Here is your verification code  '.$vericode);
				
				echo "Username created! <br> Please check your inbox for verification code. <br>";
				
				//header( "refresh:5;url=index.php" );
				header( "refresh:3;url=verify.php" );
				
				echo "You will now be redirected to login page!";
			}
		}else{
					//ERROR LIST
			echo "You must fill all the fields! <br>";
			a: echo "Wrong code entered! <br>";
			header("Refresh:2");
			return;
			b: echo "Wrong email format <br>";
			header("Refresh:2");
			return;
			c: echo "Username can't be an email! <br>";
			header("Refresh:2");
			return;
			d: echo "Wrong username format! <br>";
			header("Refresh:2");
			return;
			e: echo "Password can only contain ,._! <br>";
			header("Refresh:4");
		}
	}
  ?>
  
  
  </form> 
			
			<!-- Code for email field validation -->
  
			
<script>
			function ValidateEmail(inputText)  
			{  
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
			if(inputText.value.match(mailformat))  
			{  
			document.regForm.email.focus();  
			return true;
			}  
			else  
			{  
			alert("You have entered an invalid email address!");  
			window.location.reload();
			}  
			}
			</script>
  
 </div>


</div>
</div>
</div>
 
 </body>


</html>

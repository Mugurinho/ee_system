<?php
if(isset($_POST['upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $userID = $_SESSION['id_session'];
 $date = date("Y/m/d");
 $folder="uploads/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql="INSERT INTO Expense(File_Name,Date_of_Upload,User_ID) VALUES('$file','$date','$userID')";
 mysqli_query($conn,$sql); 
}
?>
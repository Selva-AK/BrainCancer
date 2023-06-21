<?php
 session_start();
?>
<?php  
 $conn=new mysqli("localhost", "root","","Project");
 if($conn->connect_error)
 {
  die("connection failed:".$conn->connect_error);
 }
 else
 {  
 $E_Mail = $User_Name = $Password = $DOB = $Gender = $Role = $Mobile = "";
 $E_MailErr = $User_NameErr = $PasswordErr = $DOBErr = $GenderErr = $RoleErr = $MobileErr = "";
 
 if(empty($_POST["E_Mail"])) 
 { $E_MailErr = "E_Mail is required"; }
 if(empty($_POST["User_Name"])) 
 { $User_NameErr = "User_Name is required"; }
 else if(empty($_POST["Password"])) 
 { $PasswordErr = "Password is required"; }
 else if(empty($_POST["DOB"])) 
 { $DOBErr = "DOB is required"; }
 else if(empty($_POST["Gender"])) 
 { $GenderErr = "Gender is required"; }
 else if(empty($_POST["Role"])) 
 { $RoleErr = "Role is required"; }
 else if(empty($_POST["Mobile"])) 
 { $MobileErr = "Mobile is required"; }
 else
 {
  $E_Mail=test_input($_POST["E_Mail"]);
  $User_Name=test_input($_POST["User_Name"]);
  $Password=test_input($_POST["Password"]);
  $DOB=test_input($_POST["DOB"]);
  $Gender=test_input($_POST["Gender"]);
  $Role=test_input($_POST["Role"]);
  $Mobile=test_input($_POST["Mobile"]);
  
  $sql="select * from reg_login where E_Mail='".$E_Mail."'";
  $result=$conn->query($sql);

  if($result->num_rows >0)
  {
	echo "<script type='text/javascript'>alert('Already Register');</script>";
	#header("Location: Register.html");  
	#echo "Already Register";	
	echo '<a href="Register.html">Click Back to Register New User</a>';
  }
  else
  {
   $sql="INSERT INTO reg_login(E_Mail,User_Name,Password,DOB,Gender,Role,Mobile)VALUES('$_POST[E_Mail]','$_POST[User_Name]','$_POST[Password]','$_POST[DOB]','$_POST[Gender]','$_POST[Role]','$_POST[Mobile]')";
   if($conn->query($sql)===true)
   {
	#echo "new record created";
	echo "<script type='text/javascript'>alert('Register successfully');</script>";
	header("Location: Main.php");
	$_SESSION["email"] = $E_Mail;
	$_SESSION["user_Name"] = $User_Name;
	$_SESSION["role"] = $Role;
   }
   else
   {
    echo "error".$sql."<br>".$conn->error;
   }
  }
 }
}
$conn->close();

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
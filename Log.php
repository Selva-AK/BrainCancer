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
  $E_Mail = $Password = "";
  $E_MailErr = $PasswordErr = "";
 
  if(empty($_POST["E_Mail"])) 
  { $E_MailErr = "E_Mail is required"; } 
  else if(empty($_POST["Password"])) 
  { $PasswordErr = "Password is required"; } 
  else
  {
   $E_Mail=test_input($_POST["E_Mail"]);  
   $Password=test_input($_POST["Password"]); 
   
   $sql="select * from reg_login where E_Mail='".$E_Mail."' and Password='".$Password."'";
   $result=$conn->query($sql);	
   if($result->num_rows >0)
   { 
	while($row=$result->fetch_assoc())
	{
	 $email=$row['E_Mail'];
	 $un=$row['User_Name'];
	 $role=$row['Role'];
	 #echo "Login OK";
	 header("Location: Main.php");  
	 $_SESSION["email"] = $email;
	 $_SESSION["user_Name"] = $un;
	 $_SESSION["role"] = $role;
	 exit; 
	}
   }
   else
   {	 
    $msg= "Invalid Email/Password";
    echo '<a href="Login.html">Click Back to Login Page</a>';
    echo "<script type='text/javascript'>alert('$msg');</script>";
    #header("Location: Login.html");
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
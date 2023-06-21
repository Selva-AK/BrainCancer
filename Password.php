<?php
$conn=new mysqli("localhost", "root","","Project");

if($conn->connect_error)
{
 die("connection failed:".$conn->connect_error);
}
else
{
 $E_Mail = $Password =  "";
 $E_MailErr = $PasswordErr = "";

 if(isset($_POST["up"]))
 {
  if(empty($_POST["E_Mail"])) 
  { $E_MailErr = "E_Mail is required"; }
  else if(empty($_POST["Password"])) 
  { $PasswordErr = "Password is required"; }
  else
  {	
    $E_Mail = test_input($_POST["E_Mail"]);
    $Password = test_input($_POST["Password"]);
	
	$sql="select * from reg_login where E_Mail='".$E_Mail."'";
	$result=$conn->query($sql);

    if($result->num_rows >0)
	{
	 $sql="update reg_login set Password='".$Password."' where E_Mail='".$E_Mail."'";
	 if($conn->query($sql)===true)
	 {
	   #echo "<script type='text/javascript'>alert('Record Updated');</script>";
	   #echo "Record Updated";
	   $errfield="Record Updated";
	   $errfieldc="text-success";	
	 }
	 else
	 {
	  echo "error".$sql."<br>".$conn->error;
	 }
    }
	else
	{
	 #echo "<script type='text/javascript'>alert('NO RECORD FOUND');</script>";
	 #echo "NO RECORD FOUND";
	 $errfield="No Record Found";
	 $errfieldc="text-danger";	
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

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="shortcut icon" type="image/png" href="images/mary.png" />
    <!-- Bootstrap 4 CDN -->
    <link rel="stylesheet" href="cdn/bootstrap.min.css">
    <script src="cdn/jquery.min.js"></script>
    <script src="cdn/popper.min.js"></script>
    <script src="cdn/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="cdn1/fonts/font-awesome.min.css">
    <!-- Select2 and date -->
    <link rel="stylesheet" href="cdn1/select2/select2.min.css">
    <script src="cdn1/select2/select2.full.min.js"></script>
    <link rel="stylesheet" type="text/css" href="cdn1/jquery-ui1.8.css" />
    <script src="cdn1/jquery-ui.min.js"></script>
    <!--Time-->
    <link href="cdn1/jquery.ptTimeSelect.css" rel="stylesheet" type="text/css">
    <script src="cdn1/jquery.ptTimeSelect.js" type="text/javascript"></script>
    <link href="cdn1/mdtimepicker.css" rel="stylesheet" type="text/css">
    <script src="cdn1/mdtimepicker.js"></script>
    <!--data Tables-->
    <link rel="stylesheet" href="cdn1/datatables/dataTables.bootstrap4.min.css">
    <script src="cdn1/datatables/jquery.dataTables.min.js"></script>
    <script src="cdn1/datatables/dataTables.bootstrap4.min.js"></script>
</head>
 
<body style="background-color:lavender">
	<br>
	<div class="container-fluid">
    <div class="row">		
		<div class="col-sm-4"></div>		
			<div class="col-sm-4 card card-info">
			
			<div class="card-header" style="background-color: #3b5998;">
				<h5 class="card-title  text-white text-center" style="font-family: arial">Change password</h5>                
            </div>
				
			<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
				<div class="card-body">
				
					<div class="form-group">
                    <div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">E_Mail</label>
                        <input type="email" id="E_Mail" value="<?php if(isset($E_Mail)) echo $E_Mail;?>" class="form-control col-9" name="E_Mail" placeholder="E_Mail" autocomplete="off">                             
						<span class="error text-danger ">* <?php echo $E_MailErr;?></span>
					</div>
					</div>
									
					
					
					<div class="form-group">
                    <div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">Password</label>
                        <input type="password" value="<?php if(isset($Password)) echo $Password;?>" id="Password" class="form-control col-9" name="Password"   placeholder="Password" autocomplete="off" >
                        <span class="error text-danger">* <?php echo $PasswordErr;?></span>
					</div>
					</div>
							
					<div class="form-group">
                    <div class="input-group">							
						<label class="col-form-label mr-1 col-3" for="name"></label>
						<input type="submit" class=" mr-8" name="up" value="Change Password">
						<input type="submit" class="ml-2 mr-2" name="show" value="Show Password">
					</div>
					</div>
					<?php echo '<a class="font-weight-bold float-right" href="Main.php">Back</a>'; ?>
					<label class="col-form-label col-12 <?php if(isset($errfieldc)) echo $errfieldc;?> bold text-center" for="name"><?php if(isset($errfield)) echo $errfield;?></label>						
				</div>
<?php
#upf();
$conn=new mysqli("localhost", "root","","Project");
if(isset($_POST["show"]))
{
 upf();
}
function upf()
{
 global $conn;
 if($conn->connect_error)
 {
  die("connection failed:".$conn->connect_error);
 }
 $E_Mail = $_POST["E_Mail"];
 $sql="select * from reg_login where E_Mail='".$E_Mail."'";
 	  
 $result=$conn->query($sql);
 $rowcount=mysqli_num_rows($result);
 printf("Result set has %d rows.\n",$rowcount);
 
 if($result->num_rows >0)
 {
  while($row=$result->fetch_assoc())
  {
   $E_Mail = $row["E_Mail"];
   $Password = $row["Password"];  
  }
  $main_string = $Password;
	$sub_string = '****';
	$position = '2';
	$result = substr_replace( $main_string, $sub_string, $position, 3 ); 
	echo $result;
 }
 else
 {
  #echo "NO RECORD FOUND";
  $errfield="No Record Found";
  $errfieldc="text-danger";
  echo '<label class="col-form-label col-12 text-danger font-weight-bold text-center" for="name">'.$errfield.'</label>';
 }
 $conn->close();
}
?>

		</form>
		</div>
	<div class="col-sm-4">
	</div>
			
	</div>
	</div>
			
</body>
</html>

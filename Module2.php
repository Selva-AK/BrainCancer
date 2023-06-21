<?php

 $conn=new mysqli("localhost", "root","","Project");
 $Id = $ColumnName1 = $ColumnName2 = $ColumnName3 = $ColumnName4 = $ColumnName5 = "";
 $IdErr = $ColumnName1Err = $ColumnName2Err = $ColumnName3Err = $ColumnName4Err = $ColumnName5Err = "";

 if(isset($_POST["ins"]))
 {
  global $conn;$ID_Proof = "";
  if($conn->connect_error)
  {
   die("connection failed:".$conn->connect_error);
  }
  else
  { 
   if(empty($_POST["Id"])) 
   { $R_NoErr = "Id is required"; }
   if(empty($_POST["ColumnName1"])) 
   { $GNameErr = "ColumnName1 is required"; }
   if(empty($_POST["ColumnName2"])) 
   { $From_DateErr = "ColumnName2 is required"; }
   if(empty($_POST["ColumnName3"])) 
   { $To_DateErr = "ColumnName3 is required"; }
   if(empty($_POST["ColumnName4"])) 
   { $DaysErr = "ColumnName4 is required"; }
   if(empty($_POST["ColumnName5"])) 
   { $PaymentErr = "ColumnName5 is required"; }
   else
   {	
	$Id = test_input1($_POST["Id"]);
	$ColumnName1 = test_input1($_POST["ColumnName1"]);
	$ColumnName2 = test_input1($_POST["ColumnName2"]);
	$ColumnName3 = test_input1($_POST["ColumnName3"]);
	$ColumnName4 = test_input1($_POST["ColumnName4"]);
	$ColumnName5 = test_input1($_POST["ColumnName5"]);
		
	$sql="select * from module_name2 where Id='".$Id."'";		
	$result=$conn->query($sql);		
	print($Id);
	if($result->num_rows >0)
	{
	 #update place  1234
	 
	 $errfield="Already Record Found";
	 $errfieldc="text-danger";
	}
	else
	{
	 #echo $Photo;
	 #insert place
	 $sql="INSERT INTO module_name2(Id,ColumnName1,ColumnName2,ColumnName3,ColumnName4,ColumnName5)VALUES('$_POST[Id]','$_POST[ColumnName1]','$_POST[ColumnName2]','$_POST[ColumnName3]','$_POST[ColumnName4]','$_POST[ColumnName5]')";
	 if($conn->query($sql)===true)
	 {
	  #echo "RECORD Created";
	  #echo "<script type='text/javascript'>alert('record created');</script>";
	  $errfield="Record Created";
	  $errfieldc="text-success";
	 }
	 else
	 {
	  echo "error".$sql."<br>".$conn->error;
	 }		
    }
	
    }	
	}
 $conn->close();
 }
 
 
 if(isset($_POST["up"]))
 {
  global $conn;$Photo = "";
  if($conn->connect_error)
  {
   die("connection failed:".$conn->connect_error);
  }
  else
  {
    if(empty($_POST["Id"])) 
   { $R_NoErr = "Id is required"; }
   if(empty($_POST["ColumnName1"])) 
   { $GNameErr = "ColumnName1 is required"; }
   if(empty($_POST["ColumnName2"])) 
   { $From_DateErr = "ColumnName2 is required"; }
   if(empty($_POST["ColumnName3"])) 
   { $To_DateErr = "ColumnName3 is required"; }
   if(empty($_POST["ColumnName4"])) 
   { $DaysErr = "ColumnName4 is required"; }
   if(empty($_POST["ColumnName5"])) 
   { $PaymentErr = "ColumnName5 is required"; }
   else
   {	
	$Id = test_input1($_POST["Id"]);
	$ColumnName1 = test_input1($_POST["ColumnName1"]);
	$ColumnName2 = test_input1($_POST["ColumnName2"]);
	$ColumnName3 = test_input1($_POST["ColumnName3"]);
	$ColumnName4 = test_input1($_POST["ColumnName4"]);
	$ColumnName5 = test_input1($_POST["ColumnName5"]);
		
	$sql="select * from module_name2 where Id='".$Id."'";		
	$result=$conn->query($sql);	

	if($result->num_rows >0)
	{
	  $sql="update module_name2 set ColumnName1='".$ColumnName1."',ColumnName2='".$ColumnName2."',ColumnName3='".$ColumnName3."',ColumnName4='".$ColumnName4."', ColumnName5='".$ColumnName5."' where Id='".$Id."'";
	  if($conn->query($sql)===true)
	  {
		#echo "record updated";
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
	 #echo "NO RECORD FOUND";
	 $errfield="No Record Found";
	 $errfieldc="text-danger";
	}
	$conn->close();
   }
 }
 }

 if(isset($_POST["del"]))
 {
  global $conn;$Photo = "";
  if($conn->connect_error)
  {
   die("connection failed:".$conn->connect_error);
  }
  else
  {
   if(empty($_POST["Id"]))
    { $IdErr = "Id is required"; }

    $Id = test_input1($_POST["Id"]);
   	$sql="select * from module_name2 where Id='".$Id."'";		
	$result=$conn->query($sql);
	if($result->num_rows >0)
	{
	$sql="delete from module_name2 where Id='".$Id."'";
	if($conn->query($sql)===true)
	{	 
	 $errfield="Record Deleted";
	 $errfieldc="text-danger";
    }
	else
	{
	echo "error".$sql."<br>".$conn->error;
	}
	}
	else
	{
	 #echo "NO RECORD FOUND";
	 $errfield="No Record Found";
	 $errfieldc="text-danger";
	}
	$conn->close();
   
  }	  
 }

 if(isset($_POST["search"]))
 {
  global $conn;
  if($conn->connect_error)
  {
   die("connection failed:".$conn->connect_error);
  }
  else
  { 
   if(empty($_POST["Id"])) 
   {		 
	$IdErr = "Id is required"; 
	#$errfield="R_No is required";
	#$errfieldc="text-danger";	
	#echo '<label class="col-form-label col-12 text-danger font-weight-bold text-center" for="name">'.$errfield.'</label>';	  	  
   }     
   else
   {	
	$Id = test_input1($_POST["Id"]);		
	$sql="select * from module_name2 where Id='".$Id."'";		
	$result=$conn->query($sql);		
 
	 if($result->num_rows >0)
	 {
	  while($row=$result->fetch_assoc())
	  {
		$Id = $row["Id"];
		$ColumnName1 = $row["ColumnName1"];			
		$ColumnName2 = $row["ColumnName2"];
		$ColumnName3 = $row["ColumnName3"];
		$ColumnName4 = $row["ColumnName4"];
		$ColumnName5  = $row["ColumnName5"];			
	  }		  
	 }
	 else
	 { 	  
		#echo "NO RECORD FOUND";
		#$errfield="No Record Found";
		#$errfieldc="text-danger";
	 }	
	}	
   }
  $conn->close();
 }
   
function test_input1($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html/>
<html>
	<head>
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
	<style>
		.error 
		{
			color: #FF0000;
		}
		.csitfont {
            font-family: Arial, Helvetica, sans-serif;
			font-Size:18px;
			
        }
		.banner
        {
            padding: 30px;
            background-color:#445FBB;
            color: white;
            font-family: Arial;
            font-size: 25px;
            font-weight: bold;
            text-align: center;
        }
	</style>
	<script>
         jQuery(document).ready(function ($) 
		 {
             $("#datepicker").datepicker({ dateFormat: "dd/mm/yy" }).val();
			 $("#datepicker1").datepicker({ dateFormat: "dd/mm/yy" }).val();

        });
     </script>

	<body style="background-color:lavender">
		<div class="banner">Brain Cancer Prediction Using Random Forest, SVM, and Naive Bayes Classifiers</div>	
		
					
		<div class="container-fluid">
			
		<div class="row">
		<div class="col-sm-4"></div>
			
			<div class="col-4 card card-info">
			<br>
				<div class=" " style="background-color: #3b5998;">
					<h5 class="card-header card-title  text-white text-center" style="font-family: arial">Brain Cancer</h5>
				</div>
				<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					<div class="card-body">
					
					<div class="form-group">
					<div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">Id</label>
						<input type="text" id="Id" value="<?php if(isset($Id)) echo $Id;?>" class="form-control col-9" name="Id" placeholder="" autocomplete="off">
						<span class="error">* <?php echo $IdErr;?></span>
					</div>
					</div>		
					
					<div class="form-group">
					<div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">Tumor Size</label>
						<input type="text" focus value="<?php if(isset($ColumnName1)) echo $ColumnName1;?>" id="ColumnName2" class="form-control col-9" name="ColumnName1" placeholder="" autocomplete="off">
						<span class="error">* <?php echo $ColumnName1Err;?></span>
					</div>
					</div>
					
					<div class="form-group">
					<div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">Cells</label>
						<input type="text" value="<?php if(isset($ColumnName2)) echo $ColumnName2;?>" id="ColumnName2" class="form-control col-9" name="ColumnName2" placeholder="" autocomplete="off">
						<span class="error">* <?php echo $ColumnName2Err;?></span>
					</div>
					</div>
					
					<div class="form-group">
					<div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">Brain</label>
						<input type="text" value="<?php if(isset($ColumnName3)) echo $ColumnName3;?>" id="ColumnName3" class="form-control col-9" name="ColumnName3" placeholder="" autocomplete="off">
						<span class="error">* <?php echo $ColumnName3Err;?></span>
					</div>
					</div>
					
					
					<div class="form-group">
					<div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">Nervous Systems</label>
						<input type="text" value="<?php if(isset($ColumnName4)) echo $ColumnName4;?>" id="ColumnName4" class="form-control col-9" name="ColumnName4" placeholder="" autocomplete="off">
						<span class="error">* <?php echo $ColumnName4Err;?></span>
					</div>
					</div>
					<div class="form-group">
					<div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">Cancerous</label>
					</div>
					<div class="form-group">
						<input type="text" value="<?php if(isset($ColumnName5)) echo $ColumnName5;?>" id="ColumnName5" class="form-control col-9" name="ColumnName5" placeholder="" autocomplete="off">
						<span class="error">* <?php echo $ColumnName5Err;?></span>
					</div>
					</div>
					<div class="form-group">
					<div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">Non-Cancerous</label>
					</div>
					</div>
					<div class="form-group">
						<input type="text" value="<?php if(isset($ColumnName5)) echo $ColumnName5;?>" id="ColumnName6" class="form-control col-9" name="ColumnName6" placeholder="" autocomplete="off">
						<span class="error">* <?php echo $ColumnName5Err;?></span>
					</div>
					</div>
					<div class="form-group">
					<div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">Spread Level</label>
					</div>
					</div>
					<div class="form-group">
						<input type="text" value="<?php if(isset($ColumnName5)) echo $ColumnName5;?>" id="ColumnName7" class="form-control col-9" name="ColumnName7" placeholder="" autocomplete="off">
						<span class="error">* <?php echo $ColumnName5Err;?></span>
					</div>
					</div>
					
					
					<br>					
					<input type="submit" class="ml-0 csitfont badge-pill btn bg-success text-white font-weight-bold" name="ins" value="Insert">
					<input type="submit" class="csitfont badge-pill btn bg-primary text-white font-weight-bold" name="search" value="Find">
					<input type="submit" class="csitfont badge-pill btn bg-success text-white font-weight-bold" name="up" value="Update">
					<input type="submit" class="csitfont badge-pill btn bg-danger text-white font-weight-bold" name="del" value="Delete">					
					<input type="submit" class="csitfont badge-pill btn bg-primary text-white font-weight-bold" name="show" value="ShowAll">
					
					<!--
					<input type="reset" class="csitfont badge-pill btn bg-info text-white font-weight-bold" name="reset" value="Clear">
					-->
					
					
					<label class="col-form-label col-12 font-weight-bold <?php if(isset($errfieldc)) echo $errfieldc;?> bold text-center" for="name"><?php if(isset($errfield)) echo $errfield;?></label>						
					 <a class="float-right font-weight-bold" href="Main.php">Back</a><br />   
					
<?php 

 $conn=new mysqli("localhost", "root","","Project");
 if(isset($_POST["show"]))
 {
  show();
 }
 else if(isset($_POST["search"]))
 {
  search();
 }
 function show()
 {
  global $conn;
  if($conn->connect_error)
  {
   die("connection failed:".$conn->connect_error);
  }
  else
  { 
   $sql="select * from module_name2";
   echo '<table border="1" cellspacing="0" class="table-responsive" cellpadding="5" style="color:green"> 
        <tr> 
			<td><b> <font face="Arial">Id</font> </td> 
			<td><b> <font face="Arial">Tumor Size</font> </td>	
			<td><b> <font face="Arial">Cells</font> </td>	
			<td><b> <font face="Arial">Brain</font> </td>	
			<td><b> <font face="Arial">Nervous Systems</font> </td>	
			<td><b> <font face="Arial">Cancerous</font> </td> 
            <td><b> <font face="Arial">Non-Cancerous</font> </td>	
			<td><b> <font face="Arial">Spread Level</font> </td>			
        </tr>
	   ';	  
   $result=$conn->query($sql);
   $rowcount=mysqli_num_rows($result);
   echo "Result set has %d rows.\n",$rowcount;
 
   if($result->num_rows >0)
   {
    while($row=$result->fetch_assoc())
    {
     $field1name = $row["Id"];
     $field2name = $row["ColumnName1"];
     $field3name = $row["ColumnName2"];
     $field4name = $row["ColumnName3"];
     $field5name = $row["ColumnName4"];
     $field6name = $row["ColumnName5"];

     echo '<tr> 
			<td>'.$field1name.'</td> 
			<td>'.$field2name.'</td> 
			<td>'.$field3name.'</td> 
            <td>'.$field4name.'</td> 
			<td>'.$field5name.'</td> 
			<td>'.$field6name.'</td> 		
		</tr>
		';  
	}
   }  
   else
   {
    #echo "NO RECORD FOUND";
    $errfield="No Record Found";
    $errfieldc="text-danger";	
    echo '<label class="col-form-label col-12 text-danger font-weight-bold text-center" for="name">'.$errfield.'</label>';
   }
 }
 $conn->close();
 }
 
 function search()
 {
  global $conn;
  if($conn->connect_error)
  {
   die("connection failed:".$conn->connect_error);
  }
  else
  { 
	$Id = test_input($_POST["Id"]);		
	$sql="select * from module_name2 where Id='".$Id."'";		
	echo '<table border="1" cellspacing="5" class="table table-responsive table-striped " cellpadding="2" style="color:green"> 
          <tr> 
			<td><b> <font face="Arial">Id</font> </td> 
			<td><b> <font face="Arial">Tumor Size</font> </td>	
			<td><b> <font face="Arial">Cells</font> </td>	
			<td><b> <font face="Arial">Brain</font> </td>	
			<td><b> <font face="Arial">Nervous Systems</font> </td>	
			<td><b> <font face="Arial">Cancerous</font> </td>
			<td><b> <font face="Arial">Non-Cancerous</font> </td>	
			<td><b> <font face="Arial">Spread Level</font> </td>
          </tr>
		 ';	  
	$result=$conn->query($sql);
	$rowcount=mysqli_num_rows($result);
	printf("Result set has %d rows.\n",$rowcount);
 
	if($result->num_rows >0)
	{
	 while($row=$result->fetch_assoc())
	 {
	    $Id = $row["Id"];
	    $ColumnName1 = $row["ColumnName1"];
	    $ColumnName2 = $row["ColumnName2"];
		$ColumnName3 = $row["ColumnName3"];
		$ColumnName4 = $row["ColumnName4"];
		$ColumnName5 = $row["ColumnName5"];

		echo '<tr> 
				<td>'.$Id.'</td> 
				<td>'.$ColumnName1.'</td> 
				<td>'.$ColumnName2.'</td> 
				<td>'.$ColumnName3.'</td> 
				<td>'.$ColumnName4.'</td> 
				<td>'.$ColumnName5.'</td> 
				</tr>
			';  
	 }
	}
	else
	{ 
	 #echo "NO RECORD FOUND";
	 $errfield="No Record Found";
	 $errfieldc="text-danger";	
	 echo '<label class="col-form-label col-12 text-danger font-weight-bold text-center" for="name">'.$errfield.'</label>';	  
	}	
  }	
  $conn->close();
 }
 
 
 function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
				</div>	
			</form>
		</div>
		

	

		</div>
	</div>
	
	</body>
</html>


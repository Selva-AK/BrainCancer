<?php
 $conn=new mysqli("localhost", "root","","Project");
 
 $Id = $ColumnName1 = $ColumnName2 = $ColumnName3 = $ColumnName4 = $ColumnName5 = $ImgUrl="";
 $IdErr = $ColumnName1Err = $ColumnName2Err = $ColumnName3Err = $ColumnName4Err = $ColumnName5Err = "";
 $ColumnName1="OPT1";
 
 if(isset($_POST["ins"]))
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
 
   else
   {	
	$Id = test_input1($_POST["Id"]);
	$ColumnName1 = test_input1($_POST["ColumnName1"]);
	$ColumnName2 = test_input1($_POST["ColumnName2"]);
	$ColumnName3 = test_input1($_POST["ColumnName3"]);
	$ColumnName4 = test_input1($_POST["ColumnName4"]);	
		
	$sql="select * from module_name6 where Id='".$Id."'";		
	$result=$conn->query($sql);		
 
	if($result->num_rows >0)
	{
	 #update place  
	 $errfield="Already Record Found";
	 $errfieldc="text-danger";
	}
	else
	{
	 $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma", "pdf", "doc", "docx");
	 $extension = pathinfo($_FILES['file1']['name'], PATHINFO_EXTENSION);

	 if ((($_FILES["file1"]["type"] == "video/mp4")
		|| ($_FILES["file1"]["type"] == "audio/mp3")
		|| ($_FILES["file1"]["type"] == "audio/wma")
		|| ($_FILES["file1"]["type"] == "application/msword")
		|| ($_FILES["file1"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
		|| ($_FILES["file1"]["type"] == "application/pdf")
		|| ($_FILES["file1"]["type"] == "image/jpg")
		|| ($_FILES["file1"]["type"] == "image/gif")
		|| ($_FILES["file1"]["type"] == "image/png")
		|| ($_FILES["file1"]["type"] == "image/jpeg"))
		&& ($_FILES["file1"]["size"] < 800000000)
		&& in_array($extension, $allowedExts))

		{
		if ($_FILES["file1"]["error"] > 0)
		{
		  echo "Return Code: " . $_FILES["file1"]["error"] . "<br />";
		}
		else
		{
		 #echo "Upload: " . $_FILES["file1"]["name"] . "<br />";
		 #echo "Type: " . $_FILES["file1"]["type"] . "<br />";
		 #echo "Size: " . ($_FILES["file1"]["size"] / 1024) . " Kb<br />";
		 #echo "Temp file: " . $_FILES["file1"]["tmp_name"] . "<br />";

		 if (file_exists("uploads/" . $_FILES["file1"]["name"]))
		 {
		  echo $_FILES["file1"]["name"] . "Image already exists. ";
		 }
		 else
		 { 
		  move_uploaded_file($_FILES["file1"]["tmp_name"],"uploads/" . $_FILES["file1"]["name"]);      
		  #echo "Stored in: " . "uploads/" . $_FILES["file1"]["name"];
         }
        }

		$ColumnName5="uploads/" .$_FILES["file1"]["name"];
		if($ColumnName5=="uploads/"){$ColumnName5="";}
		
		echo $ColumnName5;
		#insert place
		$sql="INSERT INTO module_name6(Id,ColumnName1,ColumnName2,ColumnName3,ColumnName4,ColumnName5)VALUES('$_POST[Id]','$_POST[ColumnName1]','$_POST[ColumnName2]','$_POST[ColumnName3]','$_POST[ColumnName4]','$ColumnName5')";
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
	
   	
	$Id = test_input1($_POST["Id"]);
	$ColumnName1 = test_input1($_POST["ColumnName1"]);
	$ColumnName2 = test_input1($_POST["ColumnName2"]);
	$ColumnName3 = test_input1($_POST["ColumnName3"]);
	$ColumnName4 = test_input1($_POST["ColumnName4"]);	
		
	$sql="select * from module_name6 where Id='".$Id."'";			
	$result=$conn->query($sql);	

	if($result->num_rows >0)
	{
	  while($row=$result->fetch_assoc())
	  {
		$ImgUrl = $row["ColumnName5"];
	  }	

	  if($_FILES["file1"]["name"]=="")
	  {
		$ColumnName5=$ImgUrl;
	  }
	  else
	  {
	    $ColumnName5="uploads/" .$_FILES["file1"]["name"]; if($ColumnName5=="uploads/"){$ColumnName5="";}
	    move_uploaded_file($_FILES["file1"]["tmp_name"],"uploads/" . $_FILES["file1"]["name"]);
	    unlink($ImgUrl);
	  }

	  $sql="update module_name6 set ColumnName1='".$ColumnName1."',ColumnName2='".$ColumnName2."',ColumnName3='".$ColumnName3."',ColumnName4='".$ColumnName4."', ColumnName5='".$ColumnName5."' where Id='".$Id."'";
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
   	$sql="select * from module_name6 where Id='".$Id."'";		
	$result=$conn->query($sql);
	if($result->num_rows >0)
	{
	 while($row=$result->fetch_assoc())
     {
	  $ImgUrl = $row["ColumnName5"];	
	 }
	
	$sql="delete from module_name6 where Id='".$Id."'";
	if($conn->query($sql)===true)
	{
	 if($ImgUrl!="")
	 unlink($ImgUrl);
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
	$sql="select * from module_name6 where Id='".$Id."'";		
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
		<div class="banner"> PROJECT TITLE</div>	
		<br>
					
		<div class="container-fluid">
			
		<div class="row">
			<div class="col-sm-4"/></div>
			<div class="col-sm-4 card card-info">
			<br>
				<div class=" " style="background-color: #3b5998;">
					<h5 class="card-header card-title  text-white text-center" style="font-family: arial">Module Name</h5>
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
					<div class="row container-fluid">						
						<div class="container-fluid col-4">Field1</div>
							<div class="col-4">														
                                <input type="radio" class="form-check-input" name="ColumnName1" value="OPT1" <?php if($ColumnName1=='OPT1'){ echo "checked=checked";}  ?>>OPT1                            
							</div>
							<div class="col-4">                            
                                <input type="radio" class="form-check-input" name="ColumnName1" value="OPT2" <?php if($ColumnName1=='OPT2'){ echo "checked=checked";}  ?>>OPT2                            
							</div>
						</div>
					</div>
					</div>					
					
					<div class="form-group">
					<div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">Field2</label>
						<input type="text" value="<?php if(isset($ColumnName2)) echo $ColumnName2;?>" id="ColumnName2" class="form-control col-9" name="ColumnName2" placeholder="" autocomplete="off">
						<span class="error">* <?php echo $ColumnName2Err;?></span>
					</div>
					</div>
					
					<div class="form-group">
					<div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">Field3</label>
                        <select class="form-control col-9 mr-2" name="ColumnName3" title="Select Facility">						
                            <option value="<?php echo $ColumnName3;?>" selected><?php if(isset($ColumnName3)) echo $ColumnName3."select"; else {echo "Select";}?></option>
                            <option value="OPT1">OPT1</option>
							<option value="OPT2">OPT2</option>
                            <option value="OPT3">OPT3</option>                            
                        </select>
                    </div>
					</div>		
					
					<div class="form-group">
					<div class="input-group">
						<label class="col-form-label mr-1 col-3" for="name">Field4</label>
						<input type="text" value="<?php if(isset($ColumnName4)) echo $ColumnName4;?>" id="datepicker1" class="form-control col-9" name="ColumnName4" placeholder="" autocomplete="off">
						<span class="error">* <?php echo $ColumnName4Err;?></span>
					</div>
					</div>
					<br>					
					
					<div class="row container-fluid form-group input-group">
					 <input type="file" name="file1" id="file1"><br>						
					 <img src="<?= $ColumnName5; ?>" height="75px" width="75px" name="ColumnName5"/>
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
					</div>	
					
					<label class="col-form-label col-12 font-weight-bold <?php if(isset($errfieldc)) echo $errfieldc;?> bold text-center" for="name"><?php if(isset($errfield)) echo $errfield;?></label>						
					 <a class="float-right font-weight-bold" href="Main.php">Back</a><br />   
				</form>
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
   $sql="select * from module_name6";
   echo '<table border="1" cellspacing="0" class="table-responsive" cellpadding="5" style="color:green"> 
        <tr> 
			<td><b> <font face="Arial">Id</font> </td> 
			<td><b> <font face="Arial">Field1</font> </td>	
			<td><b> <font face="Arial">Field2</font> </td>	
			<td><b> <font face="Arial">Field3</font> </td>	
			<td><b> <font face="Arial">Field4</font> </td>	
			<td><b> <font face="Arial">Field5</font> </td>	
        </tr>
	   ';	  
   $result=$conn->query($sql);
   $rowcount=mysqli_num_rows($result);
   printf("Result set has %d rows.\n",$rowcount);
 
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
          <td><img height="50px" weight="50px" src='.$field6name.'><br><span>'.$field6name.'</span></td>
		</tr>
		';  
	}
	echo "</table>";
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
	$sql="select * from module_name6 where Id='".$Id."'";		
	echo '<table border="1" cellspacing="5" class="table table-responsive table-striped " cellpadding="2" style="color:green"> 
          <tr> 
			<td><b> <font face="Arial">Id</font> </td> 
			<td><b> <font face="Arial">Field1</font> </td>	
			<td><b> <font face="Arial">Field2</font> </td>	
			<td><b> <font face="Arial">Field3</font> </td>	
			<td><b> <font face="Arial">Field4</font> </td>	
			<td><b> <font face="Arial">Field5</font> </td>	
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
		#echo "<tr><td>".$row["Id"]."</td><td>".$row["ColumnName1"]." ".$row["ColumnName2"]."</td></tr>";
		echo '<tr> 
				<td>'.$Id.'</td> 
				<td>'.$ColumnName1.'</td> 
				<td>'.$ColumnName2.'</td> 
				<td>'.$ColumnName3.'</td> 
				<td>'.$ColumnName4.'</td> 
				<td><img height="50px" weight="50px" src='.$ColumnName5.'><br><span>'.$ColumnName5.'</span></td>
				
				</tr>
			';  
	 }
	 echo "</table>";
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
			<div class="col-sm-4"></div>
		</div>
		</div>
	</body>
</html>
		
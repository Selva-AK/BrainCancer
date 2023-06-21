<!DOCTYPE html/>
<html>
<head runat="server">
    <title>Main Page</title>
    <link rel="shortcut icon" type="image/png" href="images/mary.png" />
    <!-- Bootstrap 4 CDN -->
    <link rel="stylesheet" href="cdn/bootstrap.min.css" />
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
    <style>
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
	<script src="cdn1/datatables/jquery.dataTables.min.js"></script>
    <script src="cdn1/datatables/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="cdn1/css/adminlte.min.css" />
    <link rel="stylesheet" href="cdn1/css/AdminLTE1.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
    
<body style="background-color:lavender">
	<div class="banner">Brain Cancer Prediction Using Random Forest, SVM, and Naive Bayes Classifiers</div>
	<br>
	<form id="form1" runat="server">
		<div>
			<div class="row container-fluid">
			<div class="col-4"></div>
			
            <div class="col-sm-4 card">			
			<br>
			
			<div class="text-success font-weight-bold ">
			<?php session_start(); ?>
			<?php
			if(isset($_SESSION['user_Name']))
			{
				echo "Welcome &nbsp: &nbsp".$_SESSION['user_Name']."<br>";
				echo "Role &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :&nbsp     ".$_SESSION['role']."<br>";
				echo "E Mail  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp ".$_SESSION['email'].""; 				
				
				echo "<br>";
				
				if($_SESSION['role']=='Admin')
				{						
					echo '<a class="float-right" href="password.php">Change Password</a><br>';
				}
			}
			else
			{
				header("Location: login.html");  
			}
				
			echo '<a class="float-right" href="Logout.php">Logout</a>';
				
			?>
			</div>
			<br>
             
			<div class="card card-info">
				<div class="card-header bg-primary">
                    <h5 class="card-title  text-white text-center" style="font-family: arial;font-size:20px;font-weight:bold">Modules</h5>                       
                </div>
				
                <div class="card-body bg-dark " style="font-family:Arial; font-size:20px">
					
                <ul class="list-group-item"> <!--list-group-item-danger-->
				<?php				
					if($_SESSION['role']=='Admin')
					{
					echo '	<a href="Module1.php"><li class="list-group-item list-group-item-action text-danger text-center  font-weight-bold" 
							style="background-color: lavendar">Patient Information</li></a>
							
							<a href="Module2.php"><li class="list-group-item list-group-item-action text-danger text-center  font-weight-bold"
							style="background-color: aliaceblue">Brain Cancer</li></a>
							
							<a href="Module3.php"> <li class="list-group-item list-group-item-action text-danger text-center  font-weight-bold"
							style="background-color: lavendar">Surveillance Epidemiology</li></a>
							
							<a href="Module4.php"> <li class="list-group-item list-group-item-action text-danger text-center  font-weight-bold"
							style="background-color: aliaceblue">Classification Models</li></a>
					
							<a href="Module5.php"> <li class="list-group-item list-group-item-action text-danger text-center  font-weight-bold"
							style="background-color: aliaceblue">Tumor Prediction</li></a>
						';
					}
					else
					{
						echo '
						<a href="Module1.php"><li class="list-group-item list-group-item-action  text-center  font-weight-bold"
							style="background-color: aliaceblue">Patient Information</li></a>
							
							<a href="Module2.php"> <li class="list-group-item list-group-item-action  text-center  font-weight-bold"
							style="background-color: lavendar">Brain Cancer</li></a>
							
							<a href="Module3.php"> <li class="list-group-item list-group-item-action  text-center  font-weight-bold"
							style="background-color: aliaceblue">Surveillance Epidemiology</li></a>
						';
					}					
                ?>  
                </ul>
				</div>
            </div>
                  <a class="text-right float-right font-weight-bold" href="index.html">Back</a><br />              
			</div>
			 
            
            <div class="col-sm-4"></div>
			</div>
		
		</div>
    </form>
</body>
</html>





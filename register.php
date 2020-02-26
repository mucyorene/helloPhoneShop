<?php
	include("includes/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="js/script.js"></script>
	<title>HelloPhone</title>
	
</head>

<body style="overflow-y: scroll;">
	<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info fixed-top">
	<div class="container">
		<a class="navbar-brand" href="index.php">
			<h1 class="text-white">HelloPhone</h1>
		</a>
		<a class="navbar-brand" href="index.php">
		<!-- <p class="m-0 text-white text-center">WEDDING CATERING SERVICE MANAGEMENT SYSTEM</p> -->
		</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
  
		<div style="float: right;">
  
		  <div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav">
  
			  <li class="nav-item" id="nav-home">
				<a class="nav-link" href="index.php"><p class="m-0 text-center text-white">Home</p></a>
			  </li>
  
				<li class="nav-item" id="nav-about">
				<a class="nav-link" href="About.php"><p class="m-0 text-center text-white">About</p></a>
			  </li>
  
				<li class="nav-item" id="nav-contact">
					<a class="nav-link" href="contact.php"><p class="m-0 text-center text-white">Contact</p></a>
				  </li>
				  <li class="nav-item" id="nav-about">
					<a class="nav-link" href="register.php"><p class="m-0 text-center text-white">Register</p></a>
				  </li>
			</ul>
			</div>
		 </div>
	</div>
</nav><br><br><br><br>
	<div class="container">
		<div class="row">
            <div class="col-md-3"></div>
			<div class="col-md-6">
				<fieldset>
					<legend class="text-info">CREATE AN ACCOUNT</legend>
					<?php
			if (isset($_POST['register'])) {
				$a = mysqli_real_escape_string($conn,$_POST['names']);
				$b = mysqli_real_escape_string($conn,$_POST['emails']);
				$c = mysqli_real_escape_string($conn,$_POST['dob']);
				$d = mysqli_real_escape_string($conn,$_POST['gender']);
				$e = mysqli_real_escape_string($conn,$_POST['usernames']);
				$f = mysqli_real_escape_string($conn,$_POST['passwords']);
				$g = mysqli_real_escape_string($conn,$_FILES['pic']['name']);
				$chick = mysqli_query($conn,"SELECT *FROM customers WHERE email = '$b' AND username = '$e'") or die(mysqli_error($conn));
				if (mysqli_num_rows($chick)>0) {
					echo "<h4 class='alert alert-danger'>User already registered</h4>";
				}else{
					$insert = mysqli_query($conn,"INSERT INTO customers (id,names,email,dob,gender,username,password,profiles)
				VALUES ('','$a','$b','$c','$d','$e','$f','$g')") or die(mysqli_error($conn));
				if ($insert) {
					move_uploaded_file($_FILES['pic']['tmp_name'],'media/images/'.$g);
					echo "<h4 class='alert alert-success'>Thank you for creating account <a href='index.php'>Login</a></h4>";
				}else{
					echo "<h4 class='alert alert-success'>Failed to create account</h4>";
				}
				}
			}
			?>
					<form action="" name="regForm" onclick="return validateRegister();" class="form" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="" class="form-control-label text-dark">Names</label>
							<input type="text" name="names" class="form-control" placeholder="Names" id="">
							<span id="messageNames" class="text-danger"></span>
						</div>
						<div class="form-group">
							<label for="" class="form-control-label text-dark">Email</label>
							<input type="email" name="emails" class="form-control" placeholder="example: yourname@helloPhone.rw" id="">
						  <span id="messageEmails" class="text-danger"></span>
						</div>
						<div class="form-group">
							<label for="" class="form-control-label text-dark">DOB</label>
							<input type="date" name="dob" required class="form-control" id="">
							<span id="messageDob" class="text-danger"></span>
						</div>
						<div class="form-group">
							<label for="" class="form-control-label text-dark">Gender</label>
							<select name="gender" class="form-control" required>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Other">Other</option>
							</select>
						</div>
						<div class="form-group">
							<label for="" class="form-control-label text-dark">Username</label>
							<input type="text" name="usernames" placeholder="Username" class="form-control" id="">
							<span id="messageUsername" class="text-danger"></span>
            </div>
                        
						<div class="form-group">
							<label for="" class="form-control-label text-dark">Password</label>
							<input type="password" name="passwords" placeholder="Password" class="form-control" id="">
							<span id="messagePassword" class="text-danger"></span>
            </div>        
						<div class="form-group">
							<label for="" class="form-control-label text-dark">Profile</label>
							<input type="file" name="pic" class="form-control" required>
            </div>

						<div class="form-group">
							<input type="submit" value="Send" name="register" class="btn btn-info btn-sm">
							<input type="reset" value="Reset Form"  class="btn btn-secondary btn-sm">
						</div>
					</form>
				</fieldset>
            </div>
            <div class="col-md-3"></div>
		</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-default bg-info" style="height:40px;">
		<div class="container">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
			  <div class="row">
				<div class="col-md-12" style="color:white;">
					&copy Alright Reserved by SIMBI Maryse
				</div>
				</div>
			  </div>
		  </div>
		  <div class="col-md-3"></div>
		</div>
	  </nav>
</body>
</html>
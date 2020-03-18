<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
	<script src="../vendor/jquery/jquery.min.js"></script>
	<style>
		.active{
			background-color:#ffc107;
			transition-duration:0.5s;
		}
		.nav-item:hover{
			background-color:#ffc107;
			transition-duration:0.5s;
		}
	</style>
	<title>HelloPhone</title>
</head>
<body style="overflow-y: scroll;">
	<!-- Navigation -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-secondary fixed-top" style="height:40px;">
		<div class="container">
			<a class="navbar-brand" href="../index.php">
				<h1 class="text-warning">HelloPhone</h1>
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
					<a class="nav-link" href="../index.php"><p class="m-0 text-center text-white">Home</p></a>
				  </li>
	  
					<li class="nav-item" id="nav-about">
					<a class="nav-link active" href="About.php"><p class="m-0 text-center text-white">About</p></a>
				  </li>
	  
					<li class="nav-item" id="nav-contact">
						<a class="nav-link" href="contact.php"><p class="m-0 text-center text-white">Contact</p></a>
					  </li>
					  <li class="nav-item" id="nav-about">
							<a class="nav-link" href="Login.php"><p class="m-0 text-center text-white">Login</p></a>
						</li>
						<li class="nav-item" id="nav-contact">
					    <a class="nav-link" href="cart.php"><p class="m-0 text-center text-white">
							Cart <span class="badge badge-warning text-danger">13</span></p></a>
				    </li>
				</ul>
				</div>
			 </div>
		</div>
	</nav><br><br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
              <img src="../Photos/about.jfif" style="width: 1250px;height: 300px;" alt=""><br>
              <div class="row">
                  <div class="col-md-6 text-center">
                      <h1>Our Mission </h1>
                      <br>
                      <p align="center">Our mission is to increase the the phone users by 2025</p>
                  </div>
                  <div class="col-md-6 text-center">
                      <h1>Vision</h1>
					  <p>This is the website for the phones, where we want to spread the number of <br>
						Techno phones to the huge number of people
                  </div>
              </div>
          </div>
  </div>
</div>
	<nav class="navbar navbar-expand-lg navbar-default bg-secondary fixed-bottom"  style="height:30px;">
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
<script type="text/javascript">
		$(function(){
			$("#admin1").addClass('active');
		});
	</script>
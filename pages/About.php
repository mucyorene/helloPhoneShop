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
	<?php include("../includes/indexNav.php");?>
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
			$("#h1").addClass('active');
		});
	</script>
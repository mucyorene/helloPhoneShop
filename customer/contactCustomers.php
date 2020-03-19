<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>HelloPhone |</title>
	<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/jquery/jquery.min.js"></script>	
</head>
<body style="overflow-y: scroll;">
	<!-- Navigation -->
	<?php
include("../includes/navCustomers.php");
?>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<fieldset>
					<legend><h2 class="text-info">YOUR FEEDBACK</h2></legend>
					<form action="" class="form">
						<div class="form-group">
							<label for="" class="form-control-label">Your names</label>
							<input type="text" name="" placeholder="Your names" class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="" class="form-control-label">Your email</label>
							<input type="email" name="" placeholder="Your Email" class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="" class="form-control-label">Your comment</label>
							<textarea name="" placeholder="Type..." id="" cols="5" rows="5" class="form-control"></textarea>
						</div>
						<button class="btn btn-info btn-sm">Send</button>
					</form>
				</fieldset>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-default bg-secondary fixed-bottom" style="height:30px;">
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
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
	$(function(){
		$("#cContact").addClass('active');
	});
</script>
<?php
include("../includes/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<title>HelloPhone</title>
	<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
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
</head>
<body style="overflow-y: scroll;">

	<?php include("../includes/indexNav.php");?>

	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<fieldset>
					<legend><h2 class="text-info">YOUR FEEDBACK</h2></legend>
					<?php
						if (isset($_POST['send'])) {
							$a = mysqli_real_escape_string($conn,$_POST['names']);
							$b = mysqli_real_escape_string($conn,$_POST['emails']);
							$c = mysqli_real_escape_string($conn,$_POST['comments']);
							$ch = mysqli_query($conn,"SELECT *FROM feedbacks WHERE names = '$a' AND contents ='$c'") or die(mysqli_error());
							if(mysqli_num_rows($ch)>0){
								echo "<h4 class='alert alert-danger'>Already registered</h4>";
							}else{
								$query = mysqli_query($conn,"INSERT INTO feedbacks (id,names,emails,contents)
							VALUES ('','$a','$b','$c')") or die(mysqli_error());
							if ($query) {
								echo "<h4 class='alert alert-success'>Thank you for contacting us!</h4>";								
							}	
							}			
						}
					?>
					<form action="" method="POST" name="contact" class="form">
						<div class="form-group">
							<label for="" class="form-control-label">Your names</label>
							<input type="text" name="names" required placeholder="Your names" class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="" class="form-control-label">Your email</label>
							<input type="email" name="emails" required placeholder="Your Email" class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="" class="form-control-label">Your comment</label>
							<textarea name="comments" placeholder="Type..." required id="" cols="5" rows="5" class="form-control"></textarea>
						</div>
						<input type="submit" class="btn btn-info btn-sm" name="send" value="Send">
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
		
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>	
</body>
</html>
<script type="text/javascript">
		$(function(){
			$("#h2").addClass('active');
		});
	</script>
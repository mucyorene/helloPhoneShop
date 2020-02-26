<?php
	include("includes/connect.php");
	session_start();
	if (!$_SESSION['adminLogin']) {
		echo "<script type='text/javascript'>window.top.location='index.php'</script>";
        }
        $id = $_SESSION['adminLogin'];
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>HelloPhone |</title>
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/jquery/jquery.min.js"></script>	
</head>
<body style="overflow-y: scroll;">
	<!-- Navigation -->
	<?php
include("includes/navAdmin.php");
?>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<fieldset>
					<legend><h2 class="text-info">YOUR SETTINGS</h2></legend>
                    <?php
                        $sele = mysqli_query($conn,"SELECT *FROM admin WHERE id = '$id'") or die(mysqli_error());
                        $fes = mysqli_fetch_array($sele);

                        if (isset($_POST['edits'])) {
                            $a = mysqli_real_escape_string($conn,$_POST['uname']);
                            $b = mysqli_real_escape_string($conn,$_POST['pass']);
                            $c = mysqli_real_escape_string($conn,$_POST['pass1']);                            
                        $ch1 = mysqli_query($conn,"SELECT password FROM admin WHERE id = '$id'") or die(mysqli_error());  
                        $fe = mysqli_fetch_array($ch1);
                        if ($c != $fe['password']) {
                           echo "<h4 class='alert alert-danger'>Current password doesn't exist</h4>";
                        }else{
                            if (!empty($c)) {
                                $upd=mysqli_query($conn,"UPDATE admin SET password = '$b' WHERE id = '$id'") or die(mysqli_error($conn));
                                echo "<h4 class='alert alert-success'>Password changed</h4>";
                            }
                        }    
                        }

                    ?>
					<form action="" class="form" method="POST">
                    <div class="form-group">
							<label for="" class="form-control-label">Username</label>
							<input type="text" name="uname" value="<?= $fes['username']?>" class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="" class="form-control-label">Current Password</label>
							<input type="password" name="pass1" class="form-control" id="">
						</div>
						<div class="form-group">
							<label for="" class="form-control-label">New Password</label>
							<input type="password" name="pass" class="form-control"></div>
						<input type="submit" class="btn btn-info btn-sm" value="Edit" name="edits">
					</form>
				</fieldset>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-default bg-info fixed-bottom" style="height:40px;">
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
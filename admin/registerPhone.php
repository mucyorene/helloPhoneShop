<?php
	include("../includes/connect.php");
	session_start();
	if (!$_SESSION['adminLogin']) {
		echo "<script type='text/javascript'>window.top.location='../index.php'</script>";
		}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
	<script src="../vendor/jquery/jquery.min.js"></script>
	<title>HelloPhone</title>
	
</head>
<body style="overflow-y: scroll;">
	<!-- Navigation -->
	<?php
include("../includes/navAdmin.php");
?>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<fieldset>
					<legend><h2 class="text-info">ADD NEW PHONE</h2></legend>
					<?php
						if (isset($_POST['register'])) {
							$a = mysqli_real_escape_string($conn,$_POST['phoneNames']);
							$b = mysqli_real_escape_string($conn,$_POST['price']);
							$c = mysqli_real_escape_string($conn,$_POST['descriptions']);
							$d = mysqli_real_escape_string($conn,$_FILES['pic']['name']);
							$e = mysqli_real_escape_string($conn,$_POST['qty']);														
							$ch = mysqli_query($conn,"SELECT *FROM phones WHERE phoneName = '$a' AND phoneDescriptions = '$b'") or die(mysqli_error($conn));
						if (mysqli_num_rows($ch)>0) {
							echo "<h4 class='alert alert-danger'>Phone already registered</h4>";
						}else{
							$queryInsert = mysqli_query($conn,"INSERT INTO phones (id,phoneName,price,phoneDescriptions,phoneImange,quantity)
							VALUES ('','$a','$b','$c','$d','$e')") or die(mysqli_error($conn));
							if ($queryInsert) {
								move_uploaded_file($_FILES['pic']['tmp_name'],'../media/phonePhoto/'.$d);
								echo "<h4 class='alert alert-success'>Phone registered successfully</h4>";
							}else{
								echo "<h4 class='alert alert-danger'>Phone not registered</h4>";
							}
						}
						}
					?>
					<form action="" name="phoneRegister" class="form" method="POST" onsubmit="return validatePhone();" enctype="multipart/form-data">
						<div class="form-group">
							<label for="" class="form-control-label">Phone name</label>
							<input type="text" name="phoneNames" placeholder="Names" class="form-control" id="">
							<span class="text-danger" id="messagePhone"></span>
						</div>
						<div class="form-group row">
							<div class="col-md-4">
							<label for="" class="form-control-label">Phone price</label>
							</div>
							<div class="col-md-4">
							<input type="number" name="price" placeholder="Price" class="form-control" id="">
							</div>
							<div class="col-md-4">
							<input type="number" placeholder="/Rwf" class="form-control" disabled>
							</div>
							<div class="col-md-4"></div>
							<div class="col-md-8">
							<span class="text-danger" id="messagePrice"></span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">
							<label for="" class="form-control-label">Phone Quantity</label>
							</div>
							<div class="col-md-8">
							<input type="number" name="qty" placeholder="Quantity" class="form-control" id="">
							<span class="text-danger" id="messageQuantity"></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="form-control-label">Descriptions</label>
							<textarea name="descriptions" placeholder="Type..." id="" cols="5" rows="5" class="form-control"></textarea>
							<span class="text-danger" id="messageDesc"></span>
						</div>
						<div class="form-group">
							<label for="" class="form-control-label">Thumbnail</label>
							<input type="file" class="form-control" required name="pic">
						</div>
						<input type='submit' class="btn btn-info btn-sm" name="register" value="Register">
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
	function validatePhone(){
	 if (document.phoneRegister.phoneNames.value == "") {
		document.phoneRegister.phoneNames.focus();
		document.getElementById("messagePhone").innerHTML = "Phone name is required";
		return false;
	 }else{
		document.getElementById("messagePhone").innerHTML = "";
	 }
	 if (document.phoneRegister.price.value == "") {
		document.phoneRegister.price.focus();
		document.getElementById("messagePrice").innerHTML = "Record price please!";
		return false;
	 }else{
		document.getElementById("messagePrice").innerHTML = "";
	 }
	 if (document.phoneRegister.qty.value == "") {
		document.phoneRegister.qty.focus();
		document.getElementById("messageQuantity").innerHTML = "Record quantity please!";
		return false;
	 }else{
		document.getElementById("messageQuantity").innerHTML = "";
	 }
	 if (document.phoneRegister.descriptions.value == "") {
		document.phoneRegister.descriptions.focus();
		document.getElementById("messageDesc").innerHTML = "Add some descriptions";
		return false;
	 }else{
		document.getElementById("messageDesc").innerHTML = "";
	 }
	 return true;
	}
</script>
<script>
    $(function(){
        $("#admin4").addClass('active');
    });
</script>
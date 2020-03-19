<?php
	include("../includes/connect.php");
	session_start();
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

	<?php include("../includes/indexNav.php");?>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
            <fieldset>
                <legend class="text-info">Login Here</legend>
                <?php
                    if (isset($_POST['login'])) {
                        $a = mysqli_real_escape_string($conn,$_POST['username']);
                        $b = mysqli_real_escape_string($conn,$_POST['password']);							
                        $query = mysqli_query($conn,"SELECT *FROM admin WHERE username = '$a' AND password='$b'") or die(mysqli_error());
                        $query2 = mysqli_query($conn,"SELECT *FROM customers WHERE username = '$a' AND password='$b'") or die(mysqli_error());
                    if (mysqli_num_rows($query)>0) {
                        $row = mysqli_fetch_array($query);
                        $_SESSION['adminLogin'] = $row['id'];
                        ?>
                        <script type="text/javascript">
                            window.top.location = "../admin/admin.php";
                        </script>
                        <?php
                    }else if(mysqli_num_rows($query2)>0){
                        $row = mysqli_fetch_array($query2);
                        $_SESSION['userLogin'] = $row['id'];
                        ?>
                        <script type="text/javascript">
                            window.top.location = "../customer/home.php";
                        </script>
                        <?php
                    }
                    else{
                        echo "<h6 class='alert alert-danger'>Incorrect username or password</h6>";
                    }
                    }
                ?>
                <form action="" class="form" method="POST">
                    <div class="form-group">
                        <label for="" class="form-control-label">Username</label>
                        <input type="text" name="username" class="form-control" required id="" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Password</label>
                        <input type="password" name="password" class="form-control" id="" placeholder="Password">
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-info btn-sm" name="login" value="Login">
                        <a href="register.php" class="btn btn-success btn-sm">Create account</a>
                    </div>
                        
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
<script type="text/javascript">
    $(function(){
        $("#h3").addClass('active');
    });
</script>
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
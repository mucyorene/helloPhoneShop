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
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <style>
		.active{
			background-color:#ffc107;
		}
		.nav-item:hover{
			background-color:#ffc107;
			transition-duration:0.3s;
		}
	</style>
    <title>Cart</title>
</head>
<body style="overflow-y: scroll;">
	
<?php include("../includes/indexNav.php");?>

<div class="container">
	<div class="row">
	<?php
	if($_GET['saveToCart']){
		$all=explode(',',$_GET['saveToCart']);
		$user = $all[0];
		$phoneId = $all[1];
		// echo $phoneId;
		// echo $user;
			$product = mysqli_query($conn,"SELECT *FROM phones WHERE id = '$phoneId'") or die(mysqli_error($conn));
				
			if (mysqli_num_rows($product)>0) {
				$checkExists = mysqli_query($conn,"SELECT *FROM cart WHERE productIds = '$phoneId'") or die(mysqli_error($conn));
				if (mysqli_num_rows($checkExists)>0) {
					echo "";
				}else{
					$fe = mysqli_fetch_array($product);
					$phoneName = $fe['phoneName'];
					$phonePrice = $fe['price'];
					$cart = mysqli_query($conn,"INSERT INTO
					cart (id,userId,productIds,productName,price,value,dateAdded) VALUES 
					('','$user','$phoneId','$phoneName','$phonePrice','1','')") 
					or die(mysqli_error($conn));
				}
			}
	}
	?>
		
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
		$("#h4").addClass('active');
	});
	</script>
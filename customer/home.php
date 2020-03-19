<?php
	include("../includes/connect.php");
	session_start();
	if (!$_SESSION['userLogin']) {
		echo "<script type='text/javascript'>window.top.location='../index.php'</script>";
		}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
	<script src="../vendor/jquery/jquery.min.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<title>HelloPhone</title>
</head>
<body style="overflow-y: scroll;">
	<!-- Navigation -->
<?php
include("../includes/navCustomers.php");
?>
		<div class="container">
		<div class="row">
		<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<input type="text" name="search" id="searchId" placeholder="Search here!" class="form-control">
						<span class="results"></span>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#searchId").keyup(function(){
							var values = $(this).val();
							//alert(values);
							if (values != '') {
								//alert(values);
								$(".results").html('');
								$.ajax({
									url:"fetchCustomer.php",
									method:"POST",
									data:{search:values},
									dataType:"text",
									success:function(response){
										$(".results").html(response);
									}
								});
							}
							else{
								$(".results").html('');
							}
						});
					});
				</script>
		  </div>&nbsp;
		 <div class="col-md-12">
			<?php
			$query = mysqli_query($conn,"SELECT *FROM phones ORDER BY id DESC") or die(mysqli_error($conn));
			if (mysqli_num_rows($query)>0) {
				$count;
					?>
					<div class="row">
					<?php while ($row = mysqli_fetch_array($query)) {?>
							<div class="col-md-3">
							  <div class="card">
								<img src="../media/phonePhoto/<?= $row['phoneImange'];?>" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title"><?= $row['phoneName']?></h5>
										<p class="card-text">
											<b>Price: </b><?= $row['price']?> <b>Rwf</b><br>
											<?php
												if ($row['quantity']>0) {?>
													<b>Quantity: </b><?= $row['quantity']?><br>
													<?php
												}else {
													?>
														<b>Quantity: </b><span class="text-danger"><b>Sold out</b></span><br>
													<?php
												}
											?>
											<b>About: </b><?= $row['phoneDescriptions']?><br>
										</p>
								</div>
								<?php
									if ($row['quantity']>0) {?>
										<a href="buyOut.php?idPhone=<?= rand()."fjs".rand()."ldfj".rand()."!".$row['id']."!".rand()."fskrellskj".rand();?>" class="btn btn-outline-info btn-sm btn-flat">Buy</a>
										<?php
									}else {
										?>
											<a disabled class="btn btn-outline-danger btn-sm btn-flat">Buy</a>
										<?php
									}
								?>
								
							   </div><br>
							</div>
					<?php
				}?>
				</div><br>
				<?php
			}else{
				echo "<h3 class='alert alert-success'>No phone available</h4>";
			}
			?>
			</div>
			</div>
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
	<script type="text/javascript">
		$(function(){
			$("#cHome").addClass('active');
		});
	</script>
</body>
</html>
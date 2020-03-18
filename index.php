<?php
session_start();
include("includes/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>HelloPhone</title>
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<script src="vendor/jquery/jquery.min.js"></script>
</head>
<body style="overflow-y: scroll;">
	<!-- Navigation -->
<?php
include("includes/nav.php");
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">
						<select name="" id="" class="form-control">
							<option value="">Categories</option>
						</select>
					</div>
					<div class="col-md-9">
						<input type="text" placeholder="Search here!" class="form-control">
					</div>
				</div>
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
								<img src="media/phonePhoto/<?= $row['phoneImange'];?>" class="card-img-top" alt="...">
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
										<?php
												if ($row['quantity']>0) {?>
													<button class="btn btn-sm btn-warning btn-flat">Add to cart <span class="fa fa-add"></span></button>
													<?php
												}else {
													?>
														<button disabled class="btn btn-sm btn-warning btn-flat">Add to cart <span class="fa fa-add"></span></button>
													<?php
												}
											?>
									<button data-toggle="modal" data-target="#<?= "view".$row['id']; ?>" class="btn btn-sm btn-outline-info btn-flat">More</button>
							    </div>
							   </div><br>
							</div>
								<div class="modal fade" id="<?= $fId ="view".$row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
								<?php
									$ids = explode('view',$fId);
									$real = $ids[1];
									$s = mysqli_query($conn,"SELECT *FROM phones WHERE id = '$real'") or die(mysqli_error($conn));
									$rs = mysqli_fetch_array($s);
								?>
								<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title text-info" id="exampleModalLongTitle"><?= $rs['phoneName']?></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
									<p><b>Descriptions: </b><?= $rs['phoneDescriptions']?></p><br>
									<p><b>Price: </b><?= $rs['price']?></p><br>
									<p>
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
									</p><br>
									<img src="media/phonePhoto/<?= $rs['phoneImange']?>" class="img" alt="">
									</div>
									
									</div>
								</div>
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
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
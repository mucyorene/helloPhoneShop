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
					<div class="col-md-12">
						<input type="text" name="search" id="searchId" placeholder="Search here!" class="form-control">
						<div class="results" class="text-danger"></div>
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
									url:"pages/fetch.php",
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
			 $page = ((isset($_GET['pageId'])) && is_numeric($_GET['pageId']))? $_GET['pageId'] :1;
			 $limits = 10;
			 $start = (($page-1)*$limits);
			  $query = mysqli_query($conn,"SELECT *FROM phones ORDER BY id DESC limit $start,$limits") or die(mysqli_error($conn));
				$size = mysqli_query($conn,"SELECT *FROM phones") or die(mysqli_error());
				$size = mysqli_num_rows($size);
				//some variable to be inserted
				$userId = $_SESSION['guest'] = 'guest';
				$proId=0;
				$proName = '';
				$qua = '';
				$tot  = 0;
			  if (mysqli_num_rows($query)>0) {
				$count;
					?>
					<div class="row">
					<?php while ($row = mysqli_fetch_array($query)) {?>
							<div class="col-md-3">
							  <div class="card">
								<a href="pages/details.php?idPro=<?= $row['id'];?>"><img src="media/phonePhoto/<?= $row['phoneImange'];?>" class="card-img-top" alt="..."></a>
								<div class="card-body">
									<h5 class="card-title"><a class='text-info' href="pages/details.php?idPro=<?= $row['id'];?>" style="text-decoration:none;"><?= $row['phoneName']?></a></h5>
										<p class="card-text">
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
											<b>Price: </b><span class="text-success"><?= $row['price']?></span> <b>Rwf</b><br>
											<b>About: </b><?= $row['phoneDescriptions']?><br>
										</p>
								</div>
										<?php
												if ($row['quantity']>0) {?>
													<a href="pages/cart.php?saveToCart=<?= $userId.",".$row['id']?>" class="btn btn-sm btn-info btn-flat text-white">Add to cart</a>
													<?php
												}else {
													?>
														<button disabled class="btn btn-danger btn-sm btn-flat text-white">Sold out!<span class="fa fa-add"></span></button>
													<?php
												}
											?>
									<!-- <button data-toggle="modal" data-target="#<?php // echo "view".$row['id']; ?>" class="btn btn-sm btn-outline-info btn-flat">More</button> -->
							    
							   </div><br>
								<?php
									$identifier = $_SESSION['guest'] = "guest";
									
									// if (isset($_GET['addToCart'])) {
									// 	$proId = $row['id'];
									// 	$proName = $row['phoneName'];
									// 	$qua = $row['quantity'];
									// 	$tot = $row['price'];
									// $addCart = mysqli_query($conn,"INSERT INTO cart (id,userId,productIds,productName,quantity,totalPrice,dateAdded) 
									// VALUES ('','$userId','$proId','$proName','$qua','$tot','')") or die(mysqli_error($conn));
									// }
								?>
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
									<p><b>Price: </b><span class="text-success"><?= $rs['price']?></span></p><br>
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
		  </div><!--Ending of col-md-12 -->
		  <div class="col-md-12">
			<ul class="pagination justify-content-center">
				<?php
					if($page > 1){
						?>
							<li class="page-item">
								<a href="?pageId=<?= $page-1;?>" class="page-link" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						<?php
					}
					for ($i=0; $i <ceil($size/$limits); $i++) { 
						?>
							<li class="page-item">
								<a class="page-link" href="?pageId=<?= ($i+1);?>"><?= ($i+1)?></a>
							</li>
						<?php
					}
					if ($page <ceil($size/$limits)) {
						?>
							<li class="page-item">
								<a href="?pageId=<?= ($page+1)?>" arial-label="Next" class="page-link">
									<span aria-hidden="true">&raquo;</span>
            						<span class="sr-only">Next</span>
								</a>
							</li>
						<?php
					}
				?>
			</ul>
		  </div>&nbsp;&nbsp;
		</div><!--Ending of row-->
	</div><!--Ending of container-->
	<nav class="navbar navbar-expand-lg navbar-default bg-secondary fixed-bottom" style="height:30px;">
		<div class="container">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
			  <div class="row">
				<div class="col-md-12" style="color:white;">
					&copy Alright Reserved by Learning development
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
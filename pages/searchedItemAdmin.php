<?php
    $idAll = explode("!",$_GET['search']);
    $id = $idAll[1];
?>
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
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/jquery/jquery.min.js"></script>
    <script>
        function back(){
            window.location="../admin/admin.php";
        }
    </script>
	<title>HelloPhone</title>
	
</head>
<body style="overflow-y: scroll;">
	<!-- Navigation -->
<?php
include("../includes/navAdmin.php");
?>
	<div class="container">
		<div class="row">
		  <div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<input type="text" name="search" id="searchId" placeholder="Search here!" class="form-control">
						<span class="results"></span>
					</div>&nbsp
                    <div class=col-md-12>
                        <button onclick="back()" class="btn btn-info btn-sm">Back</button>
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
									url:"../fetchAdmin.php",
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
			$query = mysqli_query($conn,"SELECT *FROM phones WHERE id = '$id'") or die(mysqli_error($conn));
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
									<div class="card-footer bg-white">
										<div class="row">
											<div class="col-md-4">
												<a class="btn btn-sm btn-outline-info" href="../admin/updatePhone.php?idToUpdate=<?= rand()."f2".rand()."2j".rand()."dd".rand()."kfdkk?\]sd]dk!".$row['id']."!sd]dd]e\sds".rand()."jhk".rand()."?fkjfk".rand()."32?ds".$row['id']."?jlsd!43kllkkjj".rand()?>">Edit</a>
											</div>
											<div class="col-md-4"></div>
											<div class="col-md-4">
												<button onclick="deleteItem('<?= $row['id']?>','<?= $row['phoneName']?>')" class="btn btn-sm btn-danger">Delete</button>
											</div>
										</div>
									</div>
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
			<script type="text/javascript">
				function deleteItem(idPhone,phoneName){
					var ask = confirm("Are you sure you want to delete "+phoneName+" ??");
					if (ask == true) {
						window.location='../deletePhone.php?idPhone=' +idPhone;
					}
				}
			</script>
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
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>	
</body>
</html>
<script>
    $(function(){
        $("#admin1").addClass('active');
    });
</script>
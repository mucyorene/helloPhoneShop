<?php
	include("includes/connect.php");
	session_start();
	if (!$_SESSION['adminLogin']) {
		echo "<script type='text/javascript'>window.top.location='index.php'</script>";
		}
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
			<div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="table table-hover">
                    <tr>
                        <td>N<sup>o</sup></td><td>Thumbnail</td>
						<td>Phone Name</td>
						<td>Price</td>
						<td>Available</td>
						<td>Total</td>
                    </tr>
                    <?php
                        $query = mysqli_query($conn,"SELECT *FROM phones ORDER BY id DESC");
                        if (mysqli_num_rows($query)>0) {
                            $a = 1;
                            while ($fe = mysqli_fetch_array($query)) {
                               ?>
                               <tr>
                                <td><?= $a;?></td>
								<td><img src="media/phonePhoto/<?= $fe['phoneImange']?>" alt="No Image found"></td>
								<td><?= $fe['phoneName']?></td>
								<td><?= $fe['price']?></td>
								<td><?= $fe['quantity']?></td>
								<td><?= (($fe['quantity'])*($fe['price']))?></td>
                               </tr>
                               <?php
                            $a++;}
                        }
                    ?>
                </table><br>
            </div>
			<div class="col-md-2"></div>
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
<script>
    $(function(){
        $("#admin3").addClass('active');
    });
</script>
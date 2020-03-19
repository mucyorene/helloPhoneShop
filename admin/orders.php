<?php
	include("../includes/connect.php");
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
	<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/jquery/jquery.min.js"></script>	
</head>
<body style="overflow-y: scroll;">
	<!-- Navigation -->
	<?php
include("../includes/navAdmin.php");
?>
	<div class="container">
		<div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                        <th>N<sup>o</sup>
                        </th><th>NAMES</th>
                        <th>PHONE BRAND</th>
                        <th>QUANTITY</th>
                        <th>PHONE NUMBER</th>
                        <th>EMAIL</th>
						<th>DISTRICT</th>
						<th>TOTAL</th>
						<th>ACTION</th>
                    </tr>
                <?php
                    $q = mysqli_query($conn,"SELECT * FROM customers,phones,orders,district WHERE customers.id = orders.customerId AND 
                    orders.PhoneId = phones.id AND district.district_id = orders.addresses ORDER BY phones.id DESC") or die(mysqli_error($conn));
                    if (mysqli_num_rows($q)>0) {
						$a=1;
                      while ($ff = mysqli_fetch_array($q)) {
                        ?>
                          <tr>
							<td><?php echo $a;?></td>
							<td><?= $ff['names']?></td>
							<td><?= $ff['phoneName']?></td>
							<td><?= $ff['quantity']?></td>
							<td><?= $ff['phone']?></td>
							<td><?= $ff['email']?></td>
							<td><?= $ff['district_name']?></td>
							<td class="text-success"><?= (($ff['price'])*($ff['quantity']))?></td>
							<td><a class="btn btn-sm btn-danger text-white" onclick="func1('<?= $ff['id']?>')">Delete</a></td>																	
						  </tr>
                        <?php
                      $a++;}$a++;
                    }else{
                        echo "<h3 class='alert alert-danger text-dark'>No orders found</h3>";
                    }
                ?>
                </table>
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
</body>
</html>
<script type="text/javascript">
	function func1(id) {
		var ask = confirm("Are you sure you want to delete this order??");
		if (ask == true) {
			//alert(id);
			window.location='deleteOrder.php?orderId=s32fd2f332l39!'+id+"!ffk2l3]f3323444rsfd23ffweq098oi";
		}
	}
</script>
<script>
    $(function(){
        $("#admin2").addClass('active');
    });
</script>
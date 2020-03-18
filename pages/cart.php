<?php include("../includes/connect.php")?>
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
    <title>Document</title>
</head>
<body style="overflow-y: scroll;">
	<!-- Navigation -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-secondary fixed-top" style="height:40px;">
		<div class="container">
			<a class="navbar-brand" href="../index.php">
				<h1 class="text-warning">HelloPhone</h1>
			</a>
			<a class="navbar-brand" href="../index.php">
			<!-- <p class="m-0 text-white text-center">WEDDING CATERING SERVICE MANAGEMENT SYSTEM</p> -->
			</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
	  
			<div style="float: right;">
	  
			  <div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav">
	  
				  <li class="nav-item" id="nav-home">
					<a class="nav-link" href="../index.php"><p class="m-0 text-center text-white">Home</p></a>
				  </li>
	  
					<li class="nav-item" id="nav-about">
					<a class="nav-link" href="About.php"><p class="m-0 text-center text-white">About</p></a>
				  </li>
	  
                    <li class="nav-item" id="nav-contact">
                        <a class="nav-link" href="contact.php"><p class="m-0 text-center text-white">Contact</p></a>
                    </li>
					  <li class="nav-item" id="nav-about">
						<a class="nav-link" href="login.php"><p class="m-0 text-center text-white">Login</p></a>
                      </li>
                      <li class="nav-item" id="nav-contact">
					    <a class="nav-link active" href="cart.php"><p class="m-0 text-center text-white">
						Cart <span class="badge badge-warning text-danger">13</span></p></a>
				      </li>
				</ul>
				</div>
			 </div>
		</div>
    </nav><br><br><br><br><br>
        <div class="container">
        <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5"></div>
        <div class="col-md-5">
            <fieldset>
					<legend><h2 class="text-info">FILL OUT INFORMATION</h2></legend>
					<?php
						if (isset($_POST['buy'])) {
                            $a = mysqli_real_escape_string($conn,$_POST['qty']);
                            $b = mysqli_real_escape_string($conn,$_POST['phone']);                            
                            $c = mysqli_real_escape_string($conn,$_POST['mail']);	
                            $d = mysqli_real_escape_string($conn,$_POST['addr']);
                            $phoneId = $phone['id'];
                            $customerId = $row['id'];            
                            $total = (($phone['price'])*$a);
                            $quer = mysqli_query($conn,"SELECT *FROM orders WHERE email='$c' AND quantity='$a' AND phone= '$b' AND 
                            phoneId = '$phoneId'") or die(mysqli_error($conn));
                            if (mysqli_num_rows($quer)>0) {
                                echo "<h3 class='alert alert-danger'>Alread registered</h3>";
                            }else{
                                $q = mysqli_query($conn,"INSERT INTO orders (id,phoneId,customerId,phone,addresses,email,quantity,
                                total) VALUES ('','$phoneId','$customerId','$b','$d','$c','$a','$total')") or die(mysqli_error($conn));
                                    if ($q) {
                                        echo "<h4 class='alert alert-success'>Thank you for buying</h4>";
                                    }else{
                                        echo "<h4 class='alert alert-danger'>Failed to buy</h4>";
                                    }
                            }

						}
					?>
					<form action="" name="phoneRegister" class="form" method="POST" onsubmit="return validatePhone();">
						<div class="form-group">
							<label for="" class="form-control-label">Name</label>
							<input type="text" name="phoneNames" disabled class="form-control" id="">
							<span class="text-danger" id="messagePhone"></span>
						</div>
						<div class="form-group row">
							<div class="col-md-4">
							    <label for="" class="form-control-label">Price</label>
							</div>
							<div class="col-md-4">
							<input type="number" disabled class="form-control" id="">
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
                                <label for="" class="form-control-label">Quantity</label>
                            </div>
						    <div class="col-md-8">
							    <input type="number" name="qty" placeholder="Quantity" class="form-control" id="">
							    <span class="text-danger" id="messageQuantity"></span>
						    </div>
                        </div>
                        <div class="form-group row">
							<div class="col-md-4">
                                <label for="phone" class="form-control-label">Telephone Number</label>
                            </div>
						    <div class="col-md-8">
							    <input type="number" name="phone" placeholder="Your phone Number" class="form-control" id="">
							    <span class="text-danger" id="messageQuantity"></span>
						    </div>
                        </div>
                        <div class="form-group row">
							<div class="col-md-4">
                                <label for="phone" class="form-control-label">Email</label>
                            </div>
						    <div class="col-md-8">
							    <input type="email" name="mail" placeholder="Email" class="form-control" id="">
							    <span class="text-danger" id="messageQuantity"></span>
						    </div>
						</div>
                        <div class="form-group row">
							<div class="col-md-4">
                                <label for="" class="form-control-label">Address</label>
                            </div>
						    <div class="col-md-8">
							    <select name="addr" class="form-control" id="district">
                                    <option value="">SELECT DISTRICT</option>
                                    <?php
                                      $dis = mysqli_query($conn,"SELECT *FROM district ORDER BY district_name ASC") or die(mysqli_error($conn));   
                                      while ($fet = mysqli_fetch_array($dis)) {
                                       ?>
                                          <option value="<?= $fet['district_id'];?>"><?= $fet['district_name'];?></option>
                                       <?php
                                      }     
                                    ?>
                                </select>
							    <span class="text-danger" id="messageQuantity"></span>
						    </div>
						</div>
						<input type='submit' class="btn btn-info btn-sm" name="buy" value="Check out">
					</form>
		    </fieldset>
        </div>
        <div class="col-md-1"></div>
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
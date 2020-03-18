<?php include("includes/connect.php");
    	session_start();
        if (!$_SESSION['userLogin']) {
            echo "<script type='text/javascript'>window.top.location='index.php'</script>";
            }
            $owner = $_SESSION['userLogin'];
            $all = $_GET['idPhone'];
            $ids = explode("!",$all);
            $id = $ids[1];
        $acc = mysqli_query($conn,"SELECT *FROM customers WHERE id = '$owner'") or die(mysqli_error($conn));
        $idPhone = mysqli_query($conn,"SELECT *FROM phones WHERE id= '$id'") or die(mysqli_error($conn));
        $row = mysqli_fetch_array($acc);
        $phone = mysqli_fetch_array($idPhone);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/jquery/jquery.min.js"></script>
    <title>Document</title>
</head>
<body style="overflow-y: scroll;">
<?php include("includes/navCustomers.php")?>
    <div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <h3 class="text-info">About <?php echo $phone['phoneName']?></h3>
        </div>
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
                                echo "<h3 class='alert alert-danger'>Already registered</h3>";
                            }else{
                                if (($phone['quantity'])<$a) {
                                    if (is_numeric($d)) {
                                        $remQty = (($phone['quantity'])-$a);
                                        $q = mysqli_query($conn,"INSERT INTO orders (id,phoneId,customerId,phone,addresses,email,quantity,
                                        total) VALUES ('','$phoneId','$customerId','$b','$d','$c','$a','$total')") or die(mysqli_error($conn));
                                        $remains = mysqli_query($conn,"UPDATE phones SET quantity='$remQty' WHERE id='$phoneId'") or die(mysqli_error($conn));
                                            if ($q) {
                                                echo "<h4 class='alert alert-success'>Thank you for buying</h4>";
                                            }else{
                                                echo "<h4 class='alert alert-danger'>Failed to buy</h4>";
                                            }
                                    }else{
                                        echo "<h3 class='alert alert-danger'>SELECT VALID DISTRICT</h3>";
                                    }
                                }else{
                                    echo "<h3 class='alert alert-danger'>Number of phones you're requesting are not available</h3>";
                                }
                            }

						}
					?>
					<form action="" name="phoneRegister" class="form" method="POST" onsubmit="return validatePhone();">
						<div class="form-group">
							<label for="" class="form-control-label">Name</label>
							<input type="text" name="phoneNames" disabled value="<?= $phone['phoneName'];?>" class="form-control" id="">
							<span class="text-danger" id="messagePhone"></span>
						</div>
						<div class="form-group row">
							<div class="col-md-4">
							    <label for="" class="form-control-label">Price</label>
							</div>
							<div class="col-md-4">
							<input type="number" value="<?= $phone['price']?>" disabled class="form-control" id="">
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
							    <input type="number" required name="qty" placeholder="Quantity" class="form-control" id="">
							    <span class="text-danger" id="messageQuantity"></span>
						    </div>
                        </div>
                        <div class="form-group row">
							<div class="col-md-4">
                                <label for="phone" class="form-control-label">Telephone Number</label>
                            </div>
						    <div class="col-md-8">
							    <input type="number" required name="phone" placeholder="Your phone Number" class="form-control" id="">
							    <span class="text-danger" id="messageQuantity"></span>
						    </div>
                        </div>
                        <div class="form-group row">
							<div class="col-md-4">
                                <label for="phone" class="form-control-label">Email</label>
                            </div>
						    <div class="col-md-8">
							    <input type="email" required name="mail" placeholder="Email" class="form-control" id="">
							    <span class="text-danger" id="messageQuantity"></span>
						    </div>
						</div>
                        <div class="form-group row">
							<div class="col-md-4">
                                <label for="" class="form-control-label">Address</label>
                            </div>
						    <div class="col-md-8">
							    <select name="addr" class="form-control" id="district" required>
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
    <script>
    $(function(){
        $("#cHome").addClass('active');
    });
</script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>	
</body>
</html>
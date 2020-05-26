<?php
    include("../includes/connect.php");
    //echo $_GET['idPro'];
    $find = mysqli_query($conn,"SELECT *FROM phones WHERE id='".$_GET['idPro']."'") or die(mysqli_error($conn));
    if(mysqli_num_rows($find)>0){
        $row = mysqli_fetch_array($find);
        //echo $row['phoneName'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <title><?= $row['phoneName']?></title>
</head>
<body>
<?php
include("../includes/indexNav.php");
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 card-footer">
                <h2 class='text-bold'><?= $row['phoneName']?></h2> <br>
            </div>&nbsp
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <img src="../media/phonePhoto/<?= $row['phoneImange'];?>" class="image-responsive" alt="" height="100">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <img src="../media/phonePhoto/<?= $row['phoneImange'];?>" class="image-responsive" alt="" height="100">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <img src="../media/phonePhoto/<?= $row['phoneImange'];?>" class="image-responsive" alt="" height="100">
                            </div>
                        </div>                         
                    </div>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <img src="../media/phonePhoto/<?= $row['phoneImange'];?>" class="img" alt="">
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5">
                <table class="table">
                    <tr>
                        <td><b>Price</b></td>
                        <td><span class="text-success"><u><?php echo $row['price'];?></u>&nbsp</span><b>Rwf</b></td>
                    </tr>
                    <tr>
                        <td><b>Descriptions</b></td>
                        <td><?php echo $row['phoneDescriptions'];?></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <form action="" class="form">
                    <label for="quantity" class="form-control-label">Quantity</label>
                    <input type="number" name="" class="form-control" id="" value='1'><br>
                    <button class="btn btn-sm btn-info">Add to cart</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
else{
 ?>
    <script>
        window.location('index.php');
    </script>
 <?php
}
?>
<?php
include("../includes/connect.php");
    $getId = $_GET['orderId'];
    $i = explode("!",$getId);
    $id = $i[1];
    //echo $id;
    $qu = mysqli_query($conn,"DELETE FROM orders WHERE id = '$id'") or die(mysqli_error($conn));
    if ($qu) {
        echo "<script>window.location='../orders.php'</script>";
    }else{
        alert("Can not delete order");
        echo "<script>window.location='../orders.php'</script>";
    }
?>
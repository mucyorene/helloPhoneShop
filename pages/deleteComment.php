<?php
    include("../includes/connect.php");
    $idAll = explode("!",$_GET['id']);
    $id = $idAll[1];
    $qu = mysqli_query($conn,"DELETE FROM feedbacks WHERE id = '$id'") or die(mysqli_error($conn));
    if ($qu) {
        echo "<script>window.location='../feed.php';</script>";
    }else {
        echo "<script>alert('Can not delete')</script>";
        echo "<script>window.location='../feed.php';</script>";        
    }
?>
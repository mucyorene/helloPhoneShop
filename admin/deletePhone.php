<?php
include("../includes/connect.php");
$id = $_GET['idPhone'];
//echo $id;
$deleteQuery = mysqli_query($conn,"DELETE FROM phones WHERE id = '$id'");
if ($deleteQuery) {
   echo "<script>window.top.location = 'admin.php'</script>";
}
?>
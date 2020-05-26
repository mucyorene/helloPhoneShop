<?php
    include("../includes/connect.php");
    $value = $_POST['search'];
    $output = '';
    $search = mysqli_query($conn,"SELECT *FROM phones WHERE phoneName LIKE '%$value%'") or die(mysqli_error($conn));
        if (mysqli_num_rows($search)>0) {
        $output .= '<ul>';
        while ($row = mysqli_fetch_array($search)) {
            $output.=
                '<p class="alert alert-success">
                <a href="pages/searchedItem.php?search='.rand()."2j".rand()."dd".rand()."fLksl)L!".$row['id']."!JfdL".rand()."2j".rand()."dd".rand().'">'.$row['phoneName'].'</a>
                </p>';
        }
        echo $output;
        }else{
            echo "<span class='text-danger'>No data found please</span>";
        }
?>
<style>
    .searched:hover{
        background-color: rgba(0, 0, 0, 0.075);
    }
    a:hover{
        text-decoration:none;
    }
</style>
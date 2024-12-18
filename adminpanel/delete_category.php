<?php
include('config.php');

// print_r($_POST);

if(isset($_POST['submit'])){
    $id = $_POST['category_id'];
   
    $query = "DELETE FROM `categories` where `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if($result){
        echo "<script>
        alert('Category Deleted Successfully');
        </script>;
        ";
        header("location:category.php");
    }

}


?>
<?php
include('config.php');

// print_r($_POST);

if(isset($_POST['submit'])){
    $id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image_name = $_FILES['icon']['name'];
    $tmp_name = $_FILES['icon']['tmp_name'];

    move_uploaded_file($tmp_name, 'uploads/' . $image_name);
    $query = "UPDATE `categories` SET `name` = '$name', `description` = '$description', `icon` = '$image_name' WHERE `id` = '$id'";

    $result = mysqli_query($connection, $query);
    if($result){
        echo "<script>
        alert('Category Updated Successfully');
        </script>;
        ";
        header("location:category.php");
    }
}


?>
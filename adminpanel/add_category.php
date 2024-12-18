<?php
include ('config.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $file_name = $_FILES['icon']['name'];
    $tmp_name = $_FILES['icon']['tmp_name'];

    move_uploaded_file($tmp_name,'uploads/'.$file_name);

    $query = "INSERT INTO `categories` (`name`, `description`, `icon`) VALUES ('$name', '$description', '$file_name')";

    $connection_query = mysqli_query($connection, $query);

    if($connection_query){
        echo "<script>
        alert('Category Added Successfully');
        </script>";
        header ('location: category.php');
    }
}
?>
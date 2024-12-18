<?php
include ('config.php');
// Testinga
if(isset($_POST['submit'])){
    $job_title = $_POST['job_title'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $responsibility = $_POST['responsibility'];
    $qualification = $_POST['qualification'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $duration = $_POST['duration'];
    $status = $_POST['status']

    $query = "INSERT INTO `jobs` (`job_title`, `category_id`, `description`, `responsibility`, `qualification`, `location`, `duration`, `salary`, `status`) VALUES ('$job_title', '$category_id', '$description', '$responsibility', '$qualification', '$location', '$duration', '$salary', '$status')";

    $connection_query = mysqli_query($connection, $query);

    if($connection_query){
        echo "<script>
        alert('job Added Successfully');
        </script>";
        header ('location: jobs.php');
    }
}
?>



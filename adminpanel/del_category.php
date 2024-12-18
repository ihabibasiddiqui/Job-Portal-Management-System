<?php

include("config.php");

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $query = "SELECT * FROM `categories` where `id` = '$id'";
    $result = mysqli_query($connection, $query);
    // print_r($result);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
        echo ' <form action="delete_category.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" value="'.$row['id'].'" class="form-control" placeholder="Enter Category Name" id="category_id" name="category_id"
                                aria-describedby="nameHelp">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                    </div>
                </form> ';
}
}

?>



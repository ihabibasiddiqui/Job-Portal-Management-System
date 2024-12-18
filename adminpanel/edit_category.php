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
        echo ' <form action="update_category.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" value="'.$row['id'].'" class="form-control" placeholder="Enter Category Name" id="category_id" name="category_id"
                                aria-describedby="nameHelp">

                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="'.$row['name'].'" class="form-control" placeholder="Enter Category Name" id="name" name="name"
                            aria-describedby="nameHelp">

                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Enter Description" id="floatingTextarea2"
                                style="height: 100px" name="description">'.$row['description'].'</textarea>
                            <label for="floatingTextarea2">Description</label>
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon</label>
                            <input type="file" class="form-control" id="icon" name="icon" aria-describedby="iconHelp">
                            <span>'.$row['icon'].'</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                    </div>
                </form> ';
}
}

?>



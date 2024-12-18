<!--header start-->
<?php
include ('includes/header.php');
?>
<!--header end-->
       <!--sidebar start-->
       <?php
       include ('includes/sidebar.php');
       ?>
       <!--sidebar end-->
       <!--navbar start-->
       <?php
       include ('includes/navbar.php')
       ?>
       <!--navbar end-->

       <div class="container">
        <div class="page-inner">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create Jobs
        </button>
        <h2 class="m-3">All Jobs</h2>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Job Title</th>
                    <th>Category</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Duration</th>
                    <th>Salary</th>
                    <th>Job Description</th>
                    <th>Responsibility</th>
                    <th>Qualification</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include('config.php');

                $sql = "SELECT jobs.*, category.name as category_name, company.name FROM jobs inner join category on jobs.category_id = category.id inner join company on company.id = jobs.company_id";
                $result = mysqli_query($connection, $sql);
                if(mysqli_num_rows($result) > 0){
                $counter = 1;
                    while($row = mysqli_fetch_assoc($result)) {  
                ?>
                <tr>
                    <td><?php echo $counter?></td>
                    <td><?php echo $row['job_title']?></td>
                    <td><?php echo $row['categories_name']?></td>
                    <td><?php echo $row ['name'] ?></td>
                    <td><?php echo $row ['location'] ?></td>
                    <td><?php echo $row ['duration'] ?></td>
                    <td><?php echo $row ['salary'] ?></td>
                    <td><?php echo $row ['description'] ?></td>
                    <td><?php echo $row ['responsibility'] ?></td>
                    <td><?php echo $row ['qualification'] ?></td>
                    <td><?php echo $status = $row['status'] == '1' ? 'Active' : "In Active" ?></td>
                  </tr>
              <?php
              $counter++;
                }
              }
              ?>
            </tbody>
        </table>
        </div>
       </div>

<!-- add job modal start -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Job</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="add_job.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Job Title</label>
                <input type="text" class="form-control" placeholder="Enter Category Title" id="title" name="job_title" aria-describedby="nameHelp">           
            </div>
            <?php
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($connection, $sql);
                if(mysqli_num_rows($result) > 0) {
            ?>
            <div class="mb-3 d-flex" style="justify-content: space-evenly">
                <label for="name" class="form-label">Category</label>
                <select name="category_id" id="">
                <?php
                    while($row = mysqli_fetch_assoc($result)) {    
                ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                <?php
                    }
                ?>
                </select> 
                <?php     
                    }
                ?>
                <?php
                    $sql = "SELECT * FROM company";
                    $result = mysqli_query($connection, $sql);
                    if(mysqli_num_rows($result) > 0) {
                ?>
                <label for="name" class="form-label">Company</label>
                <select name="company_id" id="">
                <?php
                    while($row = mysqli_fetch_assoc($result)) {    
                ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                <?php
                    }
                ?>
                </select>
            </div>
            <?php     
                }
            ?>
            <div class="mb-3">
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Enter Description" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
                <label for="floatingTextarea2">Description</label>
              </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Enter Responsibility" id="floatingTextarea2"
                style="height: 100px" name="responsibility"></textarea>
                <label for="floatingTextarea2">Responsibility</label>
              </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Enter qualification" id="floatingTextarea2"
                style="height: 100px" name="qualification"></textarea>
                <label for="floatingTextarea2">Qualification</label>
              </div>
            <div class="mb-3">
                <label for="name" class="form-label">Location</label>
                <input type="text" class="form-control" placeholder="Enter Category Location" id="title"
                name="location" aria-describedby="nameHelp">
              </div>
            <div class="mb-3">
                <label for="name" class="form-label">Duration</label>
                <input type="text" class="form-control" placeholder="Enter Category Duration" id="title"
                name="duration" aria-describedby="nameHelp">
              </div>
            <div class="mb-3">
                <label for="name" class="form-label">Salary</label>
                <input type="text" class="form-control" placeholder="Enter Category Salary" id="title"
                name="salary" aria-describedby="nameHelp">
              </div>
            <div class="mb-3">
                <label for="name" class="form-label">Status</label>
                <select name="status" id="">
                <option value="1">Active</option>
                <option value="0">In Active</option>
               </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </div>
        </form>
    </div>
  </div>
</div>
</div>
<!-- add job modal end -->
    

      <!-- edit modal start -->
  <!-- Modal -->
  <div class="modal fade" id="edit_category_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_body">
               
            </div>
        </div>

    </div>
</div>
<!-- edit modal end -->

<!-- delete modal start -->
<div class="modal fade" id="delete_category_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row p-2">
                <div class="col-md-8">
                    <p>Are You Sure you want to delete this record?</p>
                </div>
            </div>
            <div class="modal-body" id="del_modal_body">
               
            </div>
        </div>

    </div>
</div>
<!-- delete modal end -->

<script>
        function Edit_category(id) {
            $('#edit_category_modal').modal('show')
            $.ajax({
                url : "edit_category.php",
                method : "POST",
                data : {
                    id : id
                },
                success : function(res){
                    console.log(res);
                    $('#modal_body').append(res);
                }
            })
        }
        function Delete_category(id) {
            $('#delete_category_modal').modal('show')
            $.ajax({
                url : "del_category.php",
                method : "POST",
                data : {
                    id : id
                },
                success : function(res){
                    console.log(res);
                    $('#del_modal_body').append(res);
                }
            })
        }
</script>

      <!--footer start-->
       <?php
        include ('includes/footer.php');
        ?>
        <!--footer end-->

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
  </body>
</html>

<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
  //Add USer
  if(isset($_POST['add_veh']))
    {

            $v_location=$_POST['v_location'];
            $v_pic = $_POST['v_pic'];
            $v_category=$_POST['v_category'];
            $v_phonenum=$_POST['v_phonenum'];
            $v_status=$_POST['v_status'];
            $v_dpic=$_FILES["v_dpic"]["name"];
		        move_uploaded_file($_FILES["v_dpic"]["tmp_name"],"../vendor/img/".$_FILES["v_dpic"]["name"]);
            $query = "insert into tms_vehicle (v_location, v_phonenum, v_pic, v_category, v_dpic, v_status ) values(?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('ssssss', $v_location, $v_phonenum, $v_pic, $v_category, $v_dpic, $v_status);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Location Added";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/head.php');?>

<body id="page-top">
    <!--Start Navigation Bar-->
    <?php include("vendor/inc/nav.php");?>
    <!--Navigation Bar-->

    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("vendor/inc/sidebar.php");?>
        <!--End Sidebar-->
        <div id="content-wrapper">

            <div class="container-fluid">
                <?php if(isset($succ)) {?>
                <!--This code for injecting an alert-->
                <script>
                    setTimeout(function() {
                            swal("Success!", "<?php echo $succ;?>!", "success");
                        },
                        100);
                </script>

                <?php } ?>
                <?php if(isset($err)) {?>
                <!--This code for injecting an alert-->
                <script>
                    setTimeout(function() {
                            swal("Failed!", "<?php echo $err;?>!", "Failed");
                        },
                        100);
                </script>

                <?php } ?>

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Locations</a>
                    </li>
                    <li class="breadcrumb-item active">Add Location</li>
                </ol>
                <hr>
                <div class="card">
                    <div class="card-header">
                        Add Location
                    </div>
                    <div class="card-body">
                        <!--Add User Form-->
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Location Name</label>
                                <input type="text" required class="form-control" id="exampleInputEmail1" name="v_location">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Person In Charge (PIC)</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="v_pic">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="v_phonenum">
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Location Category</label>
                                <select class="form-control" name="v_category" id="exampleFormControlSelect1">
                                    <option>Makmal</option>
                                    <option>Bilik Kuliah</option>
                                    <option>Dewan Kuliah</option>
                                    <option>Ruang Legar</option>
                                    <option>Ruang Parkir</option>
                                    <option>Makmal Projek</option>

                                    <option>Tandas</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Location Status</label>
                                <select class="form-control" name="v_status" id="exampleFormControlSelect1">
                                    <option>Completed</option>
                                    <option>In Progress</option>
                                    <option>Pending</option>

                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Location Picture (optional)</label>
                                <input type="file" class="btn btn-success" id="exampleInputEmail1" name="v_dpic">
                            </div>

                            <button type="submit" name="add_veh" class="btn btn-success">Add Vehicle</button>
                        </form>
                        <!-- End Form-->
                    </div>
                </div>

                <hr>


                <!-- Sticky Footer -->
                <?php include("vendor/inc/footer.php");?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="admin-logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Page level plugin JavaScript-->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="vendor/js/sb-admin.min.js"></script>

        <!-- Demo scripts for this page-->
        <script src="vendor/js/demo/datatables-demo.js"></script>
        <script src="vendor/js/demo/chart-area-demo.js"></script>
        <!--INject Sweet alert js-->
        <script src="vendor/js/swal.js"></script>

</body>

</html>
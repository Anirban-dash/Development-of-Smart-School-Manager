<?php
require("./../conn.php");
session_start();
if(!isset($_SESSION['id']) and $_SESSION['status']!="hoi"){
    header("location:./../index.php");
}
$n_id=$_SESSION['id'];
$n_res=mysqli_query($con,"SELECT * from hoi where id='$n_id'") or die(mysqli_error($con));
$n_row=mysqli_fetch_array($n_res);
$q=mysqli_query($con,"SELECT * from student ORDER BY class") or die(mysqli_error($con));

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SSM - Solution for many</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="../logo.png" height="40%" width="40%">
                </div>
                <div class="sidebar-brand-text mx-3">SSM</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fa-solid fa-landmark"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="notice.php">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Notice</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTw"
                    aria-expanded="true" aria-controls="collapseTw">
                    <i class="fa-solid fa-microscope"></i>
                    <span>Student</span>
                </a>
                <div id="collapseTw" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="student_view.php">View/Edit</a>
                        <a class="collapse-item" href="student_add.php">Add Student</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-microscope"></i>
                    <span>Teacher</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="test_publish.php">View/Edit</a>
                        <a class="collapse-item" href="test_rsponse.php">Add Teacher</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="attendance.php">
                    <i class="fa-solid fa-clipboard-user"></i>
                    <span>Exam Analytics</span></a>
            </li>
           
            
            <li class="nav-item">
                <a class="nav-link" href="rfc.php">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <span>RFC</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="timetable.php">
                    <i class="fa-solid fa-table-list"></i>
                    <span> SetTimetable</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./../logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        

        </ul>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $n_row['name'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/profile.jpg">
                            </a>
                           
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Student View/Edit</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL. No</th>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Roll</th>
                                            <th>Image</th>
                                            <th>Class</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $i=1;
                                        while($row=mysqli_fetch_array($q)){
                                            echo '<tr>';
                                            echo '<td>'.$i.'</td><td>'.$row['id'].'</td><td>'.$row['name'].'</td><td>'.$row['roll'].'</td><td><img src="./../img/'.$row['photo'].'"
                                            height="40" width="40"></td><td>'.$row['class'].'</td><td><div class="d-flex justify-content-between"><a href="editStudent.php?id='.$row['id'].'"><i class="fa-regular fa-pen-to-square text-warning"></i></a><i onclick="dele(this,'.$row['id'].')" class="fa-regular fa-trash-can text-danger" style="cursor:pointer"></i></div>';
                                            
                                            $i++;
                                            echo '</tr>';
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                </div>
                <!-- /.container-fluid -->
                                    </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Smart School 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script>
        function dele(e,id){
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange=function(){
                if(xhr.readyState==4 && xhr.status==200){
                    e.parentElement.parentElement.parentElement.remove();
                }
            }
            xhr.open("POST","delstudent.php",true);
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhr.send("id="+id);
            
        }
    </script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
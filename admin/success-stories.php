<?php
session_start();
include('include/connection.php');
if (!isset($_SESSION['admintype'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <title>Admin | Success-Stories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="admin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include('include/sidebar.php'); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li>
                            <i class="fas fa-user me-2"></i>
                            <?php echo isset($_SESSION['adminname']) ? $_SESSION['adminname'] : ""; ?>
                           
                        </li>
                    </ul>
                </div>
            </nav>
            <section>
                <div class="container-fluid px-4">
                    <div class="row my-5">
                        <h3 class="admin">Success Stories</h3><br><br><br><br>
                        <div class="col">
                            <table class="table bg-white rounded shadow-sm  table-hover" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th scope="col" width="70">Sr. #</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Graduation Year</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Picture</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
   include("include/connection.php");
              $qry = "SELECT * FROM story ORDER BY id DESC  ";
              $res = mysqli_query($conn, $qry);
              if (mysqli_num_rows($res)>0) {
               while($a = mysqli_fetch_array($res))
              {
              
               ?>
                                    <tr>
                                        <th scope="row"><?php echo $a['id'] ?></th>
                                        <td><?php echo $a['name'] ?></td>
                                        <td><?php echo $a['grad_year'] ?></td>
                                        <td><?php echo $a['department'] ?></td>
                                        <td><?php echo $a['des'] ?></td>
                                        <td><a href="../<?php echo $a['img'] ?>"><img src="../<?php echo $a['img'] ?>" class="img_cnic" alt="id"></a></td>
                                        <?php 
                                        if ($a['status']==1) {  ?>
                                            <td><a href="custom.php?id=<?php echo $a['id'] ?>&type=story&status=0&daily=storyapprove"> Approve </a> / <a href="custom.php?id=<?php echo $a['id'] ?>&type=story&status=2&daily=storydeny"> Deny </a></td>
                                            <?php     }elseif($a['status']==0){ ?>
                                               
                                                <td style="color:green" >Approved</td>
                                         <?php   }else{ ?>
                                                    <td style="color:red" >Disapproved</td>
                                                    <?php   }
                                        ?>
                                    </tr>
                                 <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </section>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    <?php
    include('include/connection.php');
    if (isset($_REQUEST['btn'])) {
        $email = $_REQUEST['email'];
        $name = $_REQUEST['name'];
        $password = $_REQUEST['password'];
        $number = $_REQUEST['number'];

        $sql = "INSERT INTO `admin`(`email`, `password`, `name`, `number`) VALUES ('$email','$password','$name','$number')";
        mysqli_query($conn, $sql);

        echo "<script>
toastr.success('Admin added successfully');
  </script>";
    }

    ?>
</body>

</html>
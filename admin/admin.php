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
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="admin.css">
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
                            <?php echo $_SESSION['adminname'] ?>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
                                include("include/connection.php");
                                $qryb = "SELECT * FROM alumni  ";
                                $resb = mysqli_query($conn, $qryb);


                                $qrybb = "SELECT * FROM student  ";
                                $resbb = mysqli_query($conn, $qrybb);

                                $qrybbc = "SELECT * FROM contact  ";
                                $resbbc = mysqli_query($conn, $qrybbc);

                                $qrybbcd = "SELECT * FROM job  ";
                                $resbbcd = mysqli_query($conn, $qrybbcd);


                                ?>
                                <h3 class="fs-2">
                                    <?php echo mysqli_num_rows($resb); ?>
                                </h3>
                                <p class="fs-5">Alumni Registered</p>
                            </div>
                            <i class="fas fa-user-alt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    <?php echo mysqli_num_rows($resbb); ?>
                                </h3>
                                <p class="fs-5">Student Registered</p>
                            </div>
                            <i class="fas fa-user-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    <?php echo mysqli_num_rows($resbbc); ?>
                                </h3>
                                <p class="fs-5">Contact</p>
                            </div>
                            <i class="far fa-comment-alt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    <?php echo mysqli_num_rows($resbbcd); ?>
                                </h3>
                                <p class="fs-5">Jobs</p>
                            </div>
                            <i class="fas fa-paper-plane fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent Student Registered</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="70">Sr. #</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Registration No</th>
                                    <th scope="col">Department of Graduation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("include/connection.php");
                                $qry = "SELECT * FROM student ORDER BY id DESC LIMIT 6 ";
                                $res = mysqli_query($conn, $qry);
                                if (mysqli_num_rows($res) > 0) {
                                    $i = 1;
                                    while ($a = mysqli_fetch_array($res)) {
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $i ?>
                                            </th>
                                            <td>
                                                <?php echo $a['FullName'] ?>
                                            </td>
                                            <td>
                                                <?php echo $a['RegistrationNo'] ?>
                                            </td>
                                            <td>
                                                <?php echo $a['Department'] ?>
                                            </td>
                                        </tr>
                                        <?php $i++;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
</body>

</html>
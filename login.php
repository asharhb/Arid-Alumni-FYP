<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arid Alumni</title>
    <?php include "include/link.php"; ?>
</head>

<body>
    <?php include "include/navbar.php"; ?>
    <?php
    include "include/connection.php";
    if (isset($_REQUEST["btn"])) {
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $type = $_REQUEST["type"];
        if ($type == 1) {
            $qry = "SELECT * FROM `alumni` WHERE `Email`='$email' AND `Password`='$password'";
            $sql = mysqli_query($conn, $qry);
            if (mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);
                if ($row["status"] == 1) {
                    echo "<script>
                toastr.error('Account is pending for approval');
                </script>";
                } elseif ($row["status"] == 2) {
                    echo "<script>
                toastr.error('Account is not approved!');
                </script>";
                } else {
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["name"] = $row["FullName"];
                    $_SESSION["Email"] = $row["Email"];
                    $_SESSION["PhoneNumber"] = $row["PhoneNumber"];
                    $_SESSION["type"] = "alumni";
                    $_SESSION["DepartmentofGraduation"] = $row["DepartmentofGraduation"];
                    header("location:index.php");
                }
            } else {
                echo "<script>
   toastr.error('Invalid login details!');
  </script>";
            }
        } else {
            $qry = "SELECT * FROM `student` WHERE `Email`='$email' AND `Password`='$password'";
            $sql = mysqli_query($conn, $qry);
            if (mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);
                if ($row["status"] == 1) {
                    echo "<script>
      toastr.error('Account is pending for approval');
     </script>";
                } elseif ($row["status"] == 2) {
                    echo "<script>
      toastr.error('Account is not approved!');
     </script>";
                } else {
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["name"] = $row["FullName"];
                    $_SESSION["Email"] = $row["Email"];
                    $_SESSION["PhoneNumber"] = $row["PhoneNumber"];
                    $_SESSION["DepartmentofGraduation"] = $row["DepartmentofGraduation"];
                    $_SESSION["type"] = "student";
                    header("location:index.php");
                }
            } else {
                echo "<script>
                            toastr.error('Invalid login details!');
                    </script>";
            }
        }
    }
    ?>

    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div data-aos="fade-right" class="col-12" data-aos="fade-down">
                    <h2>Login</h2>
                </div>
                <div class="col-12" data-aos="fade-right">
                    <a href="index.php">Home</a>
                    <a href="">Login</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Form-Start -->
    <section class="sec-std-form">
        <div class="wrapper">
            <div class="title" data-aos="flip-right">Login Form</div>
            <form method="POST">

                <div class="form">
                    <div class="inputfield">
                        <select required class="custom_select" name="type" aria-label="Default select example">
                            <option value="">Select Type</option>
                            <option value="1">Alumni</option>
                            <option value="2">Student</option>
                        </select>
                    </div>

                    <div class="inputfield">
                        <label>Email Address</label>
                        <input type="email" class="input" name="email" placeholder="Enter your email" />
                    </div>

                    <div class="inputfield">
                        <label>Password</label>
                        <input type="password" class="input" name="password" placeholder="Enter your password" />
                    </div>

                    <!-- <a href="#">Forgot password?</a> -->
                    <div class="inputfield btns" id="btn">
                        <button type="submit" name="btn" value="Register" class="btn">
                            Login
                        </button>
                        <button type="reset" value="Reset" class="btn">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Form-End -->


    <?php include "include/footer.php"; ?>
    <?php include "include/script.php"; ?>
</body>

</html>
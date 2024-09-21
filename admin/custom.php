<?php
include("include/connection.php");
if (isset($_GET['id']) && $_GET['type'] == "alumni" && $_GET['daily'] == "alumniapprove") {
    $status = $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE `alumni` SET `status`=$status WHERE id=$id";
    $run = mysqli_query($conn, $sql);
    $previousPage = $_SERVER['HTTP_REFERER'];

    // Redirect the user back to the previous page
    header("Location: $previousPage");

}

if (isset($_GET['id']) && $_GET['type'] == "alumni" && $_GET['daily'] == "alumnideny") {
    $status = $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE `alumni` SET `status`=$status WHERE id=$id";
    $run = mysqli_query($conn, $sql);
    $previousPage = $_SERVER['HTTP_REFERER'];

    // Redirect the user back to the previous page
    header("Location: $previousPage");

}

if (isset($_GET['id']) && $_GET['type'] == "student" && $_GET['daily'] == "studentapprove") {
    $status = $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE `student` SET `status`=$status WHERE id=$id";
    $run = mysqli_query($conn, $sql);
    $previousPage = $_SERVER['HTTP_REFERER'];

    // Redirect the user back to the previous page
    header("Location: $previousPage");

}

if (isset($_GET['id']) && $_GET['type'] == "student" && $_GET['daily'] == "studentdeny") {
    $status = $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE `student` SET `status`=$status WHERE id=$id";
    $run = mysqli_query($conn, $sql);
    $previousPage = $_SERVER['HTTP_REFERER'];

    // Redirect the user back to the previous page
    header("Location: $previousPage");

}

if (isset($_GET['id']) && $_GET['type'] == "job" && $_GET['daily'] == "jobapprove") {
    $status = $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE `job` SET `status`=$status WHERE id=$id";
    $run = mysqli_query($conn, $sql);
    $previousPage = $_SERVER['HTTP_REFERER'];

    // Redirect the user back to the previous page
    header("Location: $previousPage");

}

if (isset($_GET['id']) && $_GET['type'] == "job" && $_GET['daily'] == "jobdeny") {
    $status = $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE `job` SET `status`=$status WHERE id=$id";
    $run = mysqli_query($conn, $sql);
    $previousPage = $_SERVER['HTTP_REFERER'];

    // Redirect the user back to the previous page
    header("Location: $previousPage");

}

if (isset($_GET['id']) && $_GET['type'] == "fb" && $_GET['daily'] == "fbapprove") {
    $status = $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE `feedback` SET `status`=$status WHERE id=$id";
    $run = mysqli_query($conn, $sql);
    $previousPage = $_SERVER['HTTP_REFERER'];

    // Redirect the user back to the previous page
    header("Location: $previousPage");

}

if (isset($_GET['id']) && $_GET['type'] == "fb" && $_GET['daily'] == "fbdeny") {
    $status = $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE `feedback` SET `status`=$status WHERE id=$id";
    $run = mysqli_query($conn, $sql);
    $previousPage = $_SERVER['HTTP_REFERER'];

    // Redirect the user back to the previous page
    header("Location: $previousPage");

}
if (isset($_GET['id']) && $_GET['type'] == "story" && $_GET['daily'] == "storyapprove") {
    $status = $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE `story` SET `status`=$status WHERE id=$id";
    $run = mysqli_query($conn, $sql);
    $previousPage = $_SERVER['HTTP_REFERER'];

    // Redirect the user back to the previous page
    header("Location: $previousPage");

}

if (isset($_GET['id']) && $_GET['type'] == "story" && $_GET['daily'] == "storydeny") {
    $status = $_GET['status'];
    $id = $_GET['id'];
    $sql = "UPDATE `story` SET `status`=$status WHERE id=$id";
    $run = mysqli_query($conn, $sql);
    $previousPage = $_SERVER['HTTP_REFERER'];

    // Redirect the user back to the previous page
    header("Location: $previousPage");

}
?>
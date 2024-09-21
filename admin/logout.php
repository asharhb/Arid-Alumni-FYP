<?php 
session_start();
unset($_SESSION['admintype']);
header("location:login.php");
?>
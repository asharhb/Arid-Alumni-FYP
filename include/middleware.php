<?php
session_start();
include('connection.php');
 $id=$_SESSION['id'];
 if (!isset($_SESSION['id']) &&  !isset($_SESSION['type'])) {
      header("location:index.php");
   }
   ?>
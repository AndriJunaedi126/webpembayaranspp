<?php
 session_start();
 if($_SESSION['role'] == "admin"){
 }else{
    header("location:../login.php");
 }
?>
<?php
 session_start();
 if($_SESSION['role'] == "petugas"){
 }else{
    header("location:../login.php");
 }
?>
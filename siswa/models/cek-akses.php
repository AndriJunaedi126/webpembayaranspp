<?php
 session_start();
 if($_SESSION['role'] == "siswa"){
 }else{
    header("location:../login.php");
 }
?>
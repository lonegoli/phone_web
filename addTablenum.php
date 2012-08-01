<?php 
ob_start();
session_start();
$tablenum=$_POST['tablenum'];
$_SESSION['tablenum']=$tablenum;
?>
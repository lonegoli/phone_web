<?php
session_start();
ob_start();
$num=$_POST['num'];
$_SESSION['tablenum']=$num;
echo $num;
?>
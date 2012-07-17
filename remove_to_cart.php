<?php
session_start();
ob_start();
if($_POST['key']){
$key=$_POST['key'];
//第一步先更改商品总金额。
$num=$_SESSION[$key]['num'];
$price=$_SESSION[$key]['price'];
//之前我们已经把总金额保存在$_SESSION['totalamount']里了,所以这里只需减去移除商品的金额就可以了。
unset($_SESSION[$key]);//将相应的值从session中去除
$_SESSION['totalamount']-=$num*$price;
$_SESSION['tolnum']-=$num;
//第二步销毁该商品的变量。
unset($_SESSION[$key]);
echo $_SESSION['totalamount']; //返回更改后的总金额。
}
?>
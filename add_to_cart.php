<?php
session_start();
ob_start();//是为了防止出现Cannot modify header information之类的问题，可看一下http://www.googlephp.cn/archives/21这篇文章。
if($_POST['key']){
$key=$_POST['key'];
$name=$_POST['name'];
$num=$_POST['num'];
$price=$_POST['price'];
//我们把每一件商品信息都保存在$_SESSION['key']数组里。
//下面是一个逻辑判断，如果该商品是第一次加入购物车，就新创建一个$_SESSION['key']数组，否则数量就累加。
if(!isset($_SESSION[$key])){    //不存在$_SESSION[$key]这个变量，表示是第一次加入购物车。
$_SESSION[$key]['name']=$name;
$_SESSION[$key]['num']=$num;
$_SESSION[$key]['price']=$price;
} else{
$_SESSION[$key]['num']+=$num;
} 
  //$_SESSION['total']=0;
  $_SESSION['tolnum']='0';
  $_SESSION['totalamount']='0';
  //$_SESSION['test']='0';
  foreach($_SESSION as $key=>$value){
//包含"shoe字符串的才是我们真正需要的商品信息。"
$_SESSION['totalamount']+=$value['num']*$value['price'];
$_SESSION['tolnum']+=$value['num'];
//$_SESSION['total']['one']=$_SESSION['totalamount'];
//$_SESSION['total']['two']=$_SESSION['tolnum'];
//$_SESSION['total']=$_SESSION['totalamount'];
$to=$_SESSION['totalamount'].','.$_SESSION['tolnum'];

}
//$to=$_SESSION['totalamount'];
//$to=$_SESSION['total'];

echo $to;
}

//以上的php代码程序显示了如何保存每一件加入购物车的基本信息。
?>
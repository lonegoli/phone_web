<?php 
ob_start();
session_start();
$db=new SQLite3("db/temporary/temp.db3") or die("打开数据库失败");
$tablenum=$_SESSION['tablenum'];
foreach($_SESSION as $key=>$value){
if(strstr($key,"dish")){  
$dishID=substr($key,4);
//$diashname=$value['name'];
$dishnum=$value['num'];
//$dishprice=$value['price'];
			$sql=sprintf("insert into temporaryMainDish values(null,%d ,%d ,%d)",$dishID,$dishnum,$tablenum);
			$db->exec($sql) or die("提交菜单失败");
			$sql=sprintf("update table_info set status=2 where tablenum=%d",$tablenum);
			$db->exec($sql) or die("提交菜单失败");
}
}
		
$db->close();
$db=null;
session_unset();
ob_start();
session_start();
$_SESSION['tablenum']=$tablenum;
echo "提交成功了";
?>

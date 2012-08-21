<?php
ob_start();
session_start();
$tablenum=$_SESSION['tablenum'];

$db=new SQLite3("db/temporary/temp.db3") or die("打开数据库失败！");;
$sql=sprintf("select * from table_info where tablenum like %d",$tablenum);
$rs=$db->query($sql) or die("查询失败");
$row=$rs->fetchArray();
$tableID=$row['id'];

$sql=sprintf("select * from table_info where id=%d",$tableID);

$rs=$db->query($sql) or die("查询失败！");
$row=$rs->fetchArray();
$tableID=$row['id'];
$rs->finalize();
$db->close();
$rs=null;
$db=null;
//$db=new SQLite3("db/temporary/order.db3") or die("打开数据库失败");
$db=new SQLite3("db/temporary/order.db") or die("打开数据库失败！");
$sql=sprintf("select dish_id ,sum(quantity) from order_detail where order_id in (select id from table_order where table_id=%d) group by dish_id",$tableID);
$rs=$db->query($sql) or die("查询失败！");
$historyTotalPrice=0;
$db=new SQLite3("db/test.db3") or die("打开数据库失败！");
while($row=$rs->fetchArray())
{
	$sql=sprintf("select * from total_menu where id=%d",$row['dish_id']);
	$rs1=$db->query($sql) or die("查询失败！");
	$row1=$rs1->fetchArray();
	$historyTotalPrice+=$row1['price']*$row['sum(quantity)'];
echo $row1['name']."(". $row['sum(quantity)'].")<br/>";
}
echo "历史总价：".$historyTotalPrice;
$db->close();
$db=null;
?>
<?php 
//此处PHP为查询提交到PAD上还未确定的菜单
ob_start();
session_start();
$db=new SQLite3("db/temporary/temp.db3") or die("打开数据库失败");
$tablenum=$_SESSION['tablenum'];
$historyTotalPrice=0;
$sql=sprintf("select * from table_info where tablenum like %d",$tablenum);
$rs=$db->query($sql) or die("查询失败");
$row=$rs->fetchArray();
$tableID=$row['id'];

$sql=sprintf("select * from temporaryMainDish where tableID like %d",$tableID);
$rs=$db->query($sql) or die("查找失败！");
$db=new SQLite3("db/test.db3") or die("打开数据库失败！");
echo "<hr><b style='color:#0099FF'>待服务员确认菜品:</b><hr>";
while($row=$rs->fetchArray())
{
	$sql=sprintf("select * from total_menu where id=%d",$row['dishID']);
	$rs1=$db->query($sql) or die("查询失败！");
	$row1=$rs1->fetchArray();
	$historyTotalPrice+=$row1['price']*$row['dishnum'];
echo $row1['name']."(". $row['dishnum'].")<br/>";
}
echo "<hr>";
$db->close();
$db=null;

?>


<?php
//此处为查询提交并已确认的菜单
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
$db=new SQLite3("db/test.db3") or die("打开数据库失败！");
echo "<hr><b style='color:#0099FF'>服务员已确认菜品:</b><hr>";
while($row=$rs->fetchArray())
{
	$sql=sprintf("select * from total_menu where id=%d",$row['dish_id']);
	$rs1=$db->query($sql) or die("查询失败！");
	$row1=$rs1->fetchArray();
	$historyTotalPrice+=$row1['price']*$row['sum(quantity)'];
echo $row1['name']."(". $row['sum(quantity)'].")<br/>";
}
echo "总价：￥".$historyTotalPrice;
$db->close();
$db=null;
?>
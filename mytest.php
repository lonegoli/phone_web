<?php

//$db=new SQLite3("db/temporary/order.db3") or die("打开数据库失败");
$db=new SQLite3("db/temporary/order.db") or die("打开数据库失败！");
$sql=sprintf("select * from order_detail where order_id in (select id from table_order where table_id=%d) group by dish_id",27);
$rs=$db->query($sql) or die("查询失败！");
$db=new SQLite3("db/test.db3") or die("打开数据库失败！");
while($row=$rs->fetchArray())
{
	$sql=sprintf("select * from total_menu where id=%d",$row['dish_id']);
	$rs1=$db->query($sql) or die("查询失败！");
	$row1=$rs1->fetchArray();
	
echo $row1['name']."<br/>";
}
$db->close();
$db=null;
?>
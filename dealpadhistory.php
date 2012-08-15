<?php 
ob_start();
session_start();
$db=new SQLite3("db/temporary/temp.db3") or die("打开数据库失败");
$tablenum=$_SESSION['tablenum'];
$sql=sprintf("select * from temporaryMainDish where tablenum like %d",$tablenum);
$rs=$db->query($sql) or die("查找失败！");
$db=new SQLite3("db/test.db3") or die("打开数据库失败！");
while($row=$rs->fetchArray())
{
	$sql=sprintf("select * from total_menu where id=%d",$row['dishID']);
	$rs1=$db->query($sql) or die("查询失败！");
	$row1=$rs1->fetchArray();
echo $row1['name']."(". $row['dishnum'].")<br/>";
}
$db->close();
$db=null;

?>

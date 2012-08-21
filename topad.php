<?php 
ob_start();
session_start();
include('quote.php');
$db=new SQLite3("db/temporary/temp.db3") or die("打开数据库失败");
$tablenum=$_SESSION['tablenum'];
$sql=sprintf("select * from table_info where tablenum like %d",$tablenum);
$rs=$db->query($sql) or die("查询失败");
$row=$rs->fetchArray();
$tableID=$row['id'];


foreach($_SESSION as $key=>$value){
if(strstr($key,"dish")){  
$dishID=substr($key,4);
//$diashname=$value['name'];
$dishnum=$value['num'];
//$dishprice=$value['price'];
          
           $sql=sprintf("select * from temporaryMainDish where dishID like %d and tableID like %d",$dishID,$tableID);
		   $rs=$db->query($sql) or die("查找失败！");
			if($rs->fetchArray())
			{
				$sql=sprintf("update temporaryMainDish set dishnum=dishnum+%d where dishID=%d and tableID=%d",$dishnum,$dishID,$tableID);
				$db->exec($sql) or die("提交失败！");
			}
			else
			{
			$sql=sprintf("insert into temporaryMainDish values(null,%d ,%d ,%d)",$dishID,$dishnum,$tableID);
			$db->exec($sql) or die("提交失败！");
			}
			
			
}
}	
$sql=sprintf("update table_info set status=status+50 where id=%d and status<50",$tableID);
$db->exec($sql) or die("提交失败！");	
$db->close();
$db=null;
session_unset();
//ob_start();
//session_start();
$_SESSION['tablenum']=$tablenum;
echo "第".$_SESSION['tablenum']."桌提交成功！".$tableID;
?>

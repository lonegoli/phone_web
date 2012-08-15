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
           $sql=sprintf("select * from temporaryMainDish where dishID like %d and tablenum like %d",$dishID,$tablenum);
		   $rs=$db->query($sql) or die("查找失败！");
			if($rs->fetchArray())
			{
				$sql=sprintf("update temporaryMainDish set dishnum=dishnum+%d where dishID=%d and tablenum=%d",$dishnum,$dishID,$tablenum);
				$db->exec($sql) or die("提交失败！");
			}
			else
			{
			$sql=sprintf("insert into temporaryMainDish values(null,%d ,%d ,%d)",$dishID,$dishnum,$tablenum);
			$db->exec($sql) or die("提交失败！");
			}
			
			$sql=sprintf("update table_info set status=2 where tablenum=%d",$tablenum);
			$db->exec($sql) or die("提交失败！");
}
}		
$db->close();
$db=null;
session_unset();
//ob_start();
//session_start();
$_SESSION['tablenum']=$tablenum;
echo "第".$_SESSION['tablenum']."桌提交成功！";
?>

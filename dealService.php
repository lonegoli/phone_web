<?php
session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
<script type="text/javascript">     
function countDown(secs,surl){     
 //alert(surl);     
 var jumpTo = document.getElementById('jumpTo');
 jumpTo.innerHTML=secs;  
 if(--secs>0){     
     setTimeout("countDown("+secs+",'"+surl+"')",1000);     
     }     
 else{       
     location.href=surl;     
     }     
 }     
</script> 
</head>
<body>
<?PHP  
//include('quote.php');
//$db=openSQLite3Table_info_temporary();
$db=new SQLite3("db/temporary/temp.db3") or die("打开数据库失败！");
   if(!empty($_POST["t1"]))
    {  
	   $array = $_POST["t1"];  
	   $size = count($array);
	   
	   for($i=0; $i< $size; $i++)
	      
		  {  
		  $sql=sprintf("insert into callWaiter values(null,%d,%d)",$_SESSION['tablenum'],$array[$i]);
		  $db->exec($sql) or die("呼叫失败！");
		  
		  }  
    } 
$db->close();
$db=null;
?> 

<span>尊敬的客户！您已提交成功，请稍等服务员来处理。</span><span id="jumpTo">3</span>秒后自动跳转到首页。
</body>
</html>
<script>
countDown(3,'index.php');
</script>
<?php
ob_start();
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<meta name="MobileOptimized" content="320" />
<link rel="stylesheet" href="css/main.css" type="text/css">
 <script src="js/jquery.min.js" type="text/javascript"></script>
 <script type="text/javascript" src="js/public.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	jQuery.navlevel2 = function(level1,dytime) {
		
	  $(level1).mouseenter(function(){
		  varthis = $(this);
		  delytime=setTimeout(function(){
			varthis.find('ul').slideDown();
		},dytime);
	  });
	  $(level1).mouseleave(function(){
		 clearTimeout(delytime);
		 $(this).find('ul').slideUp();
	  });
	  
	};
  $.navlevel2("li.mainlevel",200);
});
</script>
<script   language="javascript">
    var   flag1=0;
    var   flag2=0;
    function   NumberInc(obj)
    {
    if(flag1==1   &&   flag2==1)
    {alert("Error!");}
    else
    {
    if(flag1==1)
    {
		if(obj.shoenum.value==0)
		{
			alert("����Ĳ���");
		}
		else
		{
		obj.shoenum.value--;
		}
    }
    if(flag2==1)
    {		
    obj.shoenum.value++;

    }
    }
    }

    function   md1(obj)
    {
		flag1=1;
    NumberInc(obj);
    }
	function   md2(obj)
    {
		flag2=1;
    NumberInc(obj);
    }
	
	
    function   mo1(obj)
    {
    
		//alert("1");
		  flag1=0;
    
    }
	function   mo2(obj)
    {
    
		//alert("2");
		  flag2=0;
    
    }
</script>
<style>
body {font:12px/normal Verdana, Arial, Helvetica, sans-serif;}
ul,li {list-style-type:none; text-transform:capitalize;}
/*menu*/
#nav { display:block;}
#nav .jquery_out {float:left;line-height:32px;display:block; border-right:1px solid #fff; text-align:center; color:#fff;font:18px/32px "微软雅黑"; background:#062723 url(../images/slide-panel_03.png) 0 0 repeat-x;}
#nav .jquery_out .smile {padding-left:1em;}
#nav .jquery_inner {margin-left:16px;}
#nav .jquery {margin-right:1px;padding:0 2em;}
#nav .mainlevel {background:#164C3F; float:left; border-right:1px solid #fff; width:24%;/*IE6 only*/}
#nav .mainlevel a {color:#ffffff; text-decoration:none; line-height:32px; display:block; text-decoration:none; padding:0 20px; width:400px;}
#nav .mainlevel a:hover {color:#fff; text-decoration:none;}
#nav .mainlevel ul {display:none; position:absolute;}
#nav .mainlevel li {border-top:1px solid #fff; background:#164C3F; width:20%;/*IE6 only*/}
</style> 
<title>菜脑壳</title>
</head>
<body>
<div id="container">
<div id="head">
<?php
$db=new SQLite3("db/test.db3");
$rs=$db->query('select * from table_show');
$colNum=$rs->numColumns();
echo ' <ul id="nav"> 
       <li class="mainlevel"><a href="#">产品分类</a>
	   <ul>';
	while ($row = $rs->fetchArray())
	{ 
	for ($i = 0; $i < $colNum; $i++)
	{
	if ($rs->columnName($i) == 'class')
	{
	echo '<li><a href="index.php?tablename='.$row[$i].'" ><span>' . $row[$i] . '</span></a></li>'; 
	}
	}
	}

echo '</ul><li class="mainlevel"><a href="check_out.php" ><span>购物车</span></a></li>';
echo '<li class="mainlevel"><a href="#" ><span>关于我们</span></a></li>';
echo '<li class="mainlevel"><a href="#" ><span>娱乐</span></a></li>';
echo '</ul>';


////////////////////////////////////////////////////////
if(isset($_GET["tablename"]))
{
	$tablename=$_GET["tablename"];
	$changname=sprintf("select * from table_show where class like '%s'",$tablename);
	$rs=$db->query($changname);
	$row=$rs->fetchArray();
	$newtablename=$row['tablename'];
	
	
}
else
{
	$newtablename="dish1";
}
	$sql=sprintf("select * from %s",$newtablename);
	echo '</br><hr>';
	$rs=$db->query($sql);
	$colNum = $rs->numColumns();
	while ($row = $rs->fetchArray())
	{
	if($row['pictureBUrl'] != null)
	{ 
	echo '<img src=upload/ftp_temp/temp/'.$row['pictureBUrl'].' height="40%"> </br>';
	}
	echo '<form>';
	echo '<table>';
	$id="dish".$row['id'];
	echo '<input type="hidden" name="key" value="'.$id.'">';
	echo '<input type="hidden" name="shoename" value="'.$row['name'].'">';
	echo '<input type="hidden" name="shoeprice" value="'.$row['price'].'">';	
	echo "<tr><td>".$row['name']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>￥：".$row['price']."</td></tr>";
	echo "<tr><td>"; 
	?>
	<input type="button" name="button1" value="-"  onClick="md1(this.form);" onMouseOut="mo1(this.form);"   onMouseUp="mo1(this.form);">
	<input style="width:23%;" type="text" id="shoenum" name="shoenum" value="1">
	<input type="button" name="button2" value="+"  onClick="md2(this.form);" onMouseOut="mo2(this.form);"   onMouseUp="mo2(this.form);">

	<?php 
	echo "</td>";
	echo "<td><input class='shopping' type='button' value='加入购物车' onClick='add_to_cart(this.form);changeColor(red)'></td></tr>";
	echo '</table>';
	echo '</form>';
	echo '<hr>';
	} 
	
	$rs->finalize();
	$db->close();
	
	$rs = null;
	$db = null;

?>
</div>
<hr>
<div id="down" align="left"><img src="image/logo.gif" width="129" height="68" />
	  Copyright @copy; 菜脑壳版权所有
									  | <a href="index.php">返回首页</a> | <a href="#">维护管理</a> |									 
</div> 
</div>	
</body>
</html>

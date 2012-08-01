<?php
ob_start();
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title></title>
<link href="css/clearbox.css" rel="stylesheet" type="text/css" />
<script src="js/clearbox.js" type="text/javascript"></script>
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
html, body, ul, li {
    margin: 0;
    padding: 0;
}
body {
    padding: 0;
}
.test {
    background: none repeat scroll 0 0 #EEEEEE;
    margin: 20px;
}
.header {
    height: 40px;
    margin: 0 auto;
    max-width: 100%;
}
.center {
    border-top: 1px solid #000000;
    margin: 0 1%;
}
ul, li {
    list-style-type: none;
    text-transform: capitalize;
}
#nav {
    display: block;
}
#nav .jquery_out {
    background: url("../images/slide-panel_03.png") repeat-x scroll 0 0 #062723;
    border-right: 1px solid #FFFFFF;
    color: #FFFFFF;
    display: block;
    float: left;
    font: 18px/32px "微软雅黑";
    text-align: center;
}
#nav .jquery_out .smile {
    padding-left: 1em;
}
#nav .jquery_inner {
    margin-left: 16px;
}
#nav .jquery {
    margin-right: 1px;
    padding: 0 2em;
}
#nav .mainlevel {
    background: none repeat scroll 0 0 #164C3F;
    float: left;
    height: 95%;
    width: 25%;
}
#nav .mainlevel a {
	
    color:#FFFFFF;
    display: block;
    line-height: 32px;
    padding: 0;
	border-right: 1px solid #FFFFFF;
    text-align: center;
    text-decoration: none;
   
}
#nav .mainlevel a:link
{
	color:#FFFFFF;
	text-decoration:none;
}
#nav .mainlevel a:visited
{
	color:#FFFFFF;
	text-decoration:none;
}
#nav .mainlevel a:hover {
    color: #FFFFFF;
    text-decoration: none;
}
#nav .mainlevel a:active
{
	color:#FFFFFF;
	text-decoration:none;
}
#nav .mainlevel ul {
    display: none;
    position: absolute;
}
#nav .mainlevel li {
    background: none repeat scroll 0 0 #164C3F;
    border-top: 1px solid #FFFFFF;
}
.oneContent
{
	overflow:hidden;
}

.divImage {
    height:150px;
	width:40%;
	float:left;
}
.textContent
{
	clear: right;
	padding:10px 0 0 10px;
	float:left;
	max-width:55%;
}
.down
{
	margin-top:90px;
	background-color:#CCC;
}
</style>
<style type="text/css">
.go{width:70px;height:70px;background-color:#999;float:right;border-radius:5px;box-shadow:0 0 2px #6E6E6E;border:2px solid #666;text-align:center;}
.PTop{text-decoration: none;color:#333;}
</style> 
</head>
<body>
<?php
$db=new SQLite3("db/test.db3");
$rs=$db->query('select * from table_show');
$colNum=$rs->numColumns();
echo '  <a name="top" id="top"></a><div class="header">
       <ul id="nav"> 
       <li class="mainlevel"><a href="#">分类</a>
	   <ul style="width:100%;">';
	while ($row = $rs->fetchArray())
	{ 
	for ($i = 0; $i < $colNum; $i++)
	{
	if ($rs->columnName($i) == 'class')
	{
	echo '<li style="width:25%;"><a href="index.php?tablename='.$row[$i].'" ><span>' . $row[$i] . '</span></a></li>'; 
	}
	}
	}

echo '</ul><li class="mainlevel"><a href="check_out.php" ><span>购物车</span></a></li>';
echo '<li class="mainlevel"><a href="service.php" ><span>服务</span></a></li>';
echo '<li class="mainlevel" ><a href="recreation.html"  ><span>娱乐</span></a></li>';
echo '</ul>
      </div>
      <div class="center">';


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
	echo '<div class="oneContent"><div class="divImage"><a href="upload/ftp_temp/temp/'.$row['pictureBUrl'].'" rel="clearbox"><img src="upload/ftp_temp/temp/'.$row['pictureBUrl'].'"  height="100%" width="100%"></a> </div></br>';
	}
	echo '<div class="textContent"><form>';
	echo '<table>';
	$id="dish".$row['id'];
	echo '<input type="hidden" name="key" value="'.$id.'">';
	echo '<input type="hidden" name="shoename" value="'.$row['name'].'">';
	echo '<input type="hidden" name="shoeprice" value="'.$row['price'].'">';	
	echo "<tr><td>名称：".$row['name']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
	echo "<tr><td>单价：￥ ".$row['price']."</td></tr>";
	echo "<tr><td>数量："; 
	?>
	<input type="button" name="button1" value="-"  onClick="md1(this.form);" onMouseOut="mo1(this.form);"   onMouseUp="mo1(this.form);">
	<!--<input style="width:10%;" type="text" id="shoenum" name="shoenum" readonly="readonly" onfocus="this.blur" value="1">-->
    <input style="width:15%;background-color:#FFF;border:1px solid #999;" type="button" id="shoenum" name="shoenum"  value="1">
	<input type="button" name="button2" value="+"  onClick="md2(this.form);" onMouseOut="mo2(this.form);"   onMouseUp="mo2(this.form);">

	<?php 
	echo "</td></tr>";
	echo "<tr><td><input type='button' value='加入购物车' onClick='add_to_cart(this.form),changeColor(red)'><span id=\"showbuydish".$row['id']."\" style=\"color:red;\">";
	if(isset($_SESSION[$id]))
	{
		echo "已点(".$_SESSION[$id]['num'].")";
	}
	echo "</span></td></tr>";
	echo '</table>';
	echo '</form></div></div>';
	echo '<hr>';
	} 
	
	$rs->finalize();
	$db->close();
	
	$rs = null;
	$db = null;

?>
<div style="overflow:hidden;margin-top:-180px;">
<div class="go">
	<a title="返回顶部"  class="PTop" style="line-height:24px;" href="#top" target="_self">返回<br/>至顶部<br/><br/></a>
	<!--<a title="如果您有意见，请反馈给我们！" class="feedback" href="http://www.txcomcom.com" target="_blank">反馈</a>
	<a title="返回底部" class="PBottom" href="#PositionFoot">至底部</a>-->
</div>
</div>
<div class="down" align="center" ><img  src="image/logo.gif" width="129" height="68" />
	  <p style="text-align:center;margin-top: -20px;">Copyright@2012 www.cainaoke.com All Rights Reserved	</p>							 
</div> 
</body>
</html>

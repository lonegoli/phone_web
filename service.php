<?php 
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="keywords" content="菜脑壳" />
<meta name="description" content="菜脑壳" />
<title>菜脑壳服务</title>
<script src="js/jquery.min.js" type="text/javascript"></script>
<!--提交代码-->

<script type="text/javascript">
function createXMLHttpRequest(){
if(window.XMLHttpRequest){//非IE浏览器
			xmlHttp=new XMLHttpRequest();
		}
		else if(window.ActiveXObject){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

 }
 
function Todeal(tablenum){
createXMLHttpRequest();
var postStr="tablenum="+tablenum;;
xmlHttp.open("post", "addTablenum.php");
xmlHttp.setRequestHeader("cache-control","no-cache"); 
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xmlHttp.send(postStr);

xmlHttp.onreadystatechange=function()
{
if (4==xmlHttp.readyState){
                if (200==xmlHttp.status)
				{
				
                }
				else
				{
                    alert("发生错误!");
                }
            }
}
}

</script>
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
<style>
html, body, ul, li {
    margin: 0;
    padding: 0;
}
body {
    padding: 0;
	background-color:#2D3033;
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
    border-right: 1px solid #FFFFFF;
    float: left;
    height: 95%;
    width: 24.8%;
}
#nav .mainlevel a {
    color:#FFFFFF;
    display: block;
    line-height: 32px;
    padding: 0;
    text-align: center;
    text-decoration: none;
    width: 100%;
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
.videopic{
	width:90%;
	height:auto;
	border-color: #33373B;
    border-radius: 5px 5px 5px 5px;
    border-style: solid;
    border-width: 9px;
}


.footer {
	TEXT-ALIGN: center; PADDING-BOTTOM: 40px; MARGIN: 40px 0px 0px; FONT-SIZE: 18px; text-shadow: rgba(255, 255, 255, 0.08) 0 1px 0
}
.footer {
	BORDER-BOTTOM-WIDTH: 0px; COLOR: #0e0f10; TEXT-DECORATION: none
}
.footer A {
	BORDER-BOTTOM-WIDTH: 0px; COLOR: #0e0f10; TEXT-DECORATION: none
}
.footer SPAN {
	DISPLAY: block
    font-size: 18px;
}
</style>

<style>
body {
	margin:0;
	padding:0;
	

}
h1 {
	color:#000;
}
.main {
	/*background-image:url("image/forme.gif");*/
	/*filter:alpha(opacity=30);
 -moz-opacity:0.3;
 -khtml-opacity: 0.3;
 opacity: 0.3;*/
 border:2px solid #0CF;
}
.down
{
	margin-top:90px;
	background-color:#CCC;
}
.check{
	padding:10px;
}
</style>

<!--弹出层样式及JS-->
<style>
#container { 
 	min-height: 100%;
	height: auto !important; 
	height: 100%; 
    width:100%; 
	margin:0 auto;
	position:absolute;
	top:0;
	left:0;
}
#loginBoxContent{
	height:140px;
	width:70%;
	background:white;
	z-index:9998;
	border:1px solid #009966;
	float:top;
	margin:0px auto;
	
}
#loginBoxStyle{
	height:100%;
	width:100%;
	filter:alpha(opacity=70);
	-moz-opacity:0.78;
	opacity:0.7;
	background: #000000;
}
#loginBoxMain{
	position:absolute;
	top:0;
	left:0;
	height:100%;
	width:100%;
	z-index:101;
	/*display:none;*/
}

#loginBoxTitle{
	height:35px;
	width:70%;
	color: #009966;
	background:white;
	z-index:9998;
	border:1px solid  #009966;
	margin:0px auto;
	
}
#loginBoxOutline{
	z-index:999;
	position: absolute;
	width:100%;
	top:50px;
	font-size:28px;
}
#loding{
	display:none;
	position: absolute;
    top: 200px;
	width:100%;
}
</style>
<script type="text/javascript">
	function hideLoginBox(object){
		var TableNumber=document.getElementById(object).value;
		if(TableNumber!=""){
			$("div#loginBoxMain").css("display","none");
			//$("div#loding").css("display","block");
			Todeal(TableNumber);
			//countDown(3,'http://www.cainaoke.com/');
		}
		else if(TableNumber==""){
			alert('请输入桌号');
		}
		else{
			alert(TableNumber+'号桌当前未清台，或无此桌。请检查输入的桌号是否与桌面号码一致。');
		}
	}
</script>

<script type="text/javascript">
var rDrag = {
	
	o:null,
	
	init:function(o){
		o.onmousedown = this.start;
	
	},
	start:function(e){
		var o;
		e = rDrag.fixEvent(e);
               e.preventDefault && e.preventDefault();
               rDrag.o = o = document.getElementById('loginBoxOutline');
		o.x = e.clientX - rDrag.o.offsetLeft;
                o.y = e.clientY - rDrag.o.offsetTop;
		document.onmousemove = rDrag.move;
		document.onmouseup = rDrag.end;
	},
	move:function(e){
		e = rDrag.fixEvent(e);
		var oLeft,oTop;
		oLeft = e.clientX - rDrag.o.x;
		oTop = e.clientY - rDrag.o.y;
		rDrag.o.style.left = oLeft + 'px';
		rDrag.o.style.top = oTop + 'px';
	},
	end:function(e){
		e = rDrag.fixEvent(e);
		rDrag.o = document.onmousemove = document.onmouseup = null;
	},
    fixEvent: function(e){
        if (!e) {
            e = window.event;
            e.target = e.srcElement;
            e.layerX = e.offsetX;
            e.layerY = e.offsetY;
        }
        return e;
    }
}
window.onload = function(){
        var obj = document.getElementById('loginBoxTitle');
	rDrag.init(obj);
}
</script>
</head>
<body>
<?php
$db=new SQLite3("db/test.db3");
$rs=$db->query('select * from table_show');
$colNum=$rs->numColumns();
echo ' <div class="header">
       <ul id="nav"> 
       <li class="mainlevel"><a href="#">分类</a>
	   <ul style="width:100%;">';
	while ($row = $rs->fetchArray())
	{ 
	for ($i = 0; $i < $colNum; $i++)
	{
	if ($rs->columnName($i) == 'class')
	{
	echo '<li style="width:24%;"><a href="index.php?tablename='.$row[$i].'" ><span>' . $row[$i] . '</span></a></li>'; 
	}
	}
	}

echo '</ul><li class="mainlevel"><a href="check_out.php" ><span>购物车</span></a></li>';
echo '<li class="mainlevel"><a href="#" ><span>服务</span></a></li>';
echo '<li class="mainlevel"><a href="recreation.html" ><span>娱乐</span></a></li>';
echo '</ul>
      </div>';
      ?>
<div class="main">
<form method="post" action="dealService.php" name="form1">
<?php

include('quote.php');
$db=openSQLite3();
$rs = $db->query('select * from serviceList');
if(!$rs)
{
	die(ERR_SELECT_DB);
}

 //获取列字段数量
 $colNum = $rs->numColumns(); 

 while ($row = $rs->fetchArray())
 { 
     for ($i = 0; $i < $colNum; $i++)
     {
         //判断name字段来输出表名
         if ($rs->columnName($i) == 'serviceName')
         {
             echo '<input type="checkbox" class="check" name="bha" value="'.$row[0].'" >'.$row[$i].'<br/><br/>'; 
        }
     }
 } 

 $rs->finalize();
 $db->close(); 
 $rs = null;
 $db = null;

?>

<p>
<input type="submit" value="提交"> 
</p>
</form>
</div>
<div class="down" align="center" ><a href="manage/index.php"><img  src="image/logo.gif" width="129" height="68" /></a>
	  <p style="text-align:center;margin-top: -20px;">Copyright@2012 www.cainaoke.com All Rights Reserved	</p>							 
</div>

<?php
if(isset($_SESSION['tablenum']))//判断用户是否输入过桌号
{
	
}
else
{
	echo "
	      
<div id=\"loginBoxMain\">
	<div id=\"loginBoxStyle\">
    <!--<div id=\"loding\"><img src=\"image/loading.gif\" style=\"margin:0 0 0 30%;\">	</div>-->
	</div>
	<div id=\"loginBoxOutline\">
	<div id=\"loginBoxTitle\" onmouseover=\"this.style.cursor='move'\">
		<b style=\"position:relative;left:10px;top:3px\">输入桌号</b>	</div>
	<div id=\"loginBoxContent\" >
		<form action=\"#\" method=\"post\">
			<table  style=\"margin:0px auto;\">
			<tr><td  style=\"padding-top:20px\">桌号: <input id=\"tablenum\" type=\"text\" name=\"Number\" style=\"width:60%;height:20px;\" onkeyup=\"this.value=this.value.replace(/\D/g,'')\" onafterpaste=\"this.value=this.value.replace(/\D/g,'');\"></td></tr>
			<tr><td style=\"text-align:center;margin:0px auto; padding-top:20px;\"><input type=\"button\" name=\"submit\" style=\"height:40px;width:50%; font-size:28px;\" value=\"提交\" onClick=\"hideLoginBox('tablenum')\"/>
			</table>
		</form>	
	</div>	
</div>
</div>

	
		
	";
}
 
?>
 
</body>
</html>

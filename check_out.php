<?php
ob_start();
session_start();
?>
<script type="text/javascript">
function createXMLHttpRequest(){
if(window.XMLHttpRequest){//非IE浏览器
			xmlHttp=new XMLHttpRequest();
			if(!xmlHttp)
			{
				alert("创建对象失败");
			}
		}
		else if(window.ActiveXObject){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			if(!xmlHttp)
			{
				alert("创建对象失败");
			}
		}
 }
 

function checknum(total){
	var total1=document.getElementById("totalamount2").childNodes[0].nodeValue;
	if(total==0||total1==0)
	{
		alert("尊敬的用户，您还没点菜！")
		return false;
	}
	return true;
}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>购物车</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
var browser={    versions:function(){            
var u = navigator.userAgent, app = navigator.appVersion;            
return {                
trident: u.indexOf('Trident') > -1, //IE内核               
presto: u.indexOf('Presto') > -1, //opera内核               
webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核                
gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核               
mobile: !!u.match(/AppleWebKit.*Mobile.*/)||!!u.match(/AppleWebKit/), //是否为移动终端              
ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端                
android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器                
iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1, //是否为iPhone或者QQHD浏览器                
iPad: u.indexOf('iPad') > -1, //是否iPad                
webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部        
};
}()
} 
if(browser.versions.android==false)
{
	document.writeln('<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">');
}
</script>

<meta name="MobileOptimized" content="320" />
<link rel="stylesheet" href="css/base.css" />
<link rel="stylesheet" href="css/shoppingcart.css" />



<link rel="stylesheet" href="css/fx.slide.css" type="text/css" media="screen" />
	<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>

	<script language="javascript" >
		$(function(){
		   $("#toggleLogin").toggle(function(){
		        $("#login").parent("div").animate({ height : 105 } , 520 );
				$("#login").animate({marginTop : 0 } , 500 );
				$(this).blur();
				document.getElementById("toggleLogin").innerHTML="关闭";
		   },function(){
			    $("#login").parent("div").animate({ height : 0 } , 500 );
				$("#login").animate({marginTop : -105 } , 520 ); 
				$(this).blur();
				document.getElementById("toggleLogin").innerHTML="更改桌号";
		   });
		   $("#closeLogin").click(function(){
		        $("#login").parent("div").animate({ height : 0 } , 500 );
				$("#login").animate({marginTop : -105 } , 520 ); 
				document.getElementById("toggleLogin").innerHTML="更改桌号";
		   });
		})
	</script>









<!--隐藏层样式-->
<style type="text/css">
.closeOne{
	background: url("image/b-right.png") no-repeat scroll left center transparent;
	color:#09F;
	margin-left: 3px;
    padding-left: 16px;
	cursor: pointer;
}
.openOne{
	background: url("image/b-down.png") no-repeat scroll left center transparent;
	color:#09F;
	margin-left: 3px;
    padding-left: 16px;
	cursor: pointer;
}
.one{
	background: url("image/menubg2.png") repeat-x scroll 0 0 #FDFDFD;
    border: 1px solid #E0EDF4;
	border-radius:2px 2px 2px;
    padding: 1px;
    width: 230px;
	-webkit-box-shadow:2px 2px #999;
	box-shadow:2px 2px #999;
}
#box,#box2,#box3,#box4{padding:10px;} 
.one td,.one th{
	border:1px solid #6CC;
	padding:0 20px 0 0;
}
</style>
<!--隐藏层JS-->
<script type="text/javascript">
//=点击展开关闭效果=

function dealhistory(boxname,historyId){
createXMLHttpRequest();
var postStr="tablenum="+1;
/*if(boxname=='box2')
{
	xmlHttp.open("post", "dealpadhistory.php");
}

if(boxname=='box3')
{*/
xmlHttp.open("post", "dealhistory.php");
//}

xmlHttp.setRequestHeader("cache-control","no-cache"); 
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xmlHttp.send(postStr);
xmlHttp.onreadystatechange=function()
{
if (4==xmlHttp.readyState){
                if (200==xmlHttp.status)
				{
					document.getElementById(historyId).innerHTML=xmlHttp.responseText;
                }
				else
				{
                    alert("发生错误!");
                }
            }
}
}





function openShutManager(oSourceObj,oTargetObj,shutAble,oOpenTip,oShutTip,historyId){
var sourceObj = typeof oSourceObj == "string" ? document.getElementById(oSourceObj) : oSourceObj;
var targetObj = typeof oTargetObj == "string" ? document.getElementById(oTargetObj) : oTargetObj;
var openTip = oOpenTip || "";
var shutTip = oShutTip || "";
if(targetObj.style.display!="none"){
   if(shutAble) return;
   targetObj.style.display="none";
   if(openTip  &&  shutTip){
	sourceObj.className="closeOne"; 
    sourceObj.innerHTML = shutTip; 
   }
} else {
   targetObj.style.display="block";
   if(openTip  &&  shutTip){
	sourceObj.className="openOne"
    sourceObj.innerHTML = openTip; 
	dealhistory(oTargetObj,historyId);
   }
}
}
</script>

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
<script src="js/jquery.min.js" type="text/javascript"></script>
<!--提交代码-->

<script type="text/javascript">
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
					//alert("提交成功!");
				    //alert(xmlHttp.responseText);
					//alert(document.getElementById("showtablenum").innerHTML);
					document.getElementById("showtablenum").innerHTML="(桌位号:"+tablenum+")";
                }
				else
				{
                    alert("发生错误!");
                }
            }
}
}



function Ajax(object){
var data=document.getElementById(object).value;
createXMLHttpRequest();
var postStr="tablenum="+data;
xmlHttp.open("post", "tablechk.php");
xmlHttp.setRequestHeader("cache-control","no-cache"); 
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xmlHttp.send(postStr);
xmlHttp.onreadystatechange=function()
{
if (4==xmlHttp.readyState){
                if (200==xmlHttp.status)
				{
					if(xmlHttp.responseText=="true")
					{
						alert("该桌号不存在，请重新输入！");
						document.getElementById(object).value="";
						document.getElementById(object).focus();
					}
					else
					{
						$("div#loginBoxMain").css("display","none");
			    //$("div#loding").css("display","block");
			            Todeal(data);
						document.getElementById(object).value="";
			  //countDown(3,'http://www.cainaoke.com/'); 		
					}
               }
               else{
                       alert("发生错误!");
                   }
           }
}
}

</script>

<!--跳转函数-->
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

<script type="text/javascript">
	function hideLoginBox(object){
		var TableNumber=document.getElementById(object).value;
		if(TableNumber!=""){
			Ajax(object);
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




<script type="text/javascript" src="js/public.js"></script>
</head>
<body class="SCStep1" style="position: relative;">





<div style="margin: 0px; overflow: hidden; position: relative; height: 0px;">
		<div id="login" style="margin: -210px 0px 0px; height:210px;">
			<div class="loginContent">
				<form action="#" method="post" onSubmit="Ajax('new');return false">
                <table>
                <tr>
					<!--<label for="log"><b>当前餐桌号: </b></label>
					<input class="field" type="text" name="old" id="old" value="" size="15" />-->
					<td><label style="font-size:24px;color:#FFF;"><b>新餐桌号:</b></label></td>
					<td><input class="field" type="number" name="new" id="new"  style="font-size:14px;width:80px;" onKeyUp="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'');"/></td>
					<td><input type="submit" name="submit" id="closeLogin" value="确定" class="button_login" /></td>
                    </tr>
                    </table>
				</form>
			</div>
			<!--<div class="loginClose"><a href="#" id="closeLogin">关闭</a></div>-->
		</div> 
	</div> 
	<!-- /login -->

    <div id="openAndClose">
		<div id="top">
		<!-- login -->
			<ul class="login">
		    	<li class="left">&nbsp;</li>
				<li><span style="background-image:url("image/sanjiao.png")"></span><a id="toggleLogin" href="#" style="text-decoration: none;">更改桌号</a></li>
			</ul> <!-- / login -->
		</div> <!-- / top -->

        <div class="clearfix"></div>
        </div>





<?php

$products=array(); 
foreach($_SESSION as $key=>$value){
if(strstr($key,"dish")){  
$products[$key]['name']=$value['name'];
$products[$key]['num']=$value['num'];
$products[$key]['price']=$value['price'];
}
}
?>

<div class="main clearfix" id="cartbody">
<div class="shoppingCart">
    <table width="97%" height="252" class="dataPanel">
        <caption>我的餐车信息<?php if(isset($_SESSION['tablenum'])) {echo "<span id=\"showtablenum\" style=\"color:red;\">(  桌号:".$_SESSION['tablenum'].")</span>";} else {echo "<sapn id=\"showtablenum\" style=\"color:red;\">(还未选定桌位号)</span>";}?></caption>
        <thead>
            <tr>
                 <td width="32%" height="106" class="infos">名称</td>
                 <td width="14%" class="infos">单价</td>
                 <td width="14%" class="infos">数量</td>
                 <td width="16%" class="infos">总价</td>
                 <td width="24%" class="infos">移除</td>

            </tr>
        </thead>
        <tfoot>
            <tr> 
                <td height="110" colspan="6">
                    <p class="total"><strong>总金额:<em>￥</em></strong><em id="totalamount2"><?php 
					if(!isset($_SESSION['totalamount']))
					{
					echo 0;
					}
					else
					{
						echo $_SESSION['totalamount'];
					}?></em></p>
                    
                    <div  class="clearfix">
                    
                    <a href="index.php" style="text-decoration:none; float:left; line-height:27px;border:1px solid #C3C3C3;background-color:#ECECEC ;color:333333;border-radius:4px 4px 4px 4px;">继续点菜</a>
               
                    
                    <a id="beforegotoorder2" style="text-decoration:none;float:right; line-height:27px;border:1px solid #C3C3C3;background-color:#ECECEC ;color:333333;border-radius:4px 4px 4px 4px;"" href="dealOrder.html" onClick="return checknum(<?php if(!isset($_SESSION['totalamount'])){echo 0;} else {echo $_SESSION['totalamount'];}?>)" >提交</a>
                    </div>
                    <div></div>
                </td>
            </tr>
        </tfoot>
		
        <?php foreach($products as $key=>$product){ 
        //if($product['num']==0)
		//{
		//}
		//else
		//{
		?>
      
<tbody>
<tr class="row1  myclassforcartitem" >
<td height="42" class="infos" style="line-height:16px"><?php echo $product['name'];?></td>
<td class="infos"><?php echo $product['price'];?></td>
<td class="infos"><?php echo $product['num'];?></td>
<td class="infos"><?php echo $product['num']*$product['price'];?></td>
<td class="infos" style="padding:5px;"><input style=" width:100%;font-size: 16px;" type="button" value="移除" onClick="remove_to_cart(this,'<?php echo $key;?>')" /></td>
</tr>
</tbody>
<?php }
//} ?>
				
    </table>
</div>
</div>



<div class="one">
<span class="closeOne" onClick="openShutManager(this,'box2',false,'关闭','本桌已点','history1')">本桌已点</span>
<div id="box2" style="display:none">
<span id="history1">


</span>
</div>
</div>



<!--
<div class="one">
<span class="closeOne" onClick="openShutManager(this,'box3',false,'关闭','已点菜品','history')">提交菜品</span>
<div id="box3" style="display:none">
<span id="history">


</span>
</div>
</div>
-->
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
		<b style=\"position:relative;left:10px;top:3px;line-height:1.1;\">输入桌号</b>	</div>
	<div id=\"loginBoxContent\" >
		<form action=\"#\" method=\"post\">
			<table  style=\"margin:0px auto;\">
			<tr><td  style=\"padding-top:20px;font-size:28px;\">桌号: <input id=\"tablenum\" type=\"number\" name=\"Number\"  style=\"width:40%;font-size:18px;\" onkeyup=\"this.value=this.value.replace(/\D/g,'')\" onafterpaste=\"this.value=this.value.replace(/\D/g,'');\"></td></tr>
			<tr><td style=\"text-align:center;margin:0px auto; padding-top:20px;\"><input type=\"button\" name=\"submit\" style=\"height:40px;width:50%; font-size:28px;text-aglin=center;\" value=\"确定\" onClick=\"hideLoginBox('tablenum')\"/>
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
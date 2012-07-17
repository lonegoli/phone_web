<?php
ob_start();
session_start();
?>
<script type="text/javascript">
function createXMLHttpRequest(){
if(window.XMLHttpRequest){//非IE浏览器
			xmlHttp=new XMLHttpRequest();
		}
		else if(window.ActiveXObject){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

 }
 
function Ajax(total){
	if(total==0)
	{
		alert("亲，你还没点菜喔！")
		exit(0);
	}
createXMLHttpRequest();
now=new Date();
nhrs=now.getHours();
nmin=now.getMinutes();
nsec=now.getSeconds();
nyear=now.getFullYear();
nmonth=now.getMonth()+1;
//time="year"+nyear+"month"+nmonth+"hrs"+hrs+"min"+nmin;
var postStr="year="+nyear+"&month="+nmonth+"&hrs="+nhrs+"&min="+nmin;
//alert(postStr);
xmlHttp.open("post", "pos.php");
xmlHttp.setRequestHeader("cache-control","no-cache"); 
xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xmlHttp.send(postStr);

xmlHttp.onreadystatechange=function()
{
if (4==xmlHttp.readyState){
                if (200==xmlHttp.status)
				{
					alert("提交成功!");
				    //alert(xmlHttp.responseText);
                }
				else
				{
                    alert("发生错误!");
                }
            }
}
}

</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>购物车</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="MobileOptimized" content="320" />
<link rel="stylesheet" href="css/base.css" />
<link rel="stylesheet" href="css/shoppingcart.css" />
<script type="text/javascript" src="js/public.js"></script>
</head>
<body class="SCStep1">
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
        <caption>我的购物车信息</caption>
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
                <td height="167" colspan="6"><p class="sumary"><span class="mr15" id="totalamount1">原始金额:<?php if(!isset($_SESSION['totalamount'])){echo 0;} else {echo $_SESSION['totalamount'];}?></span><span>返现：0.00</span></p>
                    <p class="total"><strong>商品总金额</strong><em id="totalamount2"><?php 
					if(!isset($_SESSION['totalamount']))
					{
					echo 0;
					}
					else
					{
						echo $_SESSION['totalamount'];
					}?></em></p>
                    
                    <div >
                    <a id="beforegotoorder1" href="index.php"  >继续购物</a>
                    <a id="beforegotoorder2" href="#" onClick="Ajax(<?php if(!isset($_SESSION['totalamount'])){echo 0;} else {echo $_SESSION['totalamount'];}?>)" >提交</a>
                    </div>
                    <div></div>
                </td>
            </tr>
        </tfoot>
		
        <?php foreach($products as $key=>$product){ 
        if($product['num']==0)
		{
		}
		else
		{
		?>
      
<tbody>
<tr class="row1  myclassforcartitem" >
<td height="42" class="infos" style="line-height:10px"><?php echo $product['name'];?></td>
<td class="infos"><?php echo $product['price'];?></td>
<td class="infos"><?php echo $product['num'];?></td>
<td class="infos"><?php echo $product['num']*$product['price'];?></td>
<td class="infos"><input style=" width:100%" type="button" value="移除" onClick="remove_to_cart(this,'<?php echo $key;?>')" /></td>
</tr>
</tbody>
<?php }
} ?>
				
    </table>
</div>
</div>

</body>
</html>
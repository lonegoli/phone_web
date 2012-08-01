<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="js/jquery.min.js" type="text/javascript"></script>
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
	width:70%;
	height:auto;
	border-color: #33373B;
    border-radius: 5px 5px 5px 5px;
    border-style: solid;
    border-width: 9px;
}
</style>
</head>
<body>

<?php
$db=new SQLite3("db/test.db3");
$rs=$db->query('select * from table_show');
$colNum=$rs->numColumns();
echo ' <div class="header">
       <ul id="nav"> 
       <li class="mainlevel"><a href="#">产品分类</a>
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
echo '<li class="mainlevel"><a href="#" ><span>关于我们</span></a></li>';
echo '<li class="mainlevel"><a href="video.php" ><span>娱乐</span></a></li>';
echo '</ul>
      </div>';
      ?>
      <div class="videopic">
<a href='audiomedio.php?videoname=web'><img src="image/ituna.png" alt="视频1" style="height:180px;width:220px;"></a>
<span>海洋奇观</span>
</div>

<div class="videopic">
<a href='audiomedio.php?videoname=ouzhao'><img src="image/ituna.png" alt="视频2" style="height:180px;width:220px;"></a>
<span>欧洲美景</span>
</div>

<div class="videopic">
<a href='audiomedio.php?videoname=fukua'><img src="image/ituna.png" alt="视频3" style="height:180px;width:220px;"></a>
<span>浮夸MV</span>
</div>

<div class="videopic">
<a href='audiomedio.php?videoname=aozhou'><img src="image/ituna.png" alt="视频4" style="height:180px;width:220px;"></a>
<span>澳洲美景</span>
</div>

<div class="videopic">
<a href='audioomedio.php?videoname=dibai'><img src="image/ituna.png" alt="视频5" style="height:180px;width:220px;"></a>
<span>俯瞰迪拜</span>
</div>
</html>
<?php
  // header("Content-type:text/html;charset=UTF-8");
include('quote.php');
$db=openSQLite3Table_info();
$tablenum=$_POST['tablenum'];
$pan="true";
	$sql=sprintf("select * from table_info where tablenum like %d",intval($tablenum));
	$rs=$db->query($sql);
	if(!$rs)
	{
		die(ERR_SELECT_DB);
	}
	//$colNum=$rs->numColumns();
	if($row=$rs->fetchArray())
	{
		$pan="false";
		
	}
	else
	{
		$pan="true";
	}			
$db->close();
$db=null;
echo $pan;
?>

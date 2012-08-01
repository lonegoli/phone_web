<?php
$db=new SQLite3('db/temporary/temp.db3');
  $rs = $db->query('select * from temporaryMainDish ');
  if(!$rs)
  {
	  die(ERR_SELECT_DB);
  }
 //获取列字段数量
 $colNum = $rs->numColumns(); 
 ?>

 <?php
 while ($row = $rs->fetchArray())
 { 
     for ($i = 0; $i < $colNum; $i++)
     {
         echo $row[$i]."   ";
     }
 } 
 ?>
 <?php
 $rs->finalize();
 $db->close();
 $rs = null;
 $db = null;
?>
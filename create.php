<?php
$db=new SQLite3("db/test.db3");
//$db->exec("update table_info set status=0 where id=1");
$db->exec("drop table if exists 'serviceList'");
$db->exec("create table 'serviceList'( id integer primary key autoincrement,serviceName char(30))");
$db->close();
 $db = null;
?>
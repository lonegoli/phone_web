<?php
function openSQLite3()
{
	$db=new SQLite3("db/test.db3");
	return $db;
}
function openSQLite3Table_info()
{
	$db=new SQLite3("db/temp/temp.db3");
	return $db;
}
function openSQLite3Table_info_temporary()
{
	$db=new SQLite3("db/temporary/temp.db3");
	return $db;
}
?>
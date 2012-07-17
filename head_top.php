
<?php
session_start();
ob_start();
$tonum=0;
if(!isset($_SESSION['key']))
{
$products=array();

foreach($_SESSION as $key=>$value)
   {
       if(strstr($key,"shoe"))
      {
       $tonum+=$value['num'];
       }
   }
}
echo $tonum; 
?>



<?php 
ob_start();
session_start();
$month=$_POST['month'];
$hrs=$_POST['hrs'];
$min=$_POST['min'];
$year=$_POST['year'];
$date=$_POST['date'];

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
/*if(!$socket)
{
	echo "socket����ʧ�ܣ�";
	die(-1);
}*/
$connection = socket_connect($socket,'192.168.1.8', 9100);
/*if(!$connection)
{
	echo "���Ӵ�ӡ��ʧ�ܣ�";
	die(-1);
}
*/
$ent="\r\n";
//socket_write($socket, 0x1B);
//socket_write($socket,0x21)
//socket_write($socket,0x00);
//socket_write($socket,"\x1b\x44\x00");
//socket_write($socket,"\x1b\x44\x01x0e\x15\x00");
socket_write($socket,"\x1b\x40      ���Կǵ��ϵͳƱ��\r\n");
socket_write($socket,$ent);
$time=sprintf("���ţ�   ʱ�䣺%d-%d-%d %d:%d\r\n",$year,$month,$date,$hrs,$min);
socket_write($socket,$time);
socket_write($socket,"*******************************\r\n");
$products=array(); 
//if(!empty($key))
//{
foreach($_SESSION as $key=>$value){
if(strstr($key,"dish")){  
$products[$key]['name']=$value['name'];
$products[$key]['num']=$value['num'];
$products[$key]['price']=$value['price'];
}
}
foreach($products as $key=>$product){ 
        if($product['num']==0)
		{
		}
		else
		{
		$name=iconv('UTF-8', 'GB2312', $product['name']); 
$dishname=sprintf("%s\r\n",$name);
socket_write($socket,$dishname); 
$totalpri=$product['num']*$product['price'];
$numpri=sprintf("������%d\x09   ����:%d\x09   С�ƣ�%d\r\n",$product['num'],$product['price'],$totalpri);
socket_write($socket,$numpri); 
socket_write($socket,"--------------------------------"); 
//socket_write($socket,"\x1b\x61\x02");
//socket_write($socket,"j\x09a\x09b\x09k\x09o");
}
//}
}
$totalmount=sprintf("��Ʒ�ܼۣ�%d\r\n",$_SESSION['totalamount']);
socket_write($socket,$totalmount);
socket_write($socket,"         ��ӭ���Ĺ��!");
socket_write($socket,$ent);
socket_write($socket,$ent);
socket_write($socket,$ent);
socket_write($socket,$ent);
socket_write($socket,$ent);
socket_write($socket,$ent);
//echo "�ύ�ɹ���";
?>

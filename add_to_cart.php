<?php
session_start();
ob_start();//��Ϊ�˷�ֹ����Cannot modify header information֮������⣬�ɿ�һ��http://www.googlephp.cn/archives/21��ƪ���¡�
if($_POST['key']){
$key=$_POST['key'];
$id=$key;
$name=$_POST['name'];
$num=$_POST['num'];
$price=$_POST['price'];
$to=0;
//���ǰ�ÿһ����Ʒ��Ϣ��������$_SESSION['key']�����
//������һ���߼��жϣ��������Ʒ�ǵ�һ�μ��빺�ﳵ�����´���һ��$_SESSION['key']���飬�����������ۼӡ�
if(!isset($_SESSION[$key])){    //������$_SESSION[$key]�����������ʾ�ǵ�һ�μ��빺�ﳵ��
if($num)
{
$_SESSION[$key]['name']=$name;
$_SESSION[$key]['num']=$num;
$_SESSION[$key]['price']=$price;
}
else
{
}
} else{
	if($num==0)
	{
		unset($_SESSION[$key]);
	}
	else
	{
$_SESSION[$key]['num']=$num;
	}
} 
  //$_SESSION['total']=0;
  $_SESSION['tolnum']='0';
  $_SESSION['totalamount']='0';
  //$_SESSION['test']='0';
  if(isset($_SESSION))//�ж��Ƿ�Ϊ��
  {
  foreach($_SESSION as $key=>$value){
//����"shoe�ַ����Ĳ�������������Ҫ����Ʒ��Ϣ��"
if(isset($value['price'])&&isset($value['num']))
{
	
$_SESSION['totalamount']+=$value['num']*$value['price'];
$_SESSION['tolnum']+=$value['num'];
//$_SESSION['total']['one']=$_SESSION['totalamount'];
//$_SESSION['total']['two']=$_SESSION['tolnum'];
//$_SESSION['total']=$_SESSION['totalamount'];
//$to=$_SESSION['totalamount'].','.$_SESSION['tolnum'];
}
}
if(isset($_SESSION[$id]['num']))
{
	$to=$_SESSION[$id]['num'];

}
else
{
	$to=null;
}
  }

//$to=$_SESSION['totalamount'];
//$to=$_SESSION['total'];
echo $to;
}
//���ϵ�php���������ʾ����α���ÿһ�����빺�ﳵ�Ļ�����Ϣ��
?>
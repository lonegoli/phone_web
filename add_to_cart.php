<?php
session_start();
ob_start();//��Ϊ�˷�ֹ����Cannot modify header information֮������⣬�ɿ�һ��http://www.googlephp.cn/archives/21��ƪ���¡�
if($_POST['key']){
$key=$_POST['key'];
$name=$_POST['name'];
$num=$_POST['num'];
$price=$_POST['price'];
//���ǰ�ÿһ����Ʒ��Ϣ��������$_SESSION['key']�����
//������һ���߼��жϣ��������Ʒ�ǵ�һ�μ��빺�ﳵ�����´���һ��$_SESSION['key']���飬�����������ۼӡ�
if(!isset($_SESSION[$key])){    //������$_SESSION[$key]�����������ʾ�ǵ�һ�μ��빺�ﳵ��
$_SESSION[$key]['name']=$name;
$_SESSION[$key]['num']=$num;
$_SESSION[$key]['price']=$price;
} else{
$_SESSION[$key]['num']+=$num;
} 
  //$_SESSION['total']=0;
  $_SESSION['tolnum']='0';
  $_SESSION['totalamount']='0';
  //$_SESSION['test']='0';
  foreach($_SESSION as $key=>$value){
//����"shoe�ַ����Ĳ�������������Ҫ����Ʒ��Ϣ��"
$_SESSION['totalamount']+=$value['num']*$value['price'];
$_SESSION['tolnum']+=$value['num'];
//$_SESSION['total']['one']=$_SESSION['totalamount'];
//$_SESSION['total']['two']=$_SESSION['tolnum'];
//$_SESSION['total']=$_SESSION['totalamount'];
$to=$_SESSION['totalamount'].','.$_SESSION['tolnum'];

}
//$to=$_SESSION['totalamount'];
//$to=$_SESSION['total'];

echo $to;
}

//���ϵ�php���������ʾ����α���ÿһ�����빺�ﳵ�Ļ�����Ϣ��
?>
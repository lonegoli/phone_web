<?php
session_start();
ob_start();
if($_POST['key']){
$key=$_POST['key'];
//��һ���ȸ�����Ʒ�ܽ�
$num=$_SESSION[$key]['num'];
$price=$_SESSION[$key]['price'];
//֮ǰ�����Ѿ����ܽ�����$_SESSION['totalamount']����,��������ֻ���ȥ�Ƴ���Ʒ�Ľ��Ϳ����ˡ�
unset($_SESSION[$key]);//����Ӧ��ֵ��session��ȥ��
$_SESSION['totalamount']-=$num*$price;
$_SESSION['tolnum']-=$num;
//�ڶ������ٸ���Ʒ�ı�����
unset($_SESSION[$key]);
echo $_SESSION['totalamount']; //���ظ��ĺ���ܽ�
}
?>
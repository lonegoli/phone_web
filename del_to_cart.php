<?php
 session_start();//����session����
 ob_start();
$key=$_POST['key'];
//��չ��ﳵ
  unset($_SESSION['key']);
  ?>
  <script type="text/javascript" language="javascript">
  alert("����ɹ�");
  location.href="productlis.php";
  </script>
 
 

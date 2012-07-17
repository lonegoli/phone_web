<?php
 session_start();//开启session环境
 ob_start();
$key=$_POST['key'];
//清空购物车
  unset($_SESSION['key']);
  ?>
  <script type="text/javascript" language="javascript">
  alert("清除成功");
  location.href="productlis.php";
  </script>
 
 

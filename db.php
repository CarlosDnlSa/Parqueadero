<?php
session_start();

$conn = mysqli_connect(
  'parqueadero.cn1rlfqonfcv.us-east-2.rds.amazonaws.com',
  'admin',
  'hl0OvK1t15NPJdfEL8JB',
  'Parqueadero'
) or die(mysqli_erro($mysqli));

?>

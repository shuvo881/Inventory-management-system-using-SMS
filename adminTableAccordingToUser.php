<?php
session_start();
$serverName = "127.0.0.1"; //serverName\instanceName
$userName = "root";
$password = "";

$i = 0;
while (1) {
  if(isset($_POST['btn_'.$i.''])){
    $database = $_POST['btn_'.$i.''];
    $_SESSION['db'] = $_POST['btn_'.$i.''];
    //echo $_SESSION['db'];
    $msqlConn =  mysqli_connect($serverName, $userName, $password, $database);
    if($msqlConn ) {
         echo "Connection established.<br />";
         $tb_list = mysqli_query($msqlConn, "SHOW TABLES FROM ".$database);

  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>User's</title>
    </head>
    <body>
      <form class="" action="adminTableShow.php" method="post">
        <div id="buttos_panel">
          <?php echo get_buttons($tb_list); ?>
        </div>
      </form>

    </body>
  </html>
  <?php

    }else{
         echo "Connection could not be established.<br />";
         die( print_r( sqlsrv_errors(), true));
    }
    break;
  }
  $i = $i + 1;
}


function get_buttons($db_list){
  $str = "";
  $i = 0;
  $btns = array();
  while ($row = mysqli_fetch_row($db_list)) {
    $btns[$i] = $row[0];
    $i++;
  }

  while (list($k, $v) = each($btns)) {
    $str.= '&nbsp; <input type="submit" value="'.$v.'" name="btn_'.$k.'" id="btn_'.$k.'"/>';
  }
  return $str;
}
 ?>

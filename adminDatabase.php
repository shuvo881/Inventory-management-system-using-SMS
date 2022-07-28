<?php
$serverName = "127.0.0.1"; //serverName\instanceName
$userName = "root";
$password = "";




$msqlConn =  mysqli_connect($serverName, $userName, $password);
//$result = mysql_list_dbs($msqlConn);
$db_list = mysqli_query($msqlConn, "SHOW DATABASES");


  function get_buttons($db_list){
    $str = "";
    $i = 0;
    $btns = array();
    while ($row = mysqli_fetch_assoc($db_list)) {
      $btns[$i] = $row['Database'];
      $i++;
    }

    while (list($k, $v) = each($btns)) {
      $str.= '&nbsp; <input type="submit" value="'.$v.'" name="btn_'.$k.'" id="btn_'.$k.'"/>';
    }
    return $str;
  }



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User's</title>
  </head>
  <body>
    <form class="" action="adminTableAccordingToUser.php" method="post">
      <div id="buttos_panel">
        <?php echo get_buttons($db_list); ?>
      </div>
    </form>

  </body>
</html>

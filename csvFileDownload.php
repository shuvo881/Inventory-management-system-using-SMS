<?php
  session_start();
  $serverName = "127.0.0.1"; //serverName\instanceName
  $userName = "root";
  $password = "";

  //echo "csv";
#  if(isset($_POST['btnCsvFile'])){
    $tbName = $_SESSION['tbName'];
    $database = $_SESSION['db'];

    $msqlConn =  mysqli_connect($serverName, $userName, $password, $database);
    if($msqlConn) {
       //echo "Connection established.<br />";
       $tb_info = mysqli_query($msqlConn, "SELECT * FROM ".$tbName);

        header("content-type: csv");
        header("content-Disposition: attachment; filename=".$database." ".$tbName.".csv");

        $output = fopen("php://output", "w");
        fputcsv($output,array('phoneNumber', 'message'));
        while ($row = mysqli_fetch_assoc($tb_info)) {
          $ary =  array('0' =>$row['phoneNumber'] ,'1' =>$row['message'] );
          fputcsv($output, $ary);
        }
        fclose($output);
      }
  #}

 ?>

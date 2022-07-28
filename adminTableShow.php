<?php
session_start();

$serverName = "127.0.0.1"; //serverName\instanceName
$userName = "root";
$password = "";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Table Show</title>
  </head>
  <body>
    <form action="" method="post">
        <button type="button" name="CSV" onclick="location.href='csvFileDownload.php'">CSV export</button>
        <button type="button" name="api" onclick="location.href='api.php'">Using API</button>

    </form>

  </body>
</html>

<?php

$i = 0;
while (1) {
  if(isset($_POST['btn_'.$i.''])){
    $tableName = $_POST['btn_'.$i.''];
    //echo $tableName;
    $database = $_SESSION['db'];
    $_SESSION['tbName'] = $_POST['btn_'.$i.''];
    //echo $database;
    $msqlConn =  mysqli_connect($serverName, $userName, $password, $database);
    if($msqlConn ) {
         echo "Connection established.<br />";
         $tb_info = mysqli_query($msqlConn, "SELECT * FROM ".$tableName);
         $_SESSION['tbInfo'] = $tb_info;
         //print_r($tb_list);
         ?>
         <div class="row justify-conten-center">
           <table class="table" border="1">
             <thead>
               <tr>
                 <th>No</th>
                 <th>Phone Number</th>
                 <th>message</th>
               </tr>
             </thead>
         <?php
         while ($row = mysqli_fetch_assoc($tb_info)) {
           ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['phoneNumber']; ?></td>
              <td><?php echo $row['message']; ?></td>
            </tr>
           <?php

         }
         ?>
             </table>
           </div>
         <?php

    }
    break;
  }
    $i = $i + 1;
}


 ?>

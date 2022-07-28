<?php
  session_start();

  $usarID = $_SESSION["usarID"];
  //$usarID = "019";




  echo "Submet Completed";
  echo "<br>";
  $serverName = "127.0.0.1"; //serverName\instanceName
  $userName = "root";
  $password = "";
  $databaseName = "i".$usarID;


  try{
      $msqlConn =  mysqli_connect($serverName, $userName, $password);
      $msqlConn =  mysqli_select_db ($msqlConn , $databaseName);
      if(!$msqlConn){
        throw new Exception("Error Processing Request", 1);

      }
      date_default_timezone_set('Asia/Dhaka');
      $systmDate = "date".date('d_m_y_h_i_s');
      //echo "<br>". $systmDate;
      $sql = "CREATE TABLE " .$systmDate."(
          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          phoneNumber VARCHAR (15) NOT NULL,
          message VARCHAR (500) NOT NULL
        )";

      $msqlConn =  mysqli_connect($serverName, $userName, $password, $databaseName);
      $result = mysqli_query($msqlConn, $sql);
      if($result ) {
           echo "Connection established.<br />";
           dataImportDb($msqlConn, $systmDate);
      }else{
           echo "Connection could not be established.<br />";
           die( print_r( sqlsrv_errors(), true));
      }


  }
  catch(Exception $e){
    echo ".<br />. created new database .<br />.";
    $msqlConn =  mysqli_connect($serverName, $userName, $password);
    $sql = "CREATE DATABASE " . $databaseName ;
    mysqli_query($msqlConn, $sql);

    date_default_timezone_set('Asia/Dhaka');
    $systmDate = "date".date('d_m_y_h_i_s');
    //echo "<br>". $systmDate;
    $sql = "CREATE TABLE " .$systmDate."(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        phoneNumber VARCHAR (15) NOT NULL,
        message VARCHAR (500) NOT NULL
      )";

    $msqlConn =  mysqli_connect($serverName, $userName, $password, $databaseName);
    $result = mysqli_query($msqlConn, $sql);
    if($result ) {
         echo "Connection established.<br />";
         dataImportDb($msqlConn, $systmDate);
    }else{
         echo "Connection could not be established.<br />";
         die( print_r( sqlsrv_errors(), true));
    }
  }


  function dataImportDb($dbConnLink, $tableName){
    $messageBody = $_POST["messageBody"];
    $contctNumber = $_POST["contctNumber"];
    //print_r($_POST);
    //echo "<br>";
    //echo $tableName."<br>";
    $contctNumberArray = preg_split('/[\n\,]+/',$contctNumber);
    for($i =0; $i<sizeof($contctNumberArray);$i++){
      //echo $contctNumberArray[$i];
      //if($contctNumberArray[$i]==NULL){
        //continue;
      //}
      echo "<br>";
      $sqlString ="INSERT INTO ".$tableName." (phoneNumber, message) VALUES('$contctNumberArray[$i]','$messageBody')";
      $result = mysqli_query($dbConnLink, $sqlString );

      if($result ) {
           ///echo "Connection established.<br />";

      }else{
           //echo "Connection could not be established.<br />";
           continue;
      }
    }
  //  echo "<br>";
  //  echo $messageBody;
    //echo "<br>";
  }

  //echo $usarID;
?>

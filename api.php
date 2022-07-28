<?php
session_start();

require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

$sid    = "ACf2b27377cbf2c16f7ec2ff4e03229f74";
$token  = "722bfce4082b32bd1f2aba6bbd703d7a";
$twilio = new Client($sid, $token);

$serverName = "127.0.0.1"; //serverName\instanceName
$userName = "root";
$password = "";
$tbName = $_SESSION['tbName'];
$database = $_SESSION['db'];
$msqlConn =  mysqli_connect($serverName, $userName, $password, $database);
if($msqlConn) {
   //echo "Connection established.<br />";
   $tb_info = mysqli_query($msqlConn, "SELECT * FROM ".$tbName);
    while ($row = mysqli_fetch_assoc($tb_info)) {
      $nmbr = "+88".$row['phoneNumber'];
      $message = $twilio->messages
                        ->create($nmbr, // to
                                 array(
                                     "body" => $row['message'],
                                     'from' => "+17402185259"

                                 )
                        );
      //print($message->sid);
      if($message->sid){
        echo "Message Send<br>";
      }else {
        echo "something happen<br>";
      }

    }
  }




  // Update the path below to your autoload.php,
  // see https://getcomposer.org/doc/01-basic-usage.md










?>

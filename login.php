
<?php
session_start();
$serverName = "127.0.0.1"; //serverName\instanceName
$userName = "root";
$password = "";


if(isset($_POST["submit"]) && $_POST["password"] && $_POST["password"])
{
  $database = "userreg";
  $tableName = "userinfo";
  $phn = $_POST["phnNumber"];
  $_SESSION["phn"] = $_POST["phnNumber"];
  $pass = $_POST['password'];
  for($i=0; $i<2; $i++){
    $msqlConn =  mysqli_connect($serverName, $userName, $password, $database);
    $sql = "SELECT phone FROM $tableName";

    $result = mysqli_query($msqlConn,$sql);
    if($result ) {
      echo "Connection established.<br />";
    }else{
      echo "Connection could not be established.<br />";
      die( print_r( sqlsrv_errors(), true));
    }
    $c = 0;
    while ($row = mysqli_fetch_assoc($result)) {
    #print_r ("%s \n", $row['phone']);
    if($row['phone']==$phn){
      $sql = "SELECT password FROM $tableName WHERE phone = '$phn'";

      $result = mysqli_query($msqlConn,$sql);
      $row = mysqli_fetch_row($result);
      if($row[0]==$pass){
        if($i == 0){
          mysqli_free_result($result);
          $_SESSION["access"] = "General User";
          header("Location:userProfile.php");
        }else {
          mysqli_free_result($result);
          $_SESSION["access"] = "admin";
          header("Location:adminProfile.php");
        }
      }

    }
    $c = $c+1;
  }
  $database = "adminreg";
  $tableName = "admininfo";

  }
  mysqli_free_result($result);
  echo "<script>alert('Invalid user name and password.');</script>";
  #header("Location:login.php");

}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="loginbox">
      <img src="loginUserPic.png" class="avatar">
      <h1>Login Here</h1>
      <form class="" action="#" method="post">
        <p>Enter Phone Number/Email</p>
        <input type="text" name="phnNumber" placeholder="Enter Phone Number">
        <p>Password</p>
        <input type="password" name="password" value=""placeholder="Enter Password">
        <input type="submit" name="submit" value="Login">
        <u><a href="#">Lost Your Password ?</a></u><br>
        <u><a href="registationMode.php">Don't have a account ?</a></u>

      </form>

    </div>
  </body>
</html>

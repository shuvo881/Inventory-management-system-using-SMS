
<?php

  session_start();

  $serverName = "127.0.0.1"; //serverName\instanceName
  $userName = "root";
  $password = "";
  $database = "userreg";

  if(isset($_POST['regBtn'])){

    if($_POST['password'] == $_POST['cPassword'] && $_POST['cPassword'] != NULL){
      $msqlConn =  mysqli_connect($serverName, $userName, $password, $database);
      if($msqlConn ) {
        $fName = $_POST['fname'];
        $numbr = $_POST['number'];
        $lName = $_POST['lname'];
        $eml = $_POST['email'];
        $pass = $_POST['password'];
        $_sql = "INSERT INTO userinfo VALUES('$fName','$lName','$eml','$numbr','$pass')";
        $result = mysqli_query($msqlConn,$_sql);
        if($result ) {
          echo "Connection established.<br />";
        }else{
          echo "Connection could not be established.<br />";
          die( print_r( sqlsrv_errors(), true));
        }
      }
    }
  }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Regisert Form</title>
    <link rel="stylesheet" href="registation.css" media="all">
  </head>
  <body>
    <?php if(isset($_POST['msg'])) echo $_POST['msg']; ?>
    <div class="Registation-now">
      <form class="" action="" method="post">
        <h2>Register</h2>
        <div class="input-style">
          <label for="a">Firs Name</label>
          <input type="text" name="fname" placeholder="Firs Name" id="a">
          <label for="a">Last Name</label>
          <input type="text" name="lname" placeholder="Last Name" id="b">
          <label for="a">Your Email</label>
          <input type="email" name="email" placeholder="Email" id="c">
          <label for="a">Phone Number</label>
          <input type="text" name="number" placeholder="Phone Number" id="d">
          <label for="a">Enter Password</label>
          <input type="password" name="password" placeholder="password" id="e">
          <label for="a">Confirm Password</label>
          <input type="password" name="cPassword" placeholder="password" id="f">
        </div>
        <div class="regBtnStyl">
          <input type="submit" name="regBtn" value="Submit">
        </div>
      </form>
    </div>

  </body>
</html>

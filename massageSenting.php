<?php
  session_start();
  if(!isset($_POST["submit"]))
  {
    $_SESSION["usarID"] = $_SESSION["phn"];

  }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>messaging form</title>
    <style media="screen">
      body{
        background: #c0c0cc;
      }
      form{
        width: 500px;
        padding: 20px;
        margin: auto;
        background: #7a7cbb;
        font-size: 20px
      }
      input[type=submit]{
        padding: 5px;
        font-size: 18px
      }
      textarea{
        background: #f2f2f2;
        width: 500px;
        font-size: 20px;
        margin: auto;
      }
    </style>
  </head>
  <body>

    <form action="messageSubmitDataHandeling.php" method="post">



      <h3>Contact number's</h3>

      <textarea name="contctNumber" rows="8" cols="80"></textarea>

      <h3>Type your message</h3>

      <textarea name="messageBody" rows="8" cols="50"></textarea>
      <br>
      <input type="submit" name="submit" value="Sent">
    </form>

  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registation Mode</title>
    <link rel="stylesheet" href="registation.css" media="all">
    <style media="screen">
      button{

        font-size: 18px;
        margin-top: 20px;
        padding: 10px;
        background: linear-gradient(130deg, #34495e, #1abc9c);
        outline: none;
        border-radius: 5px;
        color: #00008B;
        cursor: pointer;
        border: none;

      }
      button:hover{
          background: linear-gradient(-130deg, #34495e, #1abc9c);
      }
    </style>
  </head>
  <body>
    <div class="">
      <label for="a">select registation mode</label>

      <button type="button" name="adminBtn" onclick="location.href='adminRegistation.php'">For Admin</button>
      <button type="button" name="userBtn"onclick="location.href='userRegistation.php'">For User</button>

      <?php
        if(isset($_POST["adminBtn"])){
          header("Location: adminRegistation.php");
          exit();
        }
        if(isset($_POST["userBtn"])){
          header("Location: userRegistation.php");
          exit();
        }
       ?>
    </div>
  </body>
</html>

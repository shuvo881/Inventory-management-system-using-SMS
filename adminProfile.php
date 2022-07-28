
 <?php
   session_start();

   $serverName = "127.0.0.1"; //serverName\instanceName
   $userName = "root";
   $password = "";
   $database = "adminreg";

   $phn = $_SESSION["phn"];
   $assesor = $_SESSION["access"];

   if(isset($_POST["submit"])){
     header("Location: adminDatabase.php");
     exit();
   }


  ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <link rel="stylesheet" href="profile.css">
      <meta charset="utf-8">
      <title>User Profile</title>
    </head>
    <body>
      <form class="" action="#" method="post">
        <div class="container">
          <div class="main">
            <div class="topbar">
              <a href="login.php">logout</a>
            </div>
            <div class="row">
              <div class="col-md-4 mt-1">
                <div class="card text-center sidebar">
                  <div class="card-body">
                    <img src="userpic.png" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h3><?php
                      $msqlConn =  mysqli_connect($serverName, $userName, $password, $database);
                      if($msqlConn ) {
                        $sql = "SELECT * FROM admininfo WHERE phone = '$phn'";
                        $result = mysqli_query($msqlConn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        echo nl2br ($assesor ."\n". $row['fastName']." ".$row['lastName'] ."\n".$row['email'] );

                      }
                       ?></h3>
                    </div>

                  </div>

                </div>

              </div>

            </div>
            <div class="col-md-8 mt-1">
              <div class="card mb-3 content">
                <h1 class="m-3 pt-3">Controlling ?</h1>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <input type="submit" name="submit" value="OK">


                    </div>

                  </div>

                </div>

              </div>

            </div>



          </div>
        </div>
      </form>
    </body>
  </html>

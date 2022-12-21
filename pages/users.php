<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    //if this is no admin trying to load this page, send them to index.php
    if(!isset($_SESSION["user"]) || !$_SESSION["user"] == "admin") {
        header('Location: ../index.php');
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Userverwaltung</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
        <script src="../js/font_awesome.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        
        <div class="background">
          <?php include 'navbar.php';?> 
          <div class="row justify-content-center">
            <div class="col-md-2 mb-5 mt-3">
            <h1>Userverwaltung</h1>
                <hr>
            </div>
          </div>
          <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-2 mb-5 mt-3" style="border-radius: 2px; border-color: black; border: 1px; border-style:double">
            <!-- Hier alle User anzeigen, mit Status und ob sie Admin sind. -->
            <?php
            require_once('dbaccess.php');
            $db_obj = new mysqli($host, $user, $dbpassword, $database); 

            if($db_obj->connect_error) {
                echo "Connection Error: " . $db_obj->connect_error;
                exit();
            }
            $sql = "Select * From users";
            $result = $db_obj->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<strong>Id: </strong>: ".$row['id'] . "<br>";
                echo "<strong>Name: </strong>".$row['name'] . "<br>";
                echo "<strong>Email: </strong>".$row['email'] . "<br>";
                echo "<strong>Rolle: </strong>";
                echo $row['role'] == 1 ? "User" : "Admin";
                echo "<br>"; 
                echo "<strong>Status: </strong>";
                echo $row['status'] == 1 ? "aktiv" : "deaktiviert";
                echo "<hr>";
            }
            $db_obj->close();
            ?>
            </div>
          </div>
          </div>
            <div class="footer">
              <?php include 'footer.php';?>
            </div> 
        </div>
    </body>
</html>
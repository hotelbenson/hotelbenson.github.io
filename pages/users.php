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
          <!-- Hier alle User anzeigen, mit Status und ob sie Admin sind. -->
          <div class="container-fluid">
            <div class="row justify-content-center">
                <div class='col-md-2'>
                    <strong>Id:       </strong>
                 </div>
                <div class='col-md-2'>
                    <strong>Name:     </strong>
                </div>
                <div class='col-md-2'>
                    <strong>Email:        </strong>
                </div>
                <div class='col-md-2'>
                    <strong>Rolle:        </strong>
                </div>
                <div class='col-md-1'>
                    <strong>Status:        </strong>
                </div>
                <div class='col-md-1'>
                </div> 
                <hr>
            </div>
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
                echo "<div class='row justify-content-center'>";
                echo "<div class='col-md-2'>";
                echo $row['id'];
                echo "</div>";
                echo "<div class='col-md-2'>";
                echo $row['name'];
                echo "</div>";
                echo "<div class='col-md-2'>";
                echo $row['email'];
                echo "</div>";
                echo "<div class='col-md-2'>";
                echo $row['role'] == 1 ? "User" : "Admin";
                echo "</div>";
                echo "<div class='col-md-1'>";
                echo $row['status'] == 1 ? "aktiv" : "deaktiviert";
                echo "</div>";
                echo "<div class='col-md-1 mb-2'>";
                echo "<input type='button' onclick='location.href=\"profil.php?id=".$row['id']."\"' value='Bearbeiten'>";
                echo "<br>";
                echo "</div>";
                
                echo "<hr>";
                echo "</div>";
            }
            $db_obj->close();
        ?>
          
          </div>
            <div class="footer">
              <?php include 'footer.php';?>
            </div> 
        </div>
    </body>
</html>
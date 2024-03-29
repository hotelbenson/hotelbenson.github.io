<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    //if there is no user logged in, send them to index.php
    if(!isset($_SESSION["user"])) {
        header('Location: ../index.php');
    }
    require_once('dbaccess.php');
    if(isset($_GET['id']) && isset($_GET['status'])) {
        $db_obj = new mysqli($host, $user, $dbpassword, $database); 

        //Status der Reservierung updaten:
        $sql = "Update reservations SET status = '" . $_GET['status'] . "' WHERE id = ". $_GET['id'] . ";";
        $result = $db_obj->query($sql);
        $db_obj->close();
        $message = "Reservierung erfolgreich geupdated.";
        echo "<script>window.onload = function() {activateToast();}</script>";
    }
    

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Reservierungen</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
        <script src="../js/font_awesome.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <script>
        //this needs to be here, idk why but doesnt work when its in an separate js file
        function activateToast() {
          $('.toast').toast('show');
        }
      </script>

        <div class="background">
          <?php include 'navbar.php';?> 
          <div class="row justify-content-center">
            <div class="col-md-3 mb-5 mt-3">
            <h1>Reservierungen</h1>
                <hr>
            </div>
          </div>
          <!-- Hier alle Reservierungen des eingeloggten Users anzeigen. -->
          <div class="container-fluid">
            <div class="row justify-content-center">
                <div class='col-md-2'>
                    <strong>Zimmer:</strong>
                 </div>
                <div class='col-md-2'>
                    <strong>Start:</strong>
                </div>
                <div class='col-md-2'>
                    <strong>Ende:</strong>
                </div>
                <div class='col-md-1'>
                    <strong>Preis:</strong>
                </div>
                <div class='col-md-2'>
                    <strong>Extras:</strong>
                </div>
                <div class='col-md-1'>
                    <strong>Status:</strong>
                </div>
                <hr>
            </div>
        <?php
            $db_obj = new mysqli($host, $user, $dbpassword, $database); 

            if($db_obj->connect_error) {
                echo "Connection Error: " . $db_obj->connect_error;
                exit();
            }
            //Alle Reservierungen des Users aus der db holen
            $sql = "Select * From reservations where userid = " . $_SESSION['userid'];
            $result = $db_obj->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<div class='row justify-content-center'>";
                echo "<div class='col-md-2'>";
                echo $row['room_name'];
                echo "</div>";
                echo "<div class='col-md-2'>";
                echo $row['start_dt'];
                echo "</div>";
                echo "<div class='col-md-2'>";
                echo $row['end_dt'];
                echo "</div>";
                echo "<div class='col-md-1'>";
                echo $row['price'] ."€";
                echo "</div>";
                echo "<div class='col-md-2'>";
                echo $row['extras'];
                echo "</div>";
                echo "<div class='col-md-1'>";
                if($row['status'] == 1) {
                    echo "neu";
                } else if($row['status'] == 2) {
                    echo "bestätigt";
                } else {
                    echo "storniert";
                }
                echo "</div>";
                echo "<hr>";
                echo "</div>";
            }
            $db_obj->close();
        ?>
          
          <!-- Toast -->
          <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Hotel Benson</strong>
                    <small>(👍 ͡❛ ͜ʖ ͡❛)👍</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <?php echo $message; ?>
                </div>
                </div>
            </div>
          </div>
            <div class="footer">
              <?php include 'footer.php';?>
            </div> 
        </div>
    </body>
</html>
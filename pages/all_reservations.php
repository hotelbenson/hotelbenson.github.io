<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    //if this is no admin trying to load this page, send them to index.php
    if(!isset($_SESSION["user"]) || !$_SESSION["user"] == "admin") {
        header('Location: ../index.php');
    }
    require_once('dbaccess.php');

    //Wenn eine Statusänderung ausgewählt wurde ->
    if(isset($_GET['id']) && isset($_GET['status'])) {
        $db_obj = new mysqli($host, $user, $dbpassword, $database); 

        //Status der Reservierung updaten:
        $sql = "Update reservations SET status = '" . $_GET['status'] . "' WHERE id = ". $_GET['id'] . ";";
        $result = $db_obj->query($sql);
        $db_obj->close();
        $message = "Reservierung erfolgreich geupdated.";
        echo "<script>window.onload = function() {activateToast();}</script>";
    }
    
    //Wenns noch bockt: Add Sortierung for Start_dt und eingegangenes Datum
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

        <!-- Statusfilter -->
        <div class="container-fluid mb-5">
        <form method="post" action="all_reservations.php">
            <div class="row">
                    <div class='col-md-2'>
                        <div class="form-group">
                            <label for="status">Status: </label>
                            <select class="form-control" name="status" id="status">
                              <option></option>  
                              <option>neu</option>
                              <option>bestätigt</option>
                              <option>storniert</option>
                            </select>
                        </div>
                    </div>
                    <div class='col-md-4 mt-4'>
                        <button type="submit" class="btn btn-primary" id="submit">Filter</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /Statusfilter -->

          <!-- Hier alle Reservierungen anzeigen. -->
          <div class="container-fluid">
            <div class="row justify-content-center">
                <div class='col-md-1'>
                    <strong>User:</strong>
                 </div>
                <div class='col-md-1'>
                    <strong>Zimmer:       </strong>
                 </div>
                <div class='col-md-1'>
                    <strong>Start:     </strong>
                </div>
                <div class='col-md-1'>
                    <strong>Ende:        </strong>
                </div>
                <div class='col-md-1'>
                    <strong>Preis:        </strong>
                </div>
                <div class='col-md-1'>
                    <strong>Extras:        </strong>
                </div>
                <div class='col-md-2'>
                    <strong>Eingangsdatum:        </strong>
                </div>
                <div class='col-md-1'>
                    <strong>Status:        </strong>
                </div>
                <div class='col-md-1'>
                </div> 
                <div class='col-md-1'>
                </div> 
                <hr>
            </div>
        <?php
            $db_obj = new mysqli($host, $user, $dbpassword, $database); 

            if($db_obj->connect_error) {
                echo "Connection Error: " . $db_obj->connect_error;
                exit();
            }
            if(isset($_POST['status']) && $_POST['status'] != "") {
                if($_POST['status'] == "neu") {
                    $status = 1;
                } else if($_POST['status'] == "bestätigt") {
                    $status = 2;
                } else {
                    $status = 3;
                }
                $sql = "Select * From reservations where status = ".$status;
                
            } else {
                $sql = "Select * From reservations;";
            }
            //Hier alle Reservierungen aus der db holen und anzeigen
            $result = $db_obj->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<div class='row justify-content-center'>";
                echo "<div class='col-md-1'>";
                echo $row['userid'];
                echo "</div>";
                echo "<div class='col-md-1'>";
                echo $row['room_name'];
                echo "</div>";
                echo "<div class='col-md-1'>";
                echo $row['start_dt'];
                echo "</div>";
                echo "<div class='col-md-1'>";
                echo $row['end_dt'];
                echo "</div>";
                echo "<div class='col-md-1'>";
                echo $row['price'] ."€";
                echo "</div>";
                echo "<div class='col-md-1'>";
                echo $row['extras'];
                echo "</div>";
                echo "<div class='col-md-2'>";
                echo $row['date'];
                echo $row['status'];
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
                echo "<div class='col-md-1 mb-2'>";
                if($row['status'] == 1) {
                    echo "<input type='button' onclick='location.href=\"all_reservations.php?id=".$row['id']."&status=2\"' value='Bestätigen'>";
                }
                echo "<br>";
                echo "</div>";
                echo "<div class='col-md-1 mb-2'>";
                if($row['status'] != 3) {
                    echo "<input type='button' onclick='location.href=\"all_reservations.php?id=".$row['id']."&status=3\"' value='Stornieren'>";
                }
                echo "<br>";
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
            <!-- Toast -->
          </div>
            <div class="footer">
              <?php include 'footer.php';?>
            </div> 
        </div>
    </body>
</html>
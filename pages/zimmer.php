<?php
  session_start();
  error_reporting(E_ERROR | E_PARSE);
  require_once('dbaccess.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['zimmer']) && isset($_POST['datefilter'])) {
    //Users must be logged in to make a reservation
    if(!isset($_SESSION['userid'])) {
      $message = "You must be logged in to make a reservation!";
      echo "<script>window.onload = function() {activateToast();}</script>";
    } else {
    $db_obj = new mysqli($host, $user, $dbpassword, $database);

    //Dates/Raumname holen
    $dates = explode(" - ", $_POST['datefilter'], PHP_INT_MAX);
    $start = date('Y-m-d', strtotime(str_replace("/","-",$dates[0]))); //string replace hack weil strtotime 10/01/2023 als 1. Oktober sieht aber 10-01-2023 als 10. Jänner
    $end = date('Y-m-d', strtotime(str_replace("/","-",$dates[1])));
    $roomname = explode(" (", $_POST['zimmer'], PHP_INT_MAX);

    //Abchecken obs da eh frei ist
    $sql = "SELECT * FROM rooms WHERE name = '".$roomname[0]."' 
        AND NOT EXISTS (
            SELECT 1 FROM reservations 
            WHERE roomid = rooms.id 
            AND (
                ('$start' BETWEEN start_dt AND end_dt) 
                OR ('$end' BETWEEN start_dt AND end_dt)
                OR (start_dt BETWEEN '$start' AND '$end')
                OR (end_dt BETWEEN '$start' AND '$end')
            )
        )";
    $result = $db_obj->query($sql);
    if (mysqli_num_rows($result) > 0) {
    //Zimmer ist in dem Zeitraum frei
    //Dann die Reservierung in die db speichern (status: angefordert oda so) und auf reservations redirecten
    $userid = $_SESSION['userid'];  

    //Zimmer aus der db laden   
    $sql = "Select * From rooms where name = '" . $roomname[0] . "';";
    $result = $db_obj->query($sql);
    $row = $result->fetch_assoc();
    $roomid = $row['id'];
    $price = $row['price'];

    //Preis berechnen, Anzahl Tage berechnen, Extras in einem String zsmschreiben
    $extras = "";
    $date1 = new DateTime($start);
    $date2 = new DateTime($end);
    $diff = $date1->diff($date2);
    $days = $diff->days;
    if($_POST['breakfast'] == "on") {
      $price = $price + 10 * $days;
      $extras = "Frühstück, ";
    }
    if($_POST['parking'] == "on") {
      $price = $price + 10 * $days;
      $extras = $extras . "Parkplatz, ";
    }
    if($_POST['animals'] == "on") {
      $price = $price + 50;
      $extras = $extras . "Haustiere, ";
    }
    
    //Heutiges Datum holen
    $date = date("Y-m-d", time());

    //Extras formatieren
    if($extras != "") {
      $extras = substr($extras, 0, -2);
    }

    //Reservierung abspeichern
    $sql = "INSERT INTO reservations (roomid, start_dt, end_dt, status, userid, price, room_name, date, extras) VALUES ('".$roomid."','".$start."','".$end."','1','".$userid."','".$price."','".$roomname[0]."','".$date."','".$extras."');";
    $result = $db_obj->query($sql);
    
    $message = "Reservierung erfolgreich abgeschlossen!";
    echo "<script>window.onload = function() {activateToast();}</script>";
    } else {
      //Zimmer ist in dem Zeitraum nicht frei
      $message = "Es tut uns leid, aber das Zimmer ist in diesem Zeitraum nicht verfügbar.";
      echo "<script>window.onload = function() {activateToast();}</script>";
    }          
    $db_obj->close();
    }
  }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Zimmer</title>
        <meta charset="utf-8">
        <!-- Stuff for Daterangepicker (https://www.garutkab.go.id/node_modules/bootstrap-daterangepicker/) -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <script type="text/javascript" src="../js/datepicker.js"></script>
        <!-- /Stuff for Daterangepicker -->
        <link rel="stylesheet" href="../bootstrap/bootstrap.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="../js/font_awesome.js"></script>
        <script src="../js/bootstrap.js"></script>
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
            <div class="container-fluid">
                <div id="carouselExampleCaptions" class="carousel slide carousel-dark" data-bs-ride="false">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="../uploads/01_Alpenluft.png" class="d-block" alt="Alpenluftzimmer" height="630px" style="margin: auto;">
                      <div class="carousel-caption d-none d-md-block mb-6" style="background-color: lightcyan; border-radius: 7px;">
                        <h5>Alpenluftzimmer</h5>
                        <p>Hier können sie so richtig entspannen. Für den niedrigen Preis von 50€ pro Nacht.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="../uploads/02_Luxussuite.png" class="d-block" alt="Präsidentensuite" width="630px" style="margin: auto;">
                      <div class="carousel-caption d-none d-md-block mb-6" style="background-color: lightcyan; border-radius: 7px;">
                        <h5>Präsidentensuite</h5>
                        <p>Nur für die reichen Gäste. Hier kann man so richtig flexxen wie viel Geld man hat. Sagen sie ja zu überteuerten Preisen
                          und unnötigen Addons. Diese Suite kann für 1000€ die Nacht gebucht werden.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="../uploads/03_Studenten.png" class="d-block" alt="Schluckerzimmer" width="630px" style="margin: auto;">
                      <div class="carousel-caption d-none d-md-block mb-6" style="background-color: lightcyan; border-radius: 7px;">
                        <h5>Schluckerzimmer</h5>
                        <p>Hier kann man pennen wenn man einfach broke ist. Wir kennen den Struggle. 10€ die Nacht auf unsern Nacken.
                          Gut möglich das sie in der Nacht abgezogen werden idk wir garantieren für nix gl hf.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="../uploads/04_Common.png" class="d-block" alt="Commoner Suite" width="630px" style="margin: auto;">
                      <div class="carousel-caption d-none d-md-block mb-6" style="background-color: lightcyan; border-radius: 7px;">
                        <h5>Commoner Suite</h5>
                        <p>Durchschnittsbleibe für alle Normalos. Erwarten sie nicht zu viel idk was ich hierzu schreiben soll, ich brauch mehr Text, pls send
                          help.</p>
                      </div>
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="background-color: rgb(216, 94, 94)">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" style="background-color: rgb(216, 94, 94)">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
              <br>

              <!-- Reservierungsformular -->
              <div class="container-fluid">
              <form method="post" action="zimmer.php">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                    <h2>Zimmer reservieren</h2>
                        <div class="form-group">
                            <label for="zimmer">Welches Zimmer möchten Sie reservieren:</label>
                            <select class="form-control" name="zimmer" id="zimmer">
                              <option>Alpenluftzimmer (50€)</option>
                              <option>Präsidentensuite (1000€)</option>
                              <option>Schluckerzimmer (10€)</option>
                              <option>Commoner Suite (100€)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                  <div class="col-md-4">
                    <p>Gegen Aufpreis möglich: </p>
                    <ul>
                      <li>
                        <div class="form-check">
                        <label class="form-check-label" for="breakfast">Frühstück (10€ pro Tag)</label>
                        <input type="checkbox" class="form-check-input" name="breakfast" class="form-control" id="breakfast">
                        </div>
                      </li>
                      <li>
                        <div class="form-check">
                        <label class="form-check-label" for="breakfast">Parkplatz (10€ pro Tag)</label>
                        <input type="checkbox" class="form-check-input" name="parking" class="form-control" id="breakfast">
                        </div>
                      </li>
                      <li>
                        <div class="form-check">
                        <label class="form-check-label" for="breakfast">Haustiere (50€ Pauschale)</label>
                        <input type="checkbox" class="form-check-input" name="animals" class="form-control" id="breakfast">
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-4">
                    <p>Zeitraum:</p>
                    <input type="text" name="datefilter" value="" />
                  </div>
                </div>
                <br>
                <div class="row justify-content-center">
                  <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
              </div>
            <!-- /Reservierungsformular -->
    
            <!-- Toast -->
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="7000">
                <div class="toast-header">
                    <strong class="me-auto">Hotel Benson</strong>
                    <small>¯\_(ツ)_/¯</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <i class="fa fa-exclamation-triangle"></i>
                    <?php echo $message; ?>
                </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="footer">
              <?php include 'footer.php';?>
            </div>  
        </div>
    </body>
</html>
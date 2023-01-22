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

    //hier jetzt checken ob die Reservierung möglich/valide ist


    //Dann die Reservierung in die db speichern (status: angefordert oda so) und auf reservations redirecten
    $dates = explode(" - ", $_POST['datefilter'], PHP_INT_MAX);
    $start = date('Y-m-d', strtotime(str_replace("/","-",$dates[0]))); //string replace hack weil strtotime 10/01/2023 als 1. Oktober sieht aber 10-01-2023 als 10. Jänner
    $end = date('Y-m-d', strtotime(str_replace("/","-",$dates[1])));
    $userid = $_SESSION['userid'];  
    //Zimmer aus der db laden
    $roomname = explode(" (", $_POST['zimmer'], PHP_INT_MAX);
    $sql = "Select * From rooms where name = '" . $roomname[0] . "';";
    $result = $db_obj->query($sql);
    $row = $result->fetch_assoc();
    $price = $row['price'];
    $roomid = $row['id'];
    
    $sql = "INSERT INTO reservations (roomid, start_dt, end_dt, status, userid, price, room_name) VALUES ('".$roomid."','".$start."','".$end."','1','".$userid."','".$price."','".$roomname[0]."');";
    $result = $db_obj->query($sql);
    $db_obj->close();
    $message = "Reservierung erfolgreich abgeschlossen!";
    echo "<script>window.onload = function() {activateToast();}</script>";
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
                      <img src="../uploads/hotel5.jpg" class="d-block" alt="Alpenluftzimmer" width="1000px" style="margin: auto;">
                      <div class="carousel-caption d-none d-md-block mb-5" style="background-color: lightcyan; border-radius: 7px;">
                        <h5>Alpenluftzimmer</h5>
                        <p>Hier können sie so richtig entspannen. Für den niedrigen Preis von 50€ pro Nacht.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="../uploads/zimmer6.jpg" class="d-block" alt="Präsidentensuite" width="1000px" style="margin: auto;">
                      <div class="carousel-caption d-none d-md-block mb-5" style="background-color: lightcyan; border-radius: 7px;">
                        <h5>Präsidentensuite</h5>
                        <p>Nur für die reichen Gäste. Hier kann man so richtig flexxen wie viel Geld man hat. Sagen sie ja zu überteuerten Preisen
                          und unnötigen Addons. Diese Suite kann für 1000€ die Nacht gebucht werden.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="../uploads/zimmer7.jpg" class="d-block" alt="Schluckerzimmer" width="1000px" style="margin: auto;">
                      <div class="carousel-caption d-none d-md-block mb-5" style="background-color: lightcyan; border-radius: 7px;">
                        <h5>Schluckerzimmer</h5>
                        <p>Hier kann man pennen wenn man einfach broke ist. Wir kennen den Struggle. 10€ die Nacht auf unsern Nacken.
                          Gut möglich das sie in der Nacht abgezogen werden idk wir garantieren für nix gl hf.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="../uploads/hotel5.jpg" class="d-block" alt="Commoner Suite" width="1000px" style="margin: auto;">
                      <div class="carousel-caption d-none d-md-block mb-5" style="background-color: lightcyan; border-radius: 7px;">
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

              <div class="container-fluid">
              <form method="post" action="zimmer.php">
                <div class="row justify-content-center">
                    <div class="col-md-4 white">
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
                  <div class="col-md-4 white">
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
                        <input type="checkbox" class="form-check-input" name="breakfast" class="form-control" id="breakfast">
                        </div>
                      </li>
                      <li>
                        <div class="form-check">
                        <label class="form-check-label" for="breakfast">Haustiere (50€ Pauschale)</label>
                        <input type="checkbox" class="form-check-input" name="breakfast" class="form-control" id="breakfast">
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-4 white">
                    <p>Zeitraum:</p>
                    <input type="text" name="datefilter" value="" />
                  </div>
                </div>
                <br>
                <div class="row justify-content-center">
                  <div class="col-md-4 white">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
              </div>
    
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
<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    require_once('dbaccess.php');
    //if there is no user logged in -> Redirect to index
    if(!isset($_SESSION["user"])) {
        header('Location: ../index.php');
    }

    //update profile on form submit
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_SESSION['userid'])) {
        $db_obj = new mysqli($host, $user, $dbpassword, $database); 

        //Check ob ein neues Passwort eingegeben wurde:
        if(isset($_POST['password'])) {
            //wenn ja password auch updaten

            //altes passwort checken
            if (!password_verify($_POST['oldpassword'], $_SESSION['userpw'])) {
                $message = "Error: Old password does not match!";
                echo "<script>window.onload = function() {activateToast();}</script>";
            }

            //neues passwort checken
            if($_POST['password'] != $_POST['password2']) {
                $message = "Error: New passwords do not match!";
                echo "<script>window.onload = function() {activateToast();}</script>";
            }
            $hashpw = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "Update users SET name = '" . $_POST['name'] . "', password = '" . $hashpw . "', email = '" . $_POST['email'] . "', phone = '" . $_POST['phone'] . "', adress = '" . $_POST['adress'] . "', city = '" . $_POST['city'] . "', zip = '" . $_POST['zip'] . "' WHERE id = ". $_SESSION['userid'] . ";";
            $result = $db_obj->query($sql);
            $_SESSION['usermail'] = $_POST['email'];
        } else {
            $sql = "Update users SET name = '" . $_POST['name'] . "', email = '" . $_POST['email'] . "', phone = '" . $_POST['phone'] . "', adress = '" . $_POST['adress'] . "', city = '" . $_POST['city'] . "', zip = '" . $_POST['zip'] . "' WHERE id = ". $_SESSION['userid'] . ";";
            $result = $db_obj->query($sql);
            $_SESSION['usermail'] = $_POST['email'];
        }

        //Success message rausschreiben, dass die Daten geupdated wurden
        $message = "Profil erfolgreich geupdated!";
        echo "<script>window.onload = function() {activateToast();}</script>";

        // TODO: Admin-Userverwaltung -> einf userid in session ??ndern und dann in profil rein, dann irgendwie zr??ck zum Adminuser
        // TODO: Zimmerreservierungen m??glich machen
        // TODO: Reservierungen f??r User einsehbar machen + Option zu canceln/best??tigen
        // TODO: Alle Reservierungen f??r Admins einsehbar machen


        $db_obj->close();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Userverwaltung</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
        <script src="../js/font_awesome.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <script>
            function activateToast() {
            $('.toast').toast('show');
            }
        </script>

        <div class="background">
          <?php include 'navbar.php';?> 
          <div class="row justify-content-center">
            <div class="col-md-4 mb-5 mt-3">
            <h1>Profilverwaltung</h1>
                <hr>
            </div>
          </div>
            <?php
            $db_obj = new mysqli($host, $user, $dbpassword, $database); 

            if($db_obj->connect_error) {
                echo "Connection Error: " . $db_obj->connect_error;
                exit();
            }
            $sql = "Select * From users where id = " . $_SESSION['userid'] . ";";
            $result = $db_obj->query($sql);
            while($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $email = $row['email'];
                $phone = $row['phone'];
                $adress = $row['adress'];
                $city = $row['city'];
                $zip = $row['zip'];
            }
            $db_obj->close();
            ?>
            <form method="post" action="profil.php">
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name" value=<?php echo $name; ?>>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group needs-validation">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" value=<?php echo $email; ?>>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tel">Telefon:</label>
                            <input type="tel" name ="phone" class="form-control" id="tel" value=<?php echo $phone; ?>>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="adress">Adresse:</label>
                            <input type="text" name="adress" class="form-control" id="adress" value=<?php echo $adress; ?>>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-2">  
                        <div class="form-group">
                            <label for="city">Stadt:</label>
                            <input type="text" name="city" class="form-control" id="city" value=<?php echo $city; ?>>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="zip">Zip:</label>
                            <input type="text" name="zip" class="form-control" id="zip" value=<?php echo $zip; ?>>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">Passwort ??ndern:</label>
                            <input type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="Altes Passwort">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">Neues Passwort:</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Neues Passwort">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password2">Neues Passwort best??tigen:</label>
                            <input type="password" name="password2" class="form-control" id="password2" placeholder="Neues Passwort best??tigen">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4 mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form> 
            <br>
            <br>
            
            <!-- Toast -->
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Hotel Benson</strong>
                    <small>1 sec ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <?php echo $message; ?>
                </div>
                </div>
            </div>
            <div class="footer">
              <?php include 'footer.php';?>
            </div> 
        </div>
    </body>
</html>
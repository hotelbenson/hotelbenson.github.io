<!DOCTYPE html>
<html>
    <head>
        <title>Hotel Benson</title>
        <meta name="description" content="Hotel Benson">
        <meta name="keywords" content="5-Star Hotel Benson">
        <meta charset="utf-8">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/font_awesome.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>

    <body>
    <?php session_start(); ?>
    <script>
        function activateToast() {
          $('.toast').toast('show');
        }
      </script>
      <div class="background">
        <header>
          <!-- normal nav -->
    <nav class="navbar navbar-expand-lg fs-5">
      <div class="container-fluid">
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Burgermenu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-3 px-0 px-lg-2 active" aria-current="true" href="index.php">Home</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-3 px-0 px-lg-2" href="pages/zimmer.php">Zimmer</a>
          </li>
          <?php
              if(isset($_SESSION["user"])) {
                echo '<li class="nav-item col-6 col-lg-auto">
                <a class="nav-link py-3 px-0 px-lg-2" href="pages/reservations.php">Reservierungen</a>
                </li>';
              }
          ?>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-3 px-0 px-lg-2" href="pages/hilfe.php">Hilfe</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-3 px-0 px-lg-2" href="pages/impressum.php">Impressum</a>
          </li>
          <?php
              if(isset($_SESSION["user"]) && $_SESSION["user"] == "admin") {
                echo '<li class="nav-item col-6 col-lg-auto">
                <a class="nav-link py-3 px-0 px-lg-2" href="pages/newsupload.php">Fileupload</a>
                </li>';
                echo '<li class="nav-item col-6 col-lg-auto">
                <a class="nav-link py-3 px-0 px-lg-2" href="pages/users.php">Userverwaltung</a>
                </li>';
                echo '<li class="nav-item col-6 col-lg-auto">
                <a class="nav-link py-3 px-0 px-lg-2" href="pages/all_reservations.php">Reservierungsverwaltung</a>
                </li>';
              }
          ?>
        </ul>

        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
          <li class="nav-item col-6 col-lg-auto">
          <?php
            if(isset($_SESSION["user"])) {
              echo '<a class="nav-link py-3 px-0 px-lg-2" href="pages/profil.php">Profil</a>';
            } else {
              echo '<a class="nav-link py-3 px-0 px-lg-2" href="pages/register.php">Registrieren</a>';
            }
            ?>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <li class="nav-item col-6 col-lg-auto">
              <?php
              if(!isset($_SESSION["user"])) {
                echo "<a class='nav-link py-3 px-0 px-lg-2' href='pages/login.php'>Login</a>";
              } else {
                echo "<a class='nav-link py-3 px-0 px-lg-2' href='pages/logout.php'>Logout</a>";
              }
              ?>
            </li>
          </li>
        </ul>
        </div>
      </div>
    </nav>
    <!-- normal nav -->
        </header>
        
        <div id = "box">
            <div>
              <h1 style="margin-left: 10em; margin-top: 1em">Willkommen im Hotel Benson!</h1>
            </div>
            <hr>
            <div class="row justify-content-center" style="width: 100vw">
                <div class="col-md-3">
                  <h2>News:</h2>      
                </div>
            </div>
            <div class="container">
            <div class="row justify-content-center">
              <?php
                require_once('pages/dbaccess.php');
                $db_obj = new mysqli($host, $user, $dbpassword, $database); 

                if($db_obj->connect_error) {
                    echo "Connection Error: " . $db_obj->connect_error;
                    exit();
                }

                $sql = "Select * From newsposts";
                $result = $db_obj->query($sql);
                while($row = $result->fetch_assoc()) {
                    $date = date("d.m.Y", strtotime($row['date']));
                    echo '<div class="col-md-6">';
                    echo "<p><strong>" . $row['header'] . "</strong>   (".$date.")</p>";
                    echo "<p>" . $row['text'] . "</p>";
                    echo "</div>";
                    echo '<div class="col-md-4">';
                    echo "<img src='" . $row['picturepath'] . "' width=200px>";
                    echo "</div>";
                    echo "<br>";
                    echo "<hr>";
                }
                $db_obj->close();
              ?>
            </div>
            </div>
          </div>
          <br/>
          <br/>
          <!-- Toast -->
          <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">Hotel Benson</strong>
                <small>1 sec ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Welcome back <?php echo $_SESSION['username']; ?>! Enjoy your stay :)
              </div>
          </div>
          </div>
        </div>
        <?php 
        if(isset($_SESSION["username"])) {
          echo "<script>window.onload = function() {activateToast();}</script>";
        }
      ?>
        <div class="footer">
        <?php include 'pages/footer.php';?> 
        </div>
    </body>
</html>
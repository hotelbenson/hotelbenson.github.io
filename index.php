<!DOCTYPE html>
<html>
    <head>
        <title>Hotel Benson</title>
        <meta name="description" content="Hotel Benson">
        <meta name="keywords" content="5-Star Hotel Benson">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
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
            <a class="nav-link py-3 px-0 px-lg-2" href="page/szimmer.php">Zimmer</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-3 px-0 px-lg-2" href="pages/hilfe.php">Hilfe</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-3 px-0 px-lg-2" href="pages/impressum.php">Impressum</a>
          </li>
        </ul>

        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-3 px-0 px-lg-2" href="pages/register.php">Registrieren</a>
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
            <div style="margin-left: 10em; margin-right: 10em;">
              <h2>News:</h2>
              <br>        
              <p> <strong>Ausfallsbonus III (Corona):</strong></p>
              <p>Der Ausfallsbonus III kann bei mindestens 30 % Umsatzausfall im November und Dezember 2021 und 
                40 % Umsatzausfall im 1. Quartal 2022 beantragt werden und beträgt max. 80.000 Euro/Monat. 
                Für Hotellerie und Gastronomie werden 40 % des Ausfalles ersetzt, eine Antragstellung ist jeweils 
                ab dem 10. des Folgemonats möglich.</p>
              <hr>
              <p><strong>Kunsthotel Sans Souci:</strong></p>
              <p>Im Sans Souci im 7. Wiener Gemeindebezirk erleben Sie Kunst hautnah. Das Kunsthotel öffnet seine 
                Pforten und heißt Sie herzlich Willkommen, wenn von September bis November 2022 Wien ganz im Zeichen 
                der Kunst steht. Dabei können Kunstliebhaber einiges in der österreichischen Hauptstadt entdecken: 
                Von antiken Schätzen, über angesagte Neuzugänge bis hin zu ungeahnten Entdeckungen ist alles dabei.</p>
              <hr>
              <p><strong>Das neue Restaurant im Seewirt Mattsee:</strong></p>
              <p>Seit Ostern präsentiert sich das „Lustreich Restaurant“ im Kuschelhotel Seewirt Mattsee im neuen 
                Kleid! Es wurde bunter, kuscheliger, moderner – einfach perfekt passend zum Thema des Hauses und 
                fast so bunt wie die Liebe selbst. Als adults-only Hotel am iyllischen Südufer des Mattsees integriert 
                sich das Restaurant bestens in die Philosophie des Hauses und bietet für kulinarische Erlebnisse nun einen 
                würdigen Rahmen während eines romantischen Urlaubs mit Ihrem Schatz.</p>
              <hr>
              <p><strong>Die neuen Chalets in den Bergen der Almwelt Austria:</strong></p>
              <p>Die neuen Chalets in den Bergen der Almwelt Austria
                Der Märchentraum inmitten der malerischen Bergwelt der Schladminger Tauern wird bald wahr: 
                Im Sommer 2022 eröffnet das Hüttendorf Almwelt Austria moderngestaltete Almhütten für zwei bis zehn 
                Personen. Die neuerrichteten Premium-Chalets verfügen über einen eigenen Almwellnessbereich mit großzügiger 
                Sauna, Erlebnisdusche und Waschbereich. Die stilvollen und gemütlichen Hüttenzimmer bieten Boxspringbetten, 
                ein Badezimmer sowie einen Balkon. Spüren Sie den Duft des Holzes, die natürlichen Materialen und das 
                Zusammenspiel aus alpiner Lebensart und höchstem Komfort!</p>
              <hr>
              <p><strong>Aktivurlaub in Österreich:</strong></p>
              <p>Auch wenn es im Trend liegt – ein Aktivurlaub in Österreich muss sich nicht immer um Berge, Bikes, 
                Skipisten und Golfplätze drehen. Abseits dieser beliebten Modesportarten gibt es viele andere Optionen, 
                um einen wunderbaren Aktiv- und Sporturlaub zu erleben: Yoga, Tennis, Tanzen, Klettern oder Reiten zum Beispiel. 
                Der Fantasie sind hier keine Grenzen gesetzt! Wer dennoch mal auf die „Klassiker“ zurückgreifen möchte, 
                findet in den meisten Aktivhotels ausreichend Gelegenheit dazu.</p>
              <br>
              <p>
                File Upload: 
                <form enctype="multipart/form-data" method="post"
                action="pages/upload.php">
                <input type="file" name="picture">
                <input type="submit" value="Hochladen">
                </form>
              </p>
              <p>
                <?php
                  $bilder = scandir("fileupload");
                  //echo "<img src='fileupload/img01.jpg'>"
                ?>
              </p>
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
                Welcome back <?php echo isset($_SESSION['user'])?$_SESSION['user']:"General Kenobi"  ?>! Enjoy your stay :)
              </div>
          </div>
          </div>
        </div>
        <?php 
        if(!isset($_SESSION["user"])) {
          echo "<script>window.onload = function() {activateToast();}</script>";
        } else {
          echo "<script>window.onload = function() {activateToast();}</script>";
        }
      ?>
        <div class="footer">
        <?php include 'pages/footer.php';?> 
        </div>
    </body>
</html>
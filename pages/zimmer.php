<!DOCTYPE html>
<html>
    <head>
        <title>Zimmer</title>
        <link rel="stylesheet" href="../css/style.css">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../bootstrap/bootstrap.css">
        <script src="../js/font_awesome.js"></script>
        <script src="../js/script.js"></script>
        <script src="../js/bootstrap.js"></script>
    </head>
    <body>

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
                      <img src="../uploads/hotel5.jpg" class="d-block w-100" alt="Alpenluftzimmer">
                      <div class="carousel-caption d-none d-md-block mb-5" style="background-color: lightcyan; border-radius: 7px;">
                        <h5>Alpenluftzimmer</h5>
                        <p>Hier können sie so richtig entspannen. Für den niedrigen Preis von 50€ pro Nacht.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="../uploads/zimmer6.jpg" class="d-block w-100" alt="Präsidentensuite">
                      <div class="carousel-caption d-none d-md-block mb-5" style="background-color: lightcyan; border-radius: 7px;">
                        <h5>Präsidentensuite</h5>
                        <p>Nur für die reichen Gäste. Hier kann man so richtig flexxen wie viel Geld man hat. Sagen sie ja zu überteuerten Preisen
                          und unnötigen Addons. Diese Suite kann für 1000€ die Nacht gebucht werden.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="../uploads/zimmer7.jpg" class="d-block w-100" alt="Schluckerzimmer">
                      <div class="carousel-caption d-none d-md-block mb-5" style="background-color: lightcyan; border-radius: 7px;">
                        <h5>Schluckerzimmer</h5>
                        <p>Hier kann man pennen wenn man einfach broke ist. Wir kennen den Struggle. 10€ die Nacht auf unsern Nacken.
                          Gut möglich das sie in der Nacht abgezogen werden idk wir garantieren für nix gl hf.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="../uploads/hotel5.jpg" class="d-block w-100" alt="Commoner Suite">
                      <div class="carousel-caption d-none d-md-block mb-5" style="background-color: lightcyan; border-radius: 7px;">
                        <h5>Commoner Suite</h5>
                        <p>Durchschnittsbleibe für alle Normalos. Erwarten sie nicht zu viel idk was ich hierzu schreiben soll, ich brauch mehr Text, pls send
                          help.</p>
                      </div>
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            <div class="footer">
              <?php include 'footer.php';?>
            </div>  
        </div>
    </body>
</html>
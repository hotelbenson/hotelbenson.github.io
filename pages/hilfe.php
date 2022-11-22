<!DOCTYPE html>
<html>
    <head>
        <title>Hilfe</title>
        <link rel="stylesheet" href="../css/style.css">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
        <script src="../js/font_awesome.js"></script>
        <script src="../js/bootstrap.js"></script>
    </head>
    <body>
        
        <div class="background">
          <?php include 'navbar.php';?> 
          <div class="row justify-content-center">
          <div class="col-md-6 mb-5 mt-3">
          <h1>FAQ - Frequently Asked Questions</h1>
            <hr>
          </div>
        </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                         Wo kann ich ein Zimmer reservieren?
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Auf die Seite "Zimmer" wechseln, und ein freies Zimmer selektieren. Dann irgendwelche Info eingeben
                        um die Zimmerreservierung zu bestätigen.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                         Wo kann ich sehen wie viele Zimmer noch frei sind?
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                         In der "Zimmer" Seite gibt es einen Counter, der die Anzahl an freien Zimmern anzeigt.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                         Wie komme ich zum Impressum?
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                         Ins Impressum kommt man, indem man in der Navigation auf "Impressum" wechselt, oder einfach <a href="impressum.html">hier</a>.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                           Wie komme ich zur Hilfe?
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                         In die Hilfe-Seite kommt man, indem man in der Navigation auf "Hilfe" wechselt, oder einfach <a href="hilfe.html">hier</a>.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                           Wie mache ich wenn ich meine Anmeldedaten vergessen habe?
                      </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                         Einen neuen Zugang anlegen und beim nächsten Mal die eingegebenen Werte merken ;)
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                           Was machen wenn das gewünschte Zimmer nicht frei ist?
                      </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                         Warten bis es frei wird duh
                      </div>
                    </div>
                  </div>
            </div>

            <div class="footer">
              <?php include 'footer.php';?>
            </div> 
        </div>
        <hr>
    </body>
</html>
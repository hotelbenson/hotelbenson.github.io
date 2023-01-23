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
        <title>Fileupload</title>
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
          <h1>Fileupload</h1>
            <hr>
          </div>
        </div>
        <div class="container-fluid">
        <p>
            <!-- Formular zum Upload von Newsbeiträgen -->
            <form enctype="multipart/form-data" method="post"
                action="upload.php" id="upload">
                           
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4 mt-2">
                        <div class="form-group">
                            <input type="file" name="picture">
                        </div>
                    </div>
                </div>
               
                
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4 mt-2">
                        <div class="form-group">
                            <label for="header">Überschrift: </label>
                            <input type="text" name="header" form="upload" placeholder="Überschrift"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4 mt-2">
                        <div class="form-group">
                            <label for="news">Newstext: </label>
                            <br>
                            <textarea rows="4" cols="70" name="comment" form="upload">Enter text here...</textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4 mt-2">
                        <div class="form-group">
                            <input type="submit" value="Hochladen">
                        </div>
                    </div>
                </div>
                
            </form>
            </p>
        </div>
 
            <div class="footer">
              <?php include 'footer.php';?>
            </div> 
        </div>
        <hr>
    </body>
</html>
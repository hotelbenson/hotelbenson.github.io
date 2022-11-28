<!DOCTYPE html>
<html>
    <head>
        <title>Hotel Benson</title>
        <meta name="description" content="Hotel Benson">
        <meta name="keywords" content="5-Star Hotel Benson">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="../js/font_awesome.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="../js/bootstrap.js"></script>
    </head>

    <body>
    <script>
        function activateToast() {
          $('.toast').toast('show');
        }
      </script>
    <?php 
        session_start();
        error_reporting(E_ERROR | E_PARSE);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["email"]) && isset($_POST["password"])) {
                if($_POST["email"] == "admin@admin" && $_POST["password"] == "admin") {
                    $_SESSION["user"] = "admin"; //hier sonst einfach checken obs den User in der db gibt
                    header('Location: ../index.php');
                } else {
                    echo "<script>window.onload = function() {activateToast();}</script>";
                }
            } 
        }
        ?>
        <!-- im action aufn php file hinweisen, da logik reinhauen und mit zb header(login.php) zu ner anderen Seite verweisen-->
        <!-- logout -> session_destroy() und redirecten auf index.php; logout anzeigen je nachdem ob er eingloggt ist-->
        <!--  if(!isset($_SESSION["user"])) { -->
        <div class="background">
            <?php include 'navbar.php';?>
            <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-3">
                        <h1>Login</h1>
                        <hr>
                        <br>
                    </div>
            </div>
           <form class="was-validated" method="post" action="login.php">
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-3">
                       <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                        </div> 
                        <div class="row justify-content-center" style="width: 100vw">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="width: 100vw">
                            <div class="col-md-3">
                                Not a member? <a href="register.php">Register</a>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="width: 100vw">
                            <div class="col-md-3 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div> 
                    </form>;
                    <!-- Toast -->
          <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">Hotel Benson</strong>
                <small>1 sec ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                <i class="fa fa-exclamation-triangle"></i>
                Sorry, these login credentials did not match an account :/ Please try again.
              </div>
          </div>
          </div>
            <div class="footer">
                <?php include 'footer.php';?> 
            </div>
        </div>
    </body>
</html>
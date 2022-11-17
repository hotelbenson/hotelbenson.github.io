<!DOCTYPE html>
<html>
    <head>
        <title>Hotel Benson</title>
        <link rel="stylesheet" href="../css/style.css">
        <meta name="description" content="Hotel Benson">
        <meta name="keywords" content="5-Star Hotel Benson">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
        <script src="../js/font_awesome.js"></script>
        <script src="../js/script.js"></script>
    </head>

    <body>
    <?php 
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["email"]) && isset($_POST["password"]) && $_POST["email"] == "admin@admin" && $_POST["password"] == "admin") {
                    $_SESSION["user"] = "admin";
                }
            }
        ?>
        <!-- im action aufn php file hinweisen, da logik reinhauen und mit zb header(login.php) zu ner anderen Seite verweisen-->
        <!-- logout -> session_destroy() und redirecten auf index.php; logout anzeigen je nachdem ob er eingloggt ist-->
        <div class="background">
            <?php include 'navbar.php';?>
            <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-3">
                        <h1>Login</h1>
                        <hr>
                        <br>
                    </div>
            </div>
            <?php 
                    if(!isset($_SESSION["user"])) {
                        echo '<form class="was-validated">
                        <div class="row justify-content-center" style="width: 100vw">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
                        </div> 
                        <div class="row justify-content-center" style="width: 100vw">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="width: 100vw">
                            <div class="col-md-3">
                                <a href="pech ghabt">Forgot password?</a>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="width: 100vw">
                            <div class="col-md-3">
                                Not a member? <a href="register.html">Register</a>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="width: 100vw">
                            <div class="col-md-3 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div> 
                    </form>';
                    } 
                ?>   
            <div class="footer">
                <?php include 'footer.php';?> 
            </div>
        </div>
    </body>
</html>
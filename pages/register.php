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
        <div class="background"> 
            <?php include 'navbar.php';?>  
            <div class="row justify-content-center" style="width: 100vw">
                <div class="col-md-3">
                    <h1>Register</h1>
                    <hr>
                    <br>
                </div>
            </div>
            <?php
                        //echo "<pre>"; print_r($_SERVER); "</pre>"
                        //echo "<pre>"; print_r($_GET); "</pre>";
                        //echo $_POST["city"];

                        $errors = [];
                        $errors["city"] = false;

                        if($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(empty($_POST["city"])) {
                                $errors["city"] = true;
                            }
                        }
                    ?>
            <form method="post">
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tel">Phone</label>
                            <input type="tel" class="form-control" id="tel" placeholder="Enter phone number">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="adress">Adress</label>
                            <input type="text" class="form-control" id="adress" placeholder="Enter adress">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-2">
                        <div class="form-group <?php echo ($errors["city"])?"":"was-validated"?>">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Enter City">
                            <?php echo ($errors["city"])?"<div class='invalid-feedback'>Please provide a valid zip.</div>":"" ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="Enter zip">
                            <div class="invalid-feedback">Please provide a valid zip.</div>
                        </div>
                    </div>
                    
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nugget">Bevorzugte Soße für McNuggets</label>
                            <select class="form-control" id="nugget">
                            <option>Ketchup</option>
                            <option>Curry</option>
                            <option>Süß-Sauer</option>
                            <option>Alle</option>
                            <option>Keine</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password2">Repeat Password</label>
                            <input type="password" class="form-control" id="password2" placeholder="Repeat Password">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                    <?php
                        echo ($errors["city"])?"<p style=color:red>Please input city!</p>":"<p style=color:green>Success</p>";
                    ?>
                    </div>
                </div>
                <br/>
                <br/>
            </form>         
        </div>

        <div class="footer">
            <?php include 'footer.php';?> 
        </div>
    </body>
</html>
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
        <script src="../js/bootstrap.js"></script>
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

                        $errors = [];
                        $errors["city"] = false;
                        $errors["name"] = false;
                        $errors["email"] = false;
                        $errors["tel"] = false;
                        $errors["adress"] = false;
                        $errors["zip"] = false;
                        $errors["password"] = false;
                        $errors["password2"] = false;
                        $name = ""; $email = ""; $tel = ""; $adress = ""; $city = ""; $zip = ""; $password = ""; $password2 = "";

                        $errorcount = 0;

                        if($_SERVER["REQUEST_METHOD"] == "POST") {
                            if(empty($_POST["city"])) {
                                $errors["city"] = true;
                                $errorcount = $errorcount + 1;
                            } else {
                                $city = $_POST["city"];
                            }
                            if(empty($_POST["name"])) {
                                $errors["name"] = true;
                                $errorcount = $errorcount + 1;
                            } else {
                                $name = $_POST["name"];
                            }
                            if(empty($_POST["email"])) {
                                $errors["email"] = true;
                                $errorcount = $errorcount + 1;
                            } else {
                                $email = $_POST["email"];
                            }
                            if(empty($_POST["adress"])) {
                                $errors["adress"] = true;
                                $errorcount = $errorcount + 1;
                            } else {
                                $adress = $_POST["adress"];
                            }
                            if(empty($_POST["zip"])) {
                                $errors["zip"] = true;
                                $errorcount = $errorcount + 1;
                            } else {
                                $zip = $_POST["zip"];
                            }
                            if(empty($_POST["tel"])) {
                                $errors["tel"] = true;
                                $errorcount = $errorcount + 1;
                            } else {
                                $tel = $_POST["tel"];
                            }
                            if(empty($_POST["password"])) {
                                $errors["password"] = true;
                                $errorcount = $errorcount + 1;
                            } else {
                                $password = $_POST["password"];
                            }
                            if(empty($_POST["password2"])) {
                                $errors["password2"] = true;
                                $errorcount = $errorcount + 1;
                            } else {
                                $password2 = $_POST["password2"];
                            }
                        }

                        if($_SERVER["REQUEST_METHOD"] == "POST" && $errorcount < 1) {
                            require_once('dbaccess.php');
                            $db_obj = new mysqli($host, $user, $dbpassword, $database); 

                            if($db_obj->connect_error) {
                                echo "Connection Error: " . $db_obj->connect_error;
                                exit();
                            }

                            $sql = "Select * From users";
                            $result = $db_obj->query($sql);
                            while($row = $result->fetch_assoc()) {
                                echo "id: ".$row['id'] . "<br>";
                                echo "name: ".$row['name'] . "<br>";
                                echo "password: ".$row['password'] . "<br>";
                                echo "email: ".$row['email'] . "<br>";
                            }
                            //Password hashen
                            $hashpw = password_hash($password, PASSWORD_DEFAULT);
                            $sql = "INSERT INTO users (name, password, email) VALUES ('".$name."','".$hashpw."','".$email."');";
                            $result = $db_obj->query($sql);
                            $_SESSION["user"] = "user"; 
                            header('Location: ../index.php');
                            $db_obj->close();
                        }
                    ?>
            <form method="post" class="<?php echo (empty($_POST) == 1)?"":"was-validated" ?>">
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group <?php echo (!$errors["name"]) && empty($_POST)==0?"was-validated":""?>">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" required value="<?php echo $name ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group needs-validation">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required value="<?php echo $email ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tel">Phone</label>
                            <input type="tel" name ="tel" class="form-control" id="tel" placeholder="Enter phone number" required value="<?php echo $tel ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group <?php echo (!$errors["adress"]) && empty($_POST)==0?"was-validated":""?>">
                            <label for="adress">Adress</label>
                            <input type="text" name="adress" class="form-control" id="adress" placeholder="Enter adress" required value="<?php echo $adress ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-2">  
                        <div class="form-group"> <!--<php echo (!$errors["city"])?"was-validated":"needs-validation"?> -->
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Enter City" required value="<?php echo $city ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group <?php echo (!$errors["zip"]) && empty($_POST)==0?"was-validated":""?>">
                            <label for="zip">Zip</label>
                            <input type="text" name="zip" class="form-control" id="zip" placeholder="Enter zip" required value="<?php echo $zip ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <!--  && empty($_POST)==0-->
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nugget">Bevorzugte Soße für McNuggets</label>
                            <select class="form-control" name="nugget" id="nugget">
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
                        <div class="form-group <?php echo (!$errors["password"]) && empty($_POST)==0?"was-validated":""?>">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required value="<?php echo $password ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                        <div class="form-group <?php echo (!$errors["password2"]) && empty($_POST)==0?"was-validated":""?>">
                            <label for="password2">Repeat Password</label>
                            <input type="password" name="password2" class="form-control" id="password2" placeholder="Repeat Password" required value="<?php echo $password2 ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4 mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <div class="row justify-content-center" style="width: 100vw">
                    <div class="col-md-4">
                    <?php
                       // echo ($errors["city"])?"<p style=color:red>Please input city!</p>":"<p style=color:green>Success</p>";
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
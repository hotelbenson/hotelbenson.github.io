<?php
    $picture = $_FILES["picture"];
    var_dump($FILES);
    move_uploaded_file($_FILES["picture"]["tmp_name"], "../fileupload/".$_FILES["picture"]["name"]);

    require_once('dbaccess.php');
    $db_obj = new mysqli($host, $user, $dbpassword, $database); 

    if($db_obj->connect_error) {
        echo "Connection Error: " . $db_obj->connect_error;
        exit();
    }
    $date = date("Y-m-d");
    $sql = "INSERT INTO newsposts (picturename, picturepath, header, text, date) VALUES ('".$_FILES["picture"]["name"]."','../fileupload/".$_FILES["picture"]["name"]."','".$_POST['header']."','".$_POST['comment']."','".$date."');";
    $result = $db_obj->query($sql);
    $db_obj->close();

    header('Location: ../index.php');
?>
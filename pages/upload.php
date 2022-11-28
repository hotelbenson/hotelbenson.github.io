<?php
    $picture = $_FILES["picture"];
    var_dump($FILES);
    move_uploaded_file($_FILES["picture"]["tmp_name"], "../fileupload/".$_FILES["picture"]["name"]);


    header('Location: ../index.php');
?>
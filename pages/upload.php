<?php
    $picture = $_FILES["picture"];
    var_dump($FILES);
    move_uploaded_file($_FILES["picture"]["tmp_name"], "../fileupload/img01.jpg");


    header('Location: ../index.php');
?>
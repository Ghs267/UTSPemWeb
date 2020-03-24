<?php
    session_start();
    $user = $_SESSION['username'];
    include "../model/database.php";
    $name = $_FILES['file']['name'];
    
    $target_dir = "../model/img/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
    $query = 'UPDATE account SET image = "'.$name.'" WHERE email="'.$username.'" OR username ="'.$user.'"';
    $db->query($query);
    header("location:../view/home.php");
?>
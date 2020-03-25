<?php
    session_start();
    date_default_timezone_set('Asia/Jakarta');
    $time = date("y-m-d h:i:sa");
    include '../model/database.php';
    $posting = $_POST['posting'];
    $name = $_SESSION['name'];
    $pic = $_FILES['gambar']['name'];

    $target_dir = "../model/post_image/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

    move_uploaded_file($_FILES['gambar']['tmp_name'],$target_dir.$pic);
   
    $query = 'INSERT INTO post(username, body, created_at, picture) VALUES("'.$name.'", "'.$posting.'", "'.$time.'", "'.$pic.'")';
    $db->query($query);

    header("location:../view/home.php");
?>
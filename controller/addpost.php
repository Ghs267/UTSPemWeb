<?php
    session_start();
    date_default_timezone_set('Asia/Jakarta');
    $time = date("y-m-d h:i:sa");
    include '../model/database.php';
    $posting = $_POST['posting'];
    $name = $_SESSION['name'];
    $query = 'INSERT INTO post(username, body, created_at) VALUES("'.$name.'", "'.$posting.'", "'.$time.'")';
    $db->query($query);

    header("location:../view/home.php");
?>
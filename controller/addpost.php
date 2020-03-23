<?php
    session_start();
    include '../model/database.php';
    $posting = $_POST['posting'];
    $time = date("Y-m-d H:i:s");

    $currname = $_SESSION['username'];

    $res = $db->query("SELECT username FROM account WHERE username='$currname' OR email='$currname'");
    $name = $res->fetch();
    $query = 'INSERT INTO post(username, body, created_at) VALUES("'.$name[0].'", "'.$posting.'", "'.$time.'")';
    $db->query($query);

    header("location:../view/profil.php");
?>
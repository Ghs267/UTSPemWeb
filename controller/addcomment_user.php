<?php
    session_start();
    include '../model/database.php';

    $user = $_GET['username'];

    $post_id = intval($_POST['postId']);
    $comment = $_POST['comment'];
    $name = $_SESSION['name'];
  
    date_default_timezone_set('Asia/Jakarta');
    $time = date("y-m-d h:i:sa");

    $query = 'INSERT INTO comment(username, post_id, body, created_at) VALUES("'.$name.'","'.$post_id.'", "'.$comment.'", "'.$time.'")';
    $db->query($query);

    header("location:../view/profile.php?username=$user");

?>
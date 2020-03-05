
<?php

    include "../model/database.php";

    session_start();

    $code = $_POST['captcha_code'];
    $username = $_POST['username'];
    $pass = md5($_POST['password']);
    
    $query = $db->prepare("SELECT * FROM account WHERE (username= ? OR email= ?) && pass= ?");
    $query->bindParam(1, $username);
    $query->bindParam(2, $username);
    $query->bindParam(3, $pass);
    $query->execute();

    $count = $query->rowCount();

    if($count==1){
        if($code == $_SESSION['captcha_code']){
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            header("location:../view/profile.php");
        }
        else{
            header("location:../view/indexlogin.php");
        }
    }
    else{
        header("location:../view/indexlogin.php");
    }
?>

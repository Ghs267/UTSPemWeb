
<?php

    include "../model/database.php";

    session_start();
    

    $code = $_POST['captcha_code'];
    $username = $_POST['username'];
    $error = "Incorrect password or username!";
    $pass = md5($_POST['password']);
    
    $query = $db->prepare("SELECT * FROM account WHERE (username= ? OR email= ?) && password= ?");
    $query->bindParam(1, $username);
    $query->bindParam(2, $username);
    $query->bindParam(3, $pass);
    $query->execute();

    $count = $query->rowCount();

    if($count==1){
        if($code == $_SESSION['captcha_code']){
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";

            $currname = $_SESSION['username'];
            $res = $db->query("SELECT username FROM account WHERE username='$currname' OR email='$currname'");
            $name = $res->fetch();

            $_SESSION['name'] = $name[0];

            header("location:../view/profil.php");
        }
        else{
            header("location:../view/indexlogin.php");
        }
    }
    else{
        
        $_SESSION['errors'] = $error;
        header("location:../view/indexlogin.php");
    }
?>

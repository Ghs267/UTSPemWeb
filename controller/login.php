
<?php

    $username = $_POST['username'];
    $pass = md5($_POST['password']);
    
    $query = $db->prepare("SELECT * FROM account WHERE username= ? && pass= ?");
    $query->bindParam(1, $username);
    $query->bindParam(2, $pass);
    $query->execute();

    $count = $query->rowCount();

    if($count==1){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location:profile.php");
    }
    else{
        //header("location:indexloginfail.php");
        print "gagal";
    }
?>

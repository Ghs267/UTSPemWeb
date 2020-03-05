<!DOCTYPE html>
<html>
    <head>
        <script src="https://www.google.com/recaptcha/api.js"></script></head></head>
    <body>
        <?php

            include "database.php";

            $username = $_POST['username'];
            $pass = md5($_POST['password']);
            if(isset($_POST['g-recaptcha-response'])) $captcha=$_POST['g-recaptcha-response'];

            if(!$captcha){
                echo "<h2>Please check the captcha form</h2>";
                exit;
            }
            $str = 'https://www.google.com/recaptcha/api/siteverify?secret=6LfRctgUAAAAANLksFuPN0_HP8W9BiueYNYsglAX' . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR'];

            $response=file_get_contents($str);
            $response_arr=(array) json_decode($response);

            $query = $db->prepare("SELECT * FROM account WHERE username= ? && pass= ?");
            $query->bindParam(1, $username);
            $query->bindParam(2, $pass);
            $query->execute();

            $count = $query->rowCount();

            if($count==1 && $response_arr["success"]!=false){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['status'] = "login";
                header("location:profile.php");
            }
            else{
                //header("location:indexloginfail.php");
                print "gagal";
            }
        ?>
    </body>
</html>

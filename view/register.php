<?php
    include_once("database.php");
    $query = "SELECT * FROM register";
    $result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h3>Sign up system</h3>
    <form action="" method="post">
    <input type="text" name="firstname" id="firstname" required  placeholder="First Name" >
    <input type="text" name="lastname" id="lastname"  placeholder="Last Name" ><br><br>
    <input type="email" name="email" id="email"required  placeholder="Email" r><br><br>
    <input type="text" name="nohp" id="nohp" required  placeholder="No HP"><br><br>
    <input type="password" name="pass" id="pass" required  placeholder="Password"><br><br>
    <label>Tanggal Lahir</label><br>
    <input type="date" name="tgllahir" required  id="tgllahir"><br><br>
    <label>Gender</label><br>
    <input type="radio" name="gender"required  value="male">Male <br>
    <input type="radio" name="gender"   value="female">Female <br><br>
    <input type="submit" value="Submit" name="submit">
    </form>
    <?php 
     if(isset($_POST['submit'])){
         
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname =  htmlspecialchars ($_POST['lastname']);
        $email = htmlspecialchars($_POST['email']);
        $nohp = htmlspecialchars($_POST['nohp']);
        $pass = htmlspecialchars($_POST['pass']);
        $tgllahir = htmlspecialchars($_POST['tgllahir']);
        $gender = htmlspecialchars($_POST['gender']);
        
        $query = $conn->prepare("SELECT email FROM register where email=?");
        $query->bindValue( 1, $email );
        $query->execute();
        if($query->rowCount() > 0 ){
            echo "email exist";
        }else{
            $query = "INSERT into register (firstname, lastname, email,nohp, password, tgllahir,gender)
                VALUES ('$firstname','$lastname','$email','$nohp','".md5($pass)."', '$tgllahir','$gender')";
            $result = $conn->query($query);
                if($result){
                    echo "<div class='form'><h3>You are registered successfully.</h3>
                    <br/>Click here to <a href='login.php'>Login</a>
                    </div>";
                }
        }
    }
?>
</body>
</html>
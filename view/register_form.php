<?php
    session_start();
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
    <form action="../controller/register.php" method="post">
        
        <input type="text" name="firstname" id="firstname" required  placeholder="First Name" >
        <input type="text" name="lastname" id="lastname"  placeholder="Last Name" ><br><br>
        <input type="email" name="email" id="email" required  placeholder="Email"><br><br>
        <input type="text" name="username" id="username" required  placeholder="Username"><br><br>
        <input type="password" name="password" id="password" required  placeholder="Password"><br><br>
        <label>Tanggal Lahir</label><br>
        <input type="date" name="birth_date" required  id="birth_date"><br><br>
        <label>Gender</label><br>
        <input type="radio" name="gender" required  value="male">Male <br>
        <input type="radio" name="gender"   value="female">Female <br><br>
        <input type="submit" value="Submit" name="submit">
        <?php
            if(isset($_SESSION["errors"])){
                $error = $_SESSION["errors"];
                echo "<p style=\"color:red;\">$error</p>";
            }
        ?> 
    </form>
    <p>Have an account? <a href="indexlogin.php">LOGIN</a> now</p>
</body>
</html>
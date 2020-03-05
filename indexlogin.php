<!DOCTYPE hmtl>

<html>
    <head>
        <title>Nama Sosmed Kita</title>
        <script>
            function validasi() {
                var email = document.getElementById("email").value;
                var pass = document.getElementById("pass").value;		
                if (email != "" && pass!="") {
                    // event.preventDefault();
                    return true;
                }
                else{
                    alert('Username and Password must not be empty !');
                    return false;
                }
        }
        </script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
    <body>
        <form action="login.php" method="post" onSubmit="return validasi()">
            <label>Username : </label>
            <input type="text" name="username" id="username"><br>
            <label>Password :</label>
            <input type="password" name="password" id="password"><br>
            <div class="g-recaptcha" data-sitekey="6LfRctgUAAAAAP86h2HuA2Zq4mX8ulV-SYIMh6Y3" style="margin-bottom:10px;"></div><br>
            <button type="submit">LOGIN</button>
        </form>
    </body>
</html>
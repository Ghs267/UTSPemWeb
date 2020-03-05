<!DOCTYPE hmtl>

<html>
    <head>
        <title>Nama Sosmed Kita</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
        <script type="text/javascript">
            function validasi() {
                var email = document.getElementById("username").value;
                var pass = document.getElementById("password").value;
                var code = document.getElementById("captcha_code").value;
                		
                if (email != "" && pass!="") {
                    if(code == ''){
                        event.preventDefault();
                        alert('Enter Captcha Code');
                        return false;
                    }
                    else{
                        $.ajax({
                        url:"../controller/check_code.php",
                        method:"POST",
                        data:{code:code},
                        success:function(data)
                        {
                        if(data == 'success')
                        {
                            $('#login').attr('disabled', false);
                            return true;
                        }
                        else
                        {
                            //event.preventDefault();
                            alert('Invalid Code');
                        }
                        }
                        });
                        
                    }
                }
                else{
                    alert('Username and Password must not be empty !');
                    return false;
                }

                
             }
        </script>
    </head>
    <body>
        <form id="captch_form" action="../controller/login.php" method="post" onSubmit="return validasi();">
            <label>Username or Email : </label>
            <input type="text" name="username" id="username"><br>
            <label>Password :</label>
            <input type="password" name="password" id="password"><br>
            <img src="../model/image.php" id="captcha_image" />
            <button type="button" onClick="refresh();">refresh</button><br>
            <label>Code</label>
            <input type="text" name="captcha_code" id="captcha_code"><br>
            <button type="submit" id="login">LOGIN</button>
        </form>
    </body>
</html>

<script>
    function refresh(){
        $('#captcha_image').attr('src', '../model/image.php');
    }
</script>
<?php
    session_start();
    if(isset($_SESSION['status'])){
        header("location:controller/logout.php");
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <title>ChatMe! Login</title>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Data Tables -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">
        
        <link href="view/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="view/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <link href="view/vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="view/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

        <link href="view/css/main.css" rel="stylesheet" media="all">

        <script src="view/vendor/jquery/jquery.min.js"></script>
        <script src="view/vendor/select2/select2.min.js"></script>
        <script src="view/vendor/datepicker/moment.min.js"></script>
        <script src="view/vendor/datepicker/daterangepicker.js"></script>
        <script src="view/js/global.js"></script>

    
        <script type="text/javascript">
            var perfEntries = performance.getEntriesByType("navigation");

            if (perfEntries[0].type === "back_forward") {
                location.reload(true);
            }
            function refresh(){
                $('#captcha_image').attr('src', 'model/image.php');
            }
            function validasi() {
                var email = document.getElementById("username").value;
                var pass = document.getElementById("password").value;
                		
                if (email != "" && pass!="") {
                    return true
                }
                else{
                    alert('Username and Password must not be empty !');
                    return false;
                }
             }
             function captcha_validate(){
                var code = document.getElementById("captcha_code").value;
                if(code == ''){
                        event.preventDefault();
                        alert('Enter Captcha Code');
                        return false;
                    }
                    else{
                        $.ajax({
                        url:"controller/check_code.php",
                        method:"POST",
                        data:{code:code},
                        success:function(data)
                        {
                        if(data == 'success')
                        {
                            alert('Captcha verified!');
                            $('#captcha_div').attr('hidden', true);
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
        </script>
    </head>

    <body>


<!-- HEADER -->
<div class="w3-top">
    <div class="header">	
		<h1><img src="Foto/logo.png" alt="logo" style="width:100px;">ChatMe</h1>
	</div>

</div>

    <div class="page-wrapper bg-1 p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Login</h2>
                    <form id="captch_form" action="controller/login.php" method="post" onSubmit="return validasi();">

                    <!--email/username & password-->

                    <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Email or Username" name="username" id="username">
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="password" placeholder="Password" name="password" id="password">
                                </div>
                            </div>
                        </div>
            
            <div id="captcha_div">
                <img src="UTSPemweb" alt="">
                <img src="model/image.php" id="captcha_image" class="btn--submitcaptcha" />
                <button style="margin-x:2em;" type="button" onClick="refresh();">refresh</button><br>
                <br>

                <div class="input-group">
                    <input class="input--style-2" type="text" placeholder="Input Capthca" name="captcha_code" id="captcha_code">
               </div>
                <button class="btncaptcha btn--radius btn--submitcaptcha" type="button" onClick="captcha_validate();">Check</button><br>
            </div>
            <div class="p-t-30">
                <button class="btn btn--radius btn--submit" type="submit" id="login" disabled="true">LOGIN</button><br>
            </div>

            <?php
                if(isset($_SESSION["errors"])){
                    $error = $_SESSION["errors"];
                    echo "<p style=\"color:red;\">$error</p>";
                }
            ?> 
        </form>
        <br><br>
        <h5>Don't have an account? <a href="view/register_form.php">REGISTER</a> here</h5>
            </div>
            </div>
            </div>
            </div>
        <footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
        <h4>Follow Us</h4>
        <br>
        <a class="w3-button w3-large --button" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
        <a class="w3-button w3-large --button" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
        <a class="w3-button w3-large --button" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
        <a class="w3-button w3-large --button" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram"></i></a>
        <a class="w3-button w3-large w3-hide-small --button" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
        <br><br>
        <p>Powered by ChatMe 2020</p>
    </footer>
    </body>
</html>
<?php
    unset($_SESSION["errors"]);
?>
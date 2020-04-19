<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Title Page-->
    <title>Sign Up</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <script type="text/javascript">
        function validasi() {
                var email = document.getElementById("email").value;
                var pass = document.getElementById("password").value;
                var uname = document.getElementById("username").value;
                var fname = document.getElementById("firstname").value;
                var bdate = document.getElementById("birth_date").value;
                var gender = document.getElementById("gender").value;
                		
                if (email != "" && pass!="" && uname!="" && fname !="" && bdate!="" && gender!="") {
                    return true
                }
                else{
                    alert('Field must not be empty !');
                    return false;
                }
             }
             $(document).ready(function(){
            $('#exampleModal').modal({
                keyboard: false,
                show: true,
                backdrop: 'static'
            });
        });
    </script>
</head>
<body>
    <!-- HEADER -->
<div class="w3-top">
    <div class="header">	
		<h1><img src="Foto/logo.png" alt="logo" style="width:100px;">ChatMe</h1>
	</div>
</div>
    <?php
        if(isset($_SESSION['message'])){
            echo 
            "<div class=\"modal fade\" id=\"exampleModal\" role=\"dialog\">
                    <div class=\"modal-dialog\">
                    <div class=\"modal-content\">
                        <div class=\"modal-header\">
                            <h3 class=\"modal-title\" style='text-align:center;'>Notification</h3>
                            </div>
                            <div class=\"modal-body\">";
                            echo "<h4 style='padding-top:5px; text-align:center;'>" . $_SESSION['message'] . "</h4>
                            <a href='indexlogin.php'><button type='button' class='btn btn-primary'>Login</button></a>
                            </div>
                    </div>
                    </div>
            </div>";
        }
    ?>
<div class="page-wrapper bg-1 p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-headingregister"></div>
                <div class="card-body">
                    <h2 class="title">Sign Up</h2>
                    <form action="../controller/register.php" method="post" enctype="multipart/form-data" onSubmit="return validasi();">
                        <!--full name-->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" id="firstname" required placeholder=" First Name" name="firstname">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" id="lastname" placeholder="Last Name" name="lastname">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <!--birthdate-->
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2 js-datepicker" type="text" placeholder="Birthdate" name="birth_date"required  id="birth_date">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <!--gender-->
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender" id="gender">
                                            <option value="" disabled selected>Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--email-->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="email" placeholder="Email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <!--uname & password-->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Username" name="username" id="username" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="password" placeholder="Password" name="password" id="password" required>
                                </div>
                            </div>
                        </div>
                        <!-- profile -->
                        <div class="row row-space">
                            <div class="col-2">
                                <!--
                                <div class="avatar-upload div">
                                    <div class="avatar-edit div"> -->
                                        <div class="upload-btn-wrapper">
                                            <button class="btn btn--radius btn--submitcaptcha">Choose Profile Picture</button><p style="color:grey;margin-top:5px;">(Optional)</p>
                                            <input class="input" type="file" name="file" id="poster" accept="image/jpeg, image/jpg, image/png">
                                        </div>
                                <!--    </div> 
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url();"> </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <!--NEXT BUTTON-->
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--submit" type="submit" value="Submit" name="submit">Submit</button>
                        </div>
                        <?php
                            if(isset($_SESSION["errors"])){
                                $error = $_SESSION["errors"];
                                echo "<p style=\"color:red;\">$error</p>";
                            }
                        ?> 
                    </form>
                    <div class="row row-space account">
                        <div class="p-t-20">
                            <p>Already have an account? <a href="indexlogin.php" class="signin">LOGIN</a> now!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
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
    session_destroy();
?>
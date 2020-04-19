<?php
    session_start();
    if(!isset($_SESSION['status'])){
        header("location:indexlogin.php");
    }
    include "../model/database.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>ChatMe!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Data Tables -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    

    <link rel="stylesheet" href="W3.css">
    <link rel="stylesheet" href="Timeline.css">
    
    <script type="text/javascript">

    function validasipropic() {
        var pic = document.getElementById("poster").value;
        if (pic!="") {
            return true
        }
        else{
            alert('Field must not be empty !');
            return false;
        }
    }

    function validasiPost(){
        var teks = document.getElementById("posting").value;
        var gbr = document.getElementById("gambar").value;
        if(teks=="" || gbr==""){
            alert("Please share a picture or short message :)");
            return false;
        }
        else{
            return true;
        }
    }

        $(document).ready(function(){
            $('#exampleModal').modal({
                show: false
            });
        });

        function showModal(){
            $('#exampleModal').modal({
                show: true
            });
        }

        $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"../controller/fetch.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }
        
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();			
            }
        });
    });
	</script>
</head>
<body class="body">

<!-- HEADER -->
<div class="w3-top">
	<div class="w3-bar w3-theme-d2 w3-left-align">
		<a href="home.php" class="w3-bar-item w3-button --button"><i class="fa fa-home w3-margin-right "></i>Home</a>
		<a href="AboutUs.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About Us</a>
	</div>

	<div class="header">	
		<h1><img src="Foto/logo.png" alt="logo" style="width:100px;">ChatMe</h1>
	</div>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark"></nav>
		<a class="navbar-brand" href="#"></a>
	</nav>
</div>

<!-- END OF HEADER -->

    <!-- SEARCH USER -->

    <div class="container" style="width: 1000px;">
    
        <div class="container">
             <div class="form-group">
                <div class="input-group">
                    <input type="text" name="search_text" id="search_text" placeholder="Search user.." class="form-control" />
                </div>
            </div>
            <br />
            <div id="result"></div>
        </div>
        <div style="clear:both"></div>

        <div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic" class="img-responsive">

                    <!-- PROFILE USER -->
                    <?php 
                        //profpic
                        $username = $_SESSION['name'];
                        $result = $db->query("SELECT image FROM account WHERE username='$username'");
                        $pic = $result->fetch();
                        echo '<div  class="profile-header-container">';
                        echo '<div class="profile-header-img"></br>';
                        echo '<img src="../model/img/' . $pic[0] . '" style ="width:200px;height:200px;"></div>';  
                        echo '</div>';
                    ?> 

                    <form action="../controller/changeProfilePic.php">
                        <label></label>
                    </form>
                </div>

				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                        <?php
                        //username
                        echo '<b style="font-size:1.2em;">' . $username. '</b><br>';
                        $result = $db->query("SELECT CONCAT_WS(' ', first_name, last_name) FROM account WHERE username='$username'");
                        $name = $result->fetch();
                        echo $name[0];
                        ?>
					</div>
					<div class="profile-usertitle-job">
                        <?php
                            $query = "SELECT birth_date from account WHERE username='".$username."'";
                            $result = $db->query($query)->fetch();

                            echo '<i class="glyphicon glyphicon-gift"></i>&nbsp' . $result[0];
                        ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->

				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
                        <li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
                        </li>
                        <li>
							<a onClick="showModal();">
							<i class="glyphicon glyphicon-camera" ></i>
                            Change Profile Picture </a>
                            
                            <!-- MODAL UNTUK GANTI PROFILE PICTURE -->

                            <div class="modal fade" id="exampleModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title"><b>CHANGE PROFILE PICTURE</b></h3>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../controller/changeProfilePic.php" method="post" enctype="multipart/form-data" onSubmit="return validasipropic();">
                                                <input type="file" name="file" id="poster" accept="image/jpeg, image/jpg, image/png"><br>
                                                <input type="submit">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

						</li>
						
                        <li>
							<a href="../controller/logout.php">
							<i class="glyphicon glyphicon-off"></i>
                            Log Out </a>
                             <!-- TOMBOL LOGOUT -->
						</li>
					</ul>
				</div>
				<!-- END MENU -->
            </div>
            <div class="cardd">
                <?php
                    $query = "SELECT * FROM account EXCEPT SELECT * FROM account WHERE username='".$username."';";
                    $result = $db->query($query);

                    echo '<div><h5><b>You might know these users..</b></h5><br>';
                    foreach($result as $r){
                        echo '<div class="container" style="margin-bottom:1em;"><img style="width:2em;height:2em;border-radius:2em;" src="../model/img/'.$r[7].'">&nbsp<b><a href="profile.php?username='.$r[3].'">'.$r[0].' '.$r[1].'</a></b><br></div>';
                    }
                    echo '</div>';
                    $result = null;
                ?>
            </div>
		</div>

		<div class="col-md-9">
            <div class="profile-content ">
                <div class="post">

                    <div class="card">
                    <h4>SHARE YOUR STORY HERE !</h4>
                    <br>
                      <!-- FORM POST -->
                        <div>
                            <form action="../controller/addpost.php" method="post" enctype="multipart/form-data" onSubmit="return validasiPost();">
                            <?php 
                                    $username = $_SESSION['name'];
                                    $result = $db->query("SELECT CONCAT_WS(' ', first_name, last_name) FROM account WHERE username='$username'");
                                    $name = $result->fetch();
                                    echo '
                                    
                                    <div class="md-form mb-4 pink-textarea active-pink-textarea-2">
                                        <textarea id="form17" class="md-textarea form-control" name="posting" id="posting" rows="3" style="resize:none;" placeholder="Share your day, ' . $name[0] . '.."></textarea>
                                    </div>
                                    ';
                                    echo '
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <div class="upload-btn-wrapper">
                                                <button class="btn btn--radius btn--submitcaptcha">Upload a file</button>
                                                <input type="file" name="gambar" id="gambar" accept="image/jpeg, image/jpg, image/png">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <input type="submit" value="Post" style="color:white;">
                                        </div>
                                    </div>
                                    </div>'; 
                                ?>
                                
                            </form>
                            <br>
                        </div>
                    </div>                            

                    <!-- SHOW POST -->
                    <?php 
                        $query = "SELECT * FROM post JOIN account ON post.username = account.username WHERE account.username = '".$username."'";
                        $result = $db->query($query);
                        echo '<div>';
                        foreach($result as $p){
                            echo '<div class="card">';
                            echo '<img style="width:2em;height:2em;border-radius:2em;" src="../model/img/'.$p[13].'"><b><h5><a href="profile.php?username='.$p[0].'">'.$p[0].'</a></h5></b>';
                            echo '<br>';
                            if($p[3] != ""){
                                echo '<div ><img src="../model/post_image/'.$p[3].'" class="fakeimg"></div>';
                            }
                            echo '<p>'.$p[2].'</p>';
                            echo '</div>';

                            $querycomment = "SELECT * from comment join account ON comment.username = account.username WHERE post_id = '".$p[1]."'";
                            $rescomment = $db->query($querycomment);
                            
                            echo '<br>';
                            echo 'Comments : ';
                            echo '<br>';
                            echo '<br>';
                            echo '<div class="comments">';

                            //buat nampilin comment per post
                            foreach($rescomment as $rc){
                                echo '<div style="margin-left:2em;"><img style="width:2em;height:2em;border-radius:2em;" src="../model/img/'.$rc[12].'">';
                                echo '&nbsp<b><a href="profile.php?username='.$rc[0].'">'.$rc[0].'</a></b><br><p>'.$rc[3].'</p></div>';
                            }
                            echo'</div>';
                            echo '<div class="cp">
                            <div style="margin-left:2em;">
                            <form action="../controller/addcomment.php" method ="post">
                                <input type="text" name="comment" placeholder="Add comment.." />
                                <button value="'.$p[1].'" name="postId" class="-button">Comment</button>
                            </form>
                            </div>
                            </div>';
                        }
                        echo '</div>';
                        $result = null;
                    ?>
                  </div>
            </div>
		</div>
	</div>
</div>


            
    </div>
    
    <br><br><br>

    <!-- Footer -->
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
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
	<title>chatMe</title>

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

    <script type="text/javascript">

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
	</script>
</head>
<body>
    <header>
        
    </header>
	<div class="container" style="width: 1000px;">
        <!-- PROFILE USER -->
        
        <?php 

            //profpic
            $username = $_SESSION['username'];
            $result = $db->query("SELECT image FROM account WHERE username='$username' OR email='$username'");
            $pic = $result->fetch();
            echo '<div style="width:250px;"><button style="float:right;" onClick="showModal();"><span class="glyphicon glyphicon-camera"></span></button></br>';
            echo '<img src="../model/img/' . $pic[0] . '" style ="max-width:200px;max-height:200px;"></div>';

            //username
            $result = $db->query("SELECT username FROM account WHERE username='$username' OR email='$username'");
            $name = $result->fetch();
            echo $name[0];

        ?> 

        <form action="../controller/changeProfilePic.php">
            <label></label>
        </form>

        <!-- MODAL UNTUK GANTI PROFILE PICTURE -->

        <div class="modal fade" id="exampleModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title"><b>CHANGE PROFILE PICTURE</b></h3>
                    </div>
                    <div class="modal-body">
                        <form action="../controller/changeProfilePic.php" method="post" enctype="multipart/form-data">
                            <label>Choose image</label>
                            <input type="file" name="file" id="poster" accept="image/jpeg, image/jpg, image/png"><br>
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <a href="../controller/logout.php"><button><span class="glyphicon glyphicon-log-out"></span></button></a>

    </div>

</body>
</html>
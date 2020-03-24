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
            $username = $_SESSION['name'];
            $result = $db->query("SELECT image FROM account WHERE username='$username'");
            $pic = $result->fetch();
            echo '<div style="width:250px;"><button style="float:right;" onClick="showModal();"><span class="glyphicon glyphicon-camera"></span></button></br>';
            echo '<img src="../model/img/' . $pic[0] . '" style ="max-width:200px;max-height:200px;"></div>';

            //username
            $result = $db->query("SELECT username FROM account WHERE username='$username'");
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

        <!-- TOMBOL LOGOUT -->

        <a href="../controller/logout.php" ><button><span class="glyphicon glyphicon-log-out"></span></button></a>

        <!-- FORM POST -->
        <div>
            <form action="../controller/addpost.php" method="post">
                <?php 
                    $result = $db->query("SELECT CONCAT_WS(' ', first_name, last_name) FROM account WHERE username='$username'");
                    $name = $result->fetch();
                    echo '<textarea style="resize:none;" name="posting" rows="4" cols="50" placeholder="Share your day, ' . $name[0] . '.."></textarea>';
                ?>
                </br>
                <input type="submit" value="Post">
                
            </form>
            <br>
        </div>

            <!-- SHOW POST -->

            <?php 
                //query buat post
                $query = "SELECT * FROM post WHERE post.username='$username'";
                $result = $db->query($query);

                foreach($result as $p){
                    echo '<div class="container"><p>'.$p[2].'</p><br>';
                    $querycomment = "SELECT * from comment WHERE post_id = '".$p[1]."'";
                    $rescomment = $db->query($querycomment);

                    //buat nampilin comment per post
                    foreach($rescomment as $rc){
                        echo '<div><p>'.$rc[3].'</p></div>';
                    }
                    echo'<form action="../controller/addcomment.php" method ="post">
                        <input type="text" name="comment" placeholder="Add comment..">
                        <button value="'.$p[1].'" name="postId">Comment</button>
                    </form>
                    </div>';
                }
                
                $result = null;

            ?>
    </div>

</body>
</html>
<?php
    session_start();
    if(!isset($_SESSION['status'])){
        header("location:indexlogin.php");
    }
    include "../model/database.php";

    $user = $_GET['username'];

    if($user == $_SESSION['name']){
        header("location:home.php");
    }
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

</head>
<body>
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

	<div class="container" style="width: 1000px;">
        <!-- PROFILE USER -->
        
        <?php 

            //profpic
            $result = $db->query("SELECT image FROM account WHERE username='$user'");
            $pic = $result->fetch();
            echo '<img src="../model/img/' . $pic[0] . '" style ="max-width:200px;max-height:200px;"></div>';

            //username
            echo '<b>' . $user. '</b><br>';
            $result = $db->query("SELECT CONCAT_WS(' ', first_name, last_name) FROM account WHERE username='$user'");
            $name = $result->fetch();
            echo $name[0];

        ?> 

        <form action="../controller/changeProfilePic.php">
            <label></label>
        </form>



        <!-- TOMBOL HOME -->

        <a href="home.php" ><button><span class="glyphicon glyphicon-home"></span></button></a>


            <!-- SHOW POST -->

            <?php 
                //query buat post
                $query = "SELECT * FROM post JOIN account ON post.username = account.username WHERE post.username = '".$user."'";
                $result = $db->query($query);

                foreach($result as $p){
                    echo '<div class="container"><img style="max-width:2em;max-height:2em;" src="../model/img/'.$p[13].'"><b><a href="profile.php?username='.$p[0].'">'.$p[0].'</a></b><br><p>'.$p[2].'</p><br>';
                    if($p[3] != ""){
                        echo '<img src="../model/post_image/'.$p[3].'">';
                    }
                    
                    $querycomment = "SELECT * from comment WHERE post_id = '".$p[1]."'";
                    $rescomment = $db->query($querycomment);

                    //buat nampilin comment per post
                    foreach($rescomment as $rc){
                        echo '<div><b><a href="profile.php?username='.$rc[0].'">'.$rc[0].'</a></b><br><p>'.$rc[3].'</p></div>';
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
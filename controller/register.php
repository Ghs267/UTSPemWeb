
<?php 
    session_start();
    include "../model/database.php";
    $query = "SELECT * FROM account";
    $result = $db->query($query);

    $error = "Username/Email exist!";

    if(isset($_POST['submit'])){
        // Image
        $name = $_FILES['file']['name'];
        $target_dir = "../model/img/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname =  htmlspecialchars ($_POST['lastname']);
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $bdate = strtotime($_POST['birth_date']);
        $birth_date = date('Y-m-d', $bdate);
        $gender = htmlspecialchars($_POST['gender']);
        
        $query = $db->prepare("SELECT * FROM account where email=? OR username=?");
        $query->bindValue( 1, $email );
        $query->bindValue( 2, $username );
        $query->execute();
        if($query->rowCount() > 0 ){
            $_SESSION['errors'] = $error;
            header("location:../view/register_form.php");
        }else{
            if($name == ""){
                $name = "default.png";
            }else{
                move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
            }
            $query = "INSERT into account VALUES ('$firstname','$lastname','$email','$username','".md5($password)."', '$birth_date','$gender', '$name')";
            $result = $db->query($query);
            if($result){
                header("location:../view/register_success.php");
            }
        }
    }
?>
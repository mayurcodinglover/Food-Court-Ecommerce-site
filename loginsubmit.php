<?php
include("./connect.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{   
    
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $check_email = "select * from users where email = '$email'";
    $check_email_run = mysqli_query($con,$check_email);
    
    $numRows = mysqli_num_rows($check_email_run);

    if($numRows >0){
        $row = mysqli_fetch_assoc($check_email_run);
        if(password_verify($password,$row['password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['uid']  = $row['user_id'];
            $_SESSION['name'] = $row['name'];
            echo "right";
        }
        else{
            echo "wrong";
        }
    }
    
    // header('location:index.php');
}
?>

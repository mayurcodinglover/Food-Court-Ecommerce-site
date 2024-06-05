
<?php
include("./connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    
    if (!empty($name) && !empty($phone) && !empty($email) && !empty($password) && !empty($cpassword)) {
        // Check Email Address is present in database or not.
        $check_email = "select * from users where email = '$email'";
        $check_email_run  = mysqli_query($con, $check_email);

        if (mysqli_num_rows($check_email_run) > 0) {
            echo "Exist";
            header('location:register.php');
        } else {
            if ($password == $cpassword) {
                $hash = password_hash($password, PASSWORD_DEFAULT); // Hash Password Creation
                $insert_query = "insert into users(name,phone,email,password,added_on) values ('$name','$phone','$email','$hash',current_timestamp())";
                $insert_query_run = mysqli_query($con, $insert_query);
                if ($insert_query_run) {
                    
                    header('location:login.php');
                    echo "inserted ";
                } else {
                    echo "match";
                    header('location:register.php');
                }
            }
            else{
                echo "match";
            }
        }
    }
}
?>
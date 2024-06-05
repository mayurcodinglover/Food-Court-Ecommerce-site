<?php
include("./includes/connection.php");
include("./includes/functions.php");
$msg="";
if(isset($_POST["submit"]))
{
    $username= get_safe_value($conn, $_POST["username"]);
    $password= get_safe_value($conn, $_POST["password"]);
    $sql="select *from admin_users where username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)> 0){
        $_SESSION['ADMIN_LOGIN']="yes";
        $_SESSION["ADMIN_USERNAME"]=$username;
        header('location:categories.php');
        die("");

    }
    else{
        $msg= "Please Enter correct login details :";
        echo $msg;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="partials/css/style.css">
</head>
<body class="test">
    <div class="container">     
        <form action="" method="post" class="form-group mx-auto form">
            <div class="Email">
                <label for="">Email</label>
                <input type="text" name="username" class="form-control w-40" placeholder="Enter User Name :"required>
            </div>
            <div class="Password">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control"placeholder="Enter password :"required><br>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="feild_error"><?php echo $msg?></div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
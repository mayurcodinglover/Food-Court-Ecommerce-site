<?php
include('includes/header.php');
include('connect.php');
?>
<?php
session_start();
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $_SESSION['email']=$email;
    $password = mysqli_real_escape_string($con,$_POST['password']);
    if($email=="" || $password=="")
    {
        ?>
        <script>
            alert("field empty");
        </script>
        <?php
    }
    else{
    $check_email = "select * from users where email = '$email'";
    $check_email_run = mysqli_query($con,$check_email);
    
    $numRows = mysqli_num_rows($check_email_run);

    if($numRows == 1){
        $row = mysqli_fetch_assoc($check_email_run);
        if(password_verify($password,$row['password'])){
            echo "<script>
            localStorage.setItem('uid', " . json_encode($row['user_id']) . ");
            </script>";
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['uid']  = $row['user_id'];
            $_SESSION['name'] = $row['name'];
            header('location:index.php');
        }
        else{
            ?>
            <script>
                alert("Email id or password is incorrect :");
            </script>
            <?php
        }
        
    }
    }
}
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow" style="background-color: #f2f2f2;">
                    <h4 class="text-center" style="margin-top: 15px; margin-bottom:5px; font-weight:bold;">Log In</h4>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="login_name" name="email"
                                    placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword5" class="form-label">Password</label>
                                <input type="password" id="login_password" class="form-control" name="password"
                                    aria-describedby="passwordHelpBlock" placeholder="Enter your password">
                            </div>
                            <div class="d-grid gap-2 mb-2">
                                <button class="btn btn-primary"  name="loginsubmit" type="submit">Login</button>
                            </div>
                            
                            <br>
                            <hr>
                            <p class="text-center">Don't have an account? <a href="register.php"
                                    style="text-decoration: none">Sign
                                    up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./partials/js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>

<?php
          if(isset($_SESSION['message'])){
            ?>
                alertify.set('notifier', 'position', 'top-right');
                alertify.success("<?=$_SESSION['message'];?>");
                <?php
            }
              unset($_SESSION['message']);
        ?>
</script>
</body>

</html>
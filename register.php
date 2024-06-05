<?php
include('includes/header.php');
include('connect.php');
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow" style="background-color: #f2f2f2;">
                    <h4 class="text-center" style="margin-top: 15px; margin-bottom:5px; font-weight:bold;">Registeration
                    </h4>
                    <div class="card-body">
                        <form name="registerForm" method="post">
                            <div class="mb-1">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter your name">
                            </div>
                            <span class="error" id="nameError"></span>
                            <div class="mb-1">
                                <label class="form-label">Phone</label>
                                <input type="text   " name="phone" id="phone" class="form-control"
                                    placeholder="Enter your phone number">
                            </div>
                            <span class="error" id="phoneError"></span>
                            <div class="mb-1">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                    id="email" aria-describedby="emailHelp">
                            </div>
                            <span class="error" id="emailError"></span>
                            <div class="mb-1">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter your password" id="password">
                            </div>
                            <span class="error" id="passwordError"></span>
                            <div class="mb-1">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" id="cpassword" class="form-control"
                                    placeholder="Confirm password">
                            </div>
                            <span class="error mb-2" id="cpasswordError"></span>
                            <div class="d-grid gap-2 mb-2">
                                <button type="submit" class="btn btn-primary" id="btn-submit" name="submit-btn">Submit</button>
                            </div>
                        </form>
                        <center>
                            <div class="my-4">Have an account already?<a href="login.php" class="text-primary ms-2"
                                    style="text-decoration:none">Sign in</a></div>
                        </center>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
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
            ?>
                <script>
                    alert("User exist");
                </script>
                <?php
            header('location:register.php');
        } else {
            if ($password == $cpassword) {
                $hash = password_hash($password, PASSWORD_DEFAULT); // Hash Password Creation
                $insert_query = "insert into users(name,phone,email,password,added_on) values ('$name','$phone','$email','$hash',current_timestamp())";
                $insert_query_run = mysqli_query($con, $insert_query);
                if ($insert_query_run) {
                    
                    
                    ?>
                <script>
                    alert("register success");
                    window.location.href='login.php';
                </script>
                <?php
                    
                }
            }
            else{
                ?>
                <script>
                    alert("Password not matched");
                </script>
                <?php
            }
        }
    }
}
?>
<script src="./partials/js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

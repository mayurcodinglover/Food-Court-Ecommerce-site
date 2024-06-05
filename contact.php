<?php
include('includes/header.php');
include('includes/navbar.php');
include('connect.php');
session_start();
if(isset($_POST['contact_btn']))
{
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);

    $comment = mysqli_real_escape_string($con,$_POST['comment']);
    $insert_query = "INSERT INTO contact_us (name,email,mobile,comment,added_on) VALUES ('$name' ,'$email', '$mobile','$comment', current_timestamp())";
    $insert_query_run = mysqli_query($con,$insert_query);

    if($insert_query_run)
    {
        $_SESSION['message'] = "Thank You , We will call you soon...";  
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
    }
}
?>
<div class="py-3" style="background-color:#B6E2A1">
    <div class="container" style="background-color:#B6E2A1">
        <h6>
            <a class="text-dark" href="index.php">
                Home /
            </a>
             Contact us
        </h6>
    </div>
</div>
<?php
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
}
unset($_SESSION['message']);

?>
<div class="my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label"><b>Name</b></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Phone</b></label>
                                <input type="tel" name="mobile" class="form-control" placeholder="Enter your phone number" required>
                            </div>

                            <div class="mb-3">
                                <label for="Email" class="form-label"><b>Email address</b></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-2">
                                <label for="Textarea" class="form-label"><b>Comment</b></label>
                                <textarea class="form-control" name="comment" id="Textarea" placeholder="Enter your feedback" rows="5" required></textarea>
                            </div>
                            <button type="submit" name="contact_btn" value="submit" class="btn btn-primary">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
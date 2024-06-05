<?php
include'connect.php';

error_reporting(0);
$totalProduct=0;
session_start();
if(isset($_SESSION['uid']))
{
    
    $totalProduct=0;
    $uid= $_SESSION['uid'];
    $sql2="select count(*) from product p inner join cart c on p.id=c.pid inner join users u on c.uid=u.user_id where c.uid=".$uid."";
    $res=mysqli_query($con,$sql2);
    $row=mysqli_fetch_array($res);
    $totalProduct=$row[0];
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success text-white shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">FoodCourt</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="category.php">Collections</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="contact.php">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="aboutus.php
          ">About us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="cart.php"><i class="fa badge fa-lg" id="small-badge" value="<?php echo $totalProduct?>">&#xf07a;</i></a>
                </li>

            </ul>
            <ul class="navbar-nav">
            <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
            {?>
              <p class="text-light my-auto mx-2"><?php echo $_SESSION['name'];?></p>
              <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php"><i class="fa fa-sign-out"></i></a>
                </li>
            <?php
            }
            else
            {?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="register.php"><i class="fa fa-registered"></i>
                        Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="login.php"><i class="fa fa-user"></i> Login</a>
                </li>
            <?php
        }?>
            </ul>
        </div>
    </div>
</nav>
<?php
include('includes/header.php');
include('includes/navbar.php');
include('connect.php');
error_reporting(0);
session_start();
$finaltotal=0;


if(isset($_GET['cid']))
{
    
    $sql="delete from cart where cartid=".$_GET['cid'];
    $res=mysqli_query($con,$sql);
    header("location:cart.php");
    
}



if((isset($_POST['submit'])) && (isset($_SESSION['email'])))
{
    echo "inside submit";
    
    $name=$_SESSION['product_name'];
    $getid="select id from product where name='$name'";
    $res=mysqli_query($con,$getid);
    $row=mysqli_fetch_array($res);
    $id=$row['id'];


    $pid= $id;
    $uid= $_SESSION['uid'];
    $qty= $_POST['qty1'];

    $sql="insert into cart (pid,uid,qty) values($pid,$uid,$qty)";
    $res1=mysqli_query($con,$sql);
    echo "<script>alert('Prodcut Added to cart')</script>";
    header("location:index.php");
}
else{
    if(isset($_SESSION['email']))
    {
        $uid= $_SESSION['uid'];
        $sql2="select c.cartid,image,p.name,price,c.qty from product p inner join cart c on p.id=c.pid inner join users u on c.uid=u.user_id where c.uid=".$uid."";
        $result=mysqli_query($con,$sql2);
    }
    else{
        echo "<script>alert('Please login')</script>";
        header("location:login.php");
    }

    
}
    
?>
<div class="py-5" style="background-color:#B6E2A1">
    <div class="container" style="background-color:#B6E2A1">
        <h1 style="text-align:center">
            <a class="text-dark" href="cart.php">
                ADD TO CART
            </a>
        </h1>
    </div>
</div>
<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-20">
                <div class="row align-item-center">
                    <div class="col-md-1">
                        <h6>Id</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Product</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Product Name</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Price</h6>
                    </div>
                    <div class="col-md-1">
                        <h6>Quantity</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Total</h6>
                    </div>
                    <div class="col-md-1">
                        <h6>Remove</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="">

        </div>
</div>
<form action="cart.php" method="post">
<div class="py-3">
    <div class="container">
    <?php
    while($row1=mysqli_fetch_assoc($result))
    {?>
        <div class="row">
            <div class="col-md-12">
                <div class="row align-item-center">
                 <div class="col-md-1">
                        <h6><?php echo $row1['cartid'] ?></h6>
                    </div>
                    <div class="col-md-2">
                        <h6><img src="./media/product/<?php echo $row1['image']?>" height="100px" width="100px"></h6>
                    </div>
                    <div class="col-md-2">
                        <h6><?php echo $row1['name'] ?></h6>
                    </div>
                    <div class="col-md-2">
                        <h6><?php echo $row1['price'] ?></h6>
                    </div>
                    <div class="col-md-1">
                        <h6><?php echo $row1['qty'] ?></h6>
                    </div>
                    <div class="col-md-2">
                        <h6><?php echo $row1['qty']*$row1['price'] ?></h6>
                        <?php $finaltotal+=($row1['qty']*$row1['price']) ?>
                    </div>
                    <div class="col-md-1">
                        <a href="cart.php?cid=<?php echo $row1['cartid']?>"> <button type="button" name="delete" class="btn btn-danger">Delete</button></a>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
    <hr>    
    <div class="row total">
    <p><pre>Total  :      <?php echo $finaltotal?></pre></p>
    </div>
    <div class="row">
    <button type="button"><a href="checkout.php?total=<?php echo $finaltotal ?>"><h1>Checkout</h1></a></button>
    </div>
    </div>
</div>
</form>



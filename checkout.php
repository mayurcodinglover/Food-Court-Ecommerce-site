<?php
include('includes/header.php');
include('includes/navbar.php');
include('connect.php');

session_start();
setcookie("total",$_GET['total'],time()+7200,"/");
$total= $_COOKIE['total'];
        if(isset($_GET['total']))
        {
            $total=$_GET['total'];
            $uid= $_SESSION['uid'];
            $sql2="select c.cartid,image,p.name,price,c.qty from product p inner join cart c on p.id=c.pid inner join users u on c.uid=u.user_id where c.uid=".$uid."";
            $result=mysqli_query($con,$sql2);
        }
        if(isset($_POST['submit']))
        {
            
            $total=$_GET['total'];
            $uid= $_SESSION['uid'];
            $sql2="select ct.address,ct.id as ctid, u.name as uname,u.phone,c.cartid,image,p.name,price,c.qty from product p inner join cart c on p.id=c.pid inner join users u on c.uid=u.user_id inner join checkout ct on ct.uid=c.uid where c.uid=".$uid."";
            $result=mysqli_query($con,$sql2);
            

            //insert
            $name=$_POST['fullname'];
            $address=$_POST['address'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $zipcode=$_POST['zipcode'];
            $country=$_POST['country'];
            $phoneno=$_POST['phonenumber'];
            $uid=$_SESSION['uid'];
            $sql="insert into checkout (fullname,address,city,state,zipcode,country,phone,uid) values('$name','$address','$city','$state','$zipcode','$country',$phoneno,$uid)";
            $res=mysqli_query($con,$sql);
            echo "chekout inserted";


            $sql="select DISTINCT ct.address,ct.id as ctid, u.name as uname,u.phone from users u inner join cart c on c.uid=u.user_id inner join checkout ct on ct.uid=c.uid where c.uid=$uid order BY ct.id DESC LIMIT 1";
            $result1=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result1))
            {
                echo "inside loop";
                $currentDate = date("Y-m-d")."<br>";
                echo $currentDate."<br>";
                $uname=$row['uname'];
                echo $uname."<br>";
                $add=$row['address'];
                echo $add."<br>";
                $contact=$row['phone'];
                echo $contact."<br>";
                $chkid=$row['ctid'];
                echo $chkid."<br>";
                $total= $_COOKIE['total'];
                echo $total;
                $uid= $_SESSION['uid'];
                echo $uid;


                $sql="insert into admin_cart_manage (username,orderdate,orderstatus,Total,delivery_add,contactno,uid,chk_id) values('$uname','$currentDate','pending',$total,'$add',$contact,$uid,$chkid)";
                $res=mysqli_query($con,$sql);
                echo "inserted in admin_cart_manage";
                if (!$res) {
                    echo "Error: " . mysqli_error($con);
                } else {
                    echo "Inserted in admin_cart_manage";
                }
                
            }
            $hidden_value = "checkout";
            $encoded_hidden_value = urlencode($hidden_value);
            header("location:Bill.php?hidden_field=$encoded_hidden_value&total=$total");
            exit();
        }
        
?>
    <h1>Checkout Page</h1>
    <div class="form-container">
    <form action="checkout.php" method="post">
        <h2>Shipping Information</h2>
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required><br><br>

        <label for="address" style="display: block;">Street Address:</label>
        <textarea name="address" id="" cols="50" rows="5"></textarea><br><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br><br>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br><br>

        <label for="zipcode">ZIP Code:</label>
        <input type="text" id="zipcode" name="zipcode" required><br><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required><br><br>

        <label for="phonenumber">Phone Number:</label>
        <input type="tel" id="phonenumber" name="phonenumber" required><br><br>

        <h2>Order Summary</h2>
        <p>List of Items:</p>
        <ul>
            <!-- Add your list of items here -->
            <?php
            while($row=mysqli_fetch_assoc($result))
            {?>
                <li><?php echo $row['name'] ?></li>
            <?php
            }
            ?>
        </ul>
        <p>Total Amount: <?php echo $total ?></p> <!-- Replace with the actual total amount -->

        <button type="submit" value="Checkout" name="submit">Checkout</button>
    </form>
    </div>


    <?php 
    include"./includes/footer.php";
    ?>

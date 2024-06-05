<?php
include("./includes/connection.php");
include("./includes/header.php");
include("./includes/functions.php");
// session_start();
echo "hello"."<br>";
echo $_POST['orderid'];
echo $_POST['order'];
if(isset($_POST['orderid']))
{
    $oid=$_POST['orderid'];
    $status=$_POST['order'];
    $sql="update admin_cart_manage set orderstatus='$status' where orderid=$oid";
    $res=mysqli_query($conn,$sql);
    echo "status updated";
}
?>
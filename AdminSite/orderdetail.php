<?php
include("./includes/connection.php");
include("./includes/header.php");
include("./includes/functions.php");
session_start();

if(isset($_POST['orderid']))
{
    $oid=$_POST['orderid'];
    $status=$_POST['order'];
    $sql="update admin_cart_manage set orderstatus='$status' where orderid=$oid";
    $res=mysqli_query($conn,$sql);
    
}
if(isset($_POST['cancel']))
{
    $oid=$_POST['orderid'];
    $sql="update admin_cart_manage set orderstatus='cancel' where orderid=$oid";
    $res=mysqli_query($conn,$sql);
    
}
$sql="select DISTINCT a.orderid,a.orderdate,a.orderstatus, ct.address, u.name as uname,u.phone,image,p.name,price,c.qty from product p inner join cart c on p.id=c.pid inner join users u on c.uid=u.user_id inner join checkout ct on ct.uid=c.uid inner join admin_cart_manage a on a.chk_id=ct.id";
$res=mysqli_query($conn,$sql);

?>

<div class="card " id="title">
    <div class="card-body">
      <h4 class="box-title bt">Orders</h4> 
    </div>
</div>
    <div id="body-sec">
        
    <table class="table" id="table-style" style="text-align:center;">
  <thead>
    <tr>
      <th scope="col" class="serial">#</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Address</th>
      <th scope="col">Uname</th>
      <th scope="col">MoNo</th>
      <th scope="col">Image</th>
      <th scope="col">PName</th>
      <th scope="col">QTY</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
      $i=1; 
      while($row=mysqli_fetch_assoc($res))
    {?>
      <td scope="col" class="serial"><?php echo $row['orderid']?></td>
      <td scope="col"><?php echo $row['orderdate']?></td>
      <td scope="col">
    <form action="orderdetail.php" method="post">
    <input type="hidden" name="orderid" value="<?php echo $row['orderid']; ?>">
    <select name="order">
      <?php if ($row['orderstatus'] == 'pending'): ?>
        <option value="pending" selected>pending</option>
        <option value="process">process</option>
        <option value="delivered">delivered</option>
      <?php elseif ($row['orderstatus'] == 'process'): ?>
        <option value="process" selected>process</option>
        <option value="delivered">delivered</option>
      <?php elseif ($row['orderstatus'] == 'delivered'): ?>
        <option value="delivered" selected>delivered</option>
        <?php else: ?>
        <option value="cancel">Canceled</option>
        
      <?php endif; ?>
    </select>
      
      </td>
      
      <!-- <td scope="col"><?php echo $row['orderstatus']?></td> -->
      <td scope="col"><?php echo $row['address']?></td>
      <td scope="col"><?php echo $row['uname']?></td>
      <td scope="col"><?php echo $row['phone']?></td>
      <td scope="col"><img src="./media/product/<?php echo $row['image'];?>" height="100px" width="100px" alt=""></td>
      <td scope="col"><?php echo $row['name']?></td>
      <td scope="col"><?php echo $row['qty']?></td>
      <td scope="col">
      <button type="submit" class="btn btn-primary">Update</button>
      <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
      </form>
       
      </td>
    </tr>
    <?php 
    $i++;
  }?>
    </tr>
    
    
  </tbody>
</table>
    </div>
<?php
    while($row=mysqli_fetch_assoc($res))
    {
        echo $row['orderid'];
        echo $row['orderdate'];
        echo $row['orderstatus'];echo $row['address'];echo $row['uname'];echo $row['phone'];echo $row['image'];echo $row['name'];echo $row['qty'];
        echo "<br><br><br><br>";
    }
?>
<?php
include("./includes/footer.php");
?>
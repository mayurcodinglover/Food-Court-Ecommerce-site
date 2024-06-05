<?php
include("./includes/connection.php");
include("./includes/header.php");
include("./includes/functions.php");

if(isset($_GET['type']) && $_GET['type']!=' ')
{
  $type=get_safe_value($conn,$_GET['type']);
 
  if($type=='delete')
  {
    
    $id=get_safe_value($conn,$_GET['id']); 
    $delete_sql="delete from users where id='$id'";
    mysqli_query($conn,$delete_sql);
  }
}

$sql="select *from users order by user_id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="card " id="title">
    <div class="card-body">
      <h4 class="box-title bt">users</h4> 
    </div>
</div>
    <div id="body-sec">
    <table class="table" id="table-style" style="text-align:center;">
  <thead>
    <tr>
      <th scope="col" class="serial">#</th>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Date</th>
      <th scope="col">Operation</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
      $i=1; 
      while($row=mysqli_fetch_assoc($result)){?>
      <td scope="col" class="serial"><?php echo $i?></td>
      <td scope="col"><?php echo $row['user_id']?></td>
      <td scope="col"><?php echo $row['name']?></td>
      <td scope="col"><?php echo $row['email']?></td>
      <td scope="col"><?php echo $row['phone']?></td>
      <td scope="col"><?php echo $row['added_on']?></td>
      <td scope="col">
        <?php
        echo "<button class='btn btn-danger'><a href='?type=delete&id=".$row['user_id']."'class='btn-change' >Delete</a></button>";
      ?>
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
include("./includes/footer.php");
?>
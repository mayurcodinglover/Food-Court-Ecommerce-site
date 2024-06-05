<?php
error_reporting(0);
include("./includes/connection.php");
include("./includes/header.php");
include("./includes/functions.php");
if(isset($_GET['type']) && $_GET['type']!=' ')
{
  $type=get_safe_value($conn,$_GET['type']);
  if($type=='status')
  {
    
    $operation=get_safe_value($conn,$_GET['operation']);
    $id=get_safe_value($conn,$_GET['id']);
    if($operation=='active')
    {
      $status=0;
    }
    else{
      $status= 1;
    }
    $update_status="update category set status='$status' where id='$id'";
    mysqli_query($conn,$update_status);
  }
  if($type=='delete')
  {
    
    $id=get_safe_value($conn,$_GET['id']); 
    $delete_sql="delete from category where id='$id'";
    mysqli_query($conn,$delete_sql);
  }
}

$sql="select *from category order by categories asc";
$result=mysqli_query($conn,$sql);

?>
<div class="card " id="title">
    <div class="card-body">
      <h4 class="box-title bt">Category</h4> 
      <h4 class="box-link"><a href="manage_categories.php">Add category</a></h4> 
    </div>
</div>
    <div id="body-sec">
    <table class="table" id="table-style" style="text-align:center;">
  <thead>
    <tr>
      <th scope="col" class="serial">#</th>
      <th scope="col">ID</th>
      <th scope="col">category</th>
      <th scope="col">image</th>
      <th scope="col">Status</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
      $i=1; 
      while($row=mysqli_fetch_assoc($result)){?>
      <td scope="col" class="serial"><?php echo $i?></td>
      <td scope="col"><?php echo $row['id']?></td>
      <td scope="col"><?php echo $row['categories']?></td>
      <td scope="col"><?php echo "<img height=100px width='100px' src=".'./images/'.$row['cat_image']." alt=''>"?></td>
      <td scope="col">
        <?php
        if($row['status']==0)
        {
          echo "<button class='btn btn-secondary'><a href='?type=status&operation=deactive&id=".$row['id']."' class='btn-change' >DeActive</a></button>";
        } 
        else{
          echo "<button class='btn btn-primary'><a href='?type=status&operation=active&id=".$row['id']."'class='btn-change' >Active</a></button>";
        }
        echo "&nbsp<button class='btn btn-danger'><a href='?type=delete&id=".$row['id']."'class='btn-change' >Delete</a></button>";
        echo "&nbsp<button class='btn btn-info'><a href='manage_categories.php?type=Edit&id=".$row['id']."&name=".$row['categories']."'class='btn-change' >Edit  </a></button>";
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
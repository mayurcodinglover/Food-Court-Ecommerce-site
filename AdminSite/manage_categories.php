<?php
include("./includes/connection.php");
include("./includes/header.php");
include("./includes/functions.php");


$cat='';
$msg='';

if($_GET["type"]=="Edit")
{
  
  if(isset($_GET['id']) && $_GET['id']!='')
  {
    $id=$_GET['id'];
    if(isset($_POST['submit'])=='')
    {
      $res1=mysqli_query($conn,"select *from category where id='$id'");
      $row=mysqli_fetch_assoc($res1);
      $cat=$row['categories'];      
      $image=$row['cat_image'];
      $msg='';
    }
    else{
      $category=$_POST['category'];
      $image=$_POST['image'];
      $res=mysqli_query($conn,"update category set categories='$category',cat_image='$image' where id='$id'");
      $msg="updated";
    }
  }
}
else
{
  if(isset($_POST['submit']))
  {
  $category=$_POST['category'];
  $image=$_POST['image'];
  
  $msg="$category";
  $msg= "$image";
  $res=mysqli_query($conn,"select *from category where categories='$category'");
  $count=mysqli_num_rows($res);
  if($count>0)
  {
    $msg= 'Category already exist :';
  }
  else{
    mysqli_query($conn,"insert into category (categories,status,cat_image) values('$category','1','$image')");
  }
  header('location:categories.php');
  die();
 
  }
  
}

?>
<div id="body-sec">
<div class="container mt-5 mc-container">
    <form method="post" >
      <h2>Categories</h2>
      <div class="mb-3">
        <label for="categoris" class="form-label">Categories</label>
        <input type="text" name="category" class="form-control" id="nameInput" placeholder="Enter Categoris name" required value='<?php echo $cat ?>'>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="imageInput" placeholder="Select image" required value='<?php echo $image ?>'>  
      </div>
      <button type="submit" class="btn btn-lg btn-info btn-block " name="submit">Add</button>
      <div class="feild_error"><?php echo $msg?></div>
    </form>
  </div>
</div>
<?php
include("./includes/footer.php");
?>
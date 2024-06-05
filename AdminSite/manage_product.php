<?php
include("./includes/connection.php");
include("./includes/header.php");
include("./includes/functions.php");
error_reporting(0);
//We are in Edit and show all data into a text box while clicking in edit button :
$categories_id = '';
$name = '';
$mrp = '';
$price = '';
$qty = '';
$image = '';
$short_desc = '';
$description = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';
$msg = '';

if ($_GET["type"] == "Edit") {

  if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    if (isset($_POST['submit']) == '') {
      $res1 = mysqli_query($conn, "select *from product where id='$id'");
      $row = mysqli_fetch_assoc($res1);
      $categories_id = $row['categories_id'];
      $name = $row['name'];
      $mrp = $row['mrp'];
      $price = $row['price'];
      $qty = $row['qty'];
      $image = $row['image'];
      $short_desc = $row['short_desc'];
      $description = $row['description'];
      $meta_title = $row['meta_title'];
      $meta_desc = $row['meta_desc'];
      $meta_keyword = $row['meta_keyword'];
      $msg = '';
    } else {

      $categories_id = get_safe_value($conn, $_POST['categories_id']);
      $name = get_safe_value($conn, $_POST['name']);
      $mrp = get_safe_value($conn, $_POST['mrp']);
      $price = get_safe_value($conn, $_POST['price']);
      $qty = get_safe_value($conn, $_POST['qty']);
      $image = get_safe_value($conn, $_POST['image']);
      $short_desc = get_safe_value($conn, $_POST['short_desc']);
      $description = get_safe_value($conn, $_POST['description']);
      $meta_title = get_safe_value($conn, $_POST['meta_title']);
      $meta_desc = get_safe_value($conn, $_POST['meta_desc']);
      $meta_keyword = get_safe_value($conn, $_POST['meta_keyword']);
      if ($_FILES['image']['name'] != '') {
        
        
        if ($_FILES['image']['type'] != '' && $_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg') {
         
          $msg = "Please upload jpg,png and jpeg image format";
        } else {
          if ($msg == '') {
            $image = rand(1111111111, 9999999999) . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], '../media/product/' . $image);
            echo $_FILES['image']['type'];
  
            $res = mysqli_query($conn, "update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',image='$image',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'");
          } else {
            echo "There is no image selected ";
            $res = mysqli_query($conn, "update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'");
          }
          $msg = "updated";
          header('location:product.php');
  
        }
      }
    }
  }
} else {
  if (isset($_POST['submit'])) {

    $categories_id = get_safe_value($conn, $_POST['categories_id']);
    $name = get_safe_value($conn, $_POST['name']);
    $mrp = get_safe_value($conn, $_POST['mrp']);
    $price = get_safe_value($conn, $_POST['price']);
    $qty = get_safe_value($conn, $_POST['qty']);
    $image = get_safe_value($conn, $_POST['image']);
    $short_desc = get_safe_value($conn, $_POST['short_desc']);
    $description = get_safe_value($conn, $_POST['description']);
    $meta_title = get_safe_value($conn, $_POST['meta_title']);
    $meta_desc = get_safe_value($conn, $_POST['meta_desc']);
    $meta_keyword = get_safe_value($conn, $_POST['meta_keyword']);
    $res = mysqli_query($conn, "select *from product where name='$name'");
    $count = mysqli_num_rows($res);
    if ($count > 0) {
      $msg = 'product already exist :';
    } else {
      $image = rand(1111111111, 9999999999) . '_' . $_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'], '../media/product/' . $image);
      if ($_FILES['image']['type'] != '' && ($_FILES['image']['type'] != 'image/png' || $_FILES['image']['type'] != 'image/jpg' || $_FILES['image']['type'] != 'image/jpeg')) {
        $msg = "Please upload jpg,png and jpeg image format";
      }
      mysqli_query($conn, "insert into product (categories_id,name,mrp,price,qty,image,short_desc,description,meta_title,meta_desc,meta_keyword,status) values('$categories_id','$name','$mrp','$price','$qty','$image','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1)");
    }
    header('location:product.php');
    die();
  }
}

?>
<div id="body-sec">
  <div class="container mt-5 mc-container">
    <form method="post" enctype="multipart/form-data">
      <h2>Product</h2>
      <div class="mb-3">
        <label for="categoris" class="form-label">Categories</label>
        <select name="categories_id" id="" class="form-control">
          <option>Select Category</option>
          <?php
          $res = mysqli_query($conn, 'select id,categories from category order by categories asc');
          while ($row = mysqli_fetch_assoc($res)) {
            if ($row['id'] == $categories_id) {
              echo "<option selected value=" . $row['id'] . ">" . $row['categories'] . "</option>";
            } else {
              echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
            }
          }
          ?>

        </select>

      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" id="imageInput" placeholder="Enter Product name" required value="<?php echo $name ?>">
      </div>
      <div class="mb-3">
        <label for="mrp" class="form-label">MRP</label>
        <input type="text" name="mrp" class="form-control" id="imageInput" placeholder="Enter Product mrp" required value="<?php echo $mrp ?>">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" name="price" class="form-control" id="imageInput" placeholder="Enter Product price" required value="<?php echo $price ?>">
      </div>
      <div class="mb-3">
        <label for="qty" class="form-label">QTY</label>
        <input type="text" name="qty" class="form-control" id="imageInput" placeholder="Enter Product Quntity" required value="<?php echo $qty ?>">
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="imageInput" placeholder="Select image" value="<?php echo $image ?>">
      </div>
      <div class="mb-3">
        <label for="sdesc" class="form-label">Short Description</label>
        <input type="text" name="short_desc" class="form-control" id="imageInput" placeholder="Enter Short DESC" required value="<?php echo $short_desc ?>">
      </div>
      <div class="mb-3">
        <label for="ldesc" class="form-label">Long Description</label>
        <input type="text" name="description" class="form-control" id="imageInput" placeholder="Enter Long Desc" required value="<?php echo $description ?>">
      </div>
      <div class="mb-3">
        <label for="mtitle" class="form-label">meta title</label>
        <input type="text" name="meta_title" class="form-control" id="imageInput" placeholder="Enter Meta title" required value="<?php echo $meta_title ?>">
      </div>
      <div class="mb-3">
        <label for="mdesc" class="form-label">meta Description</label>
        <input type="text" name="meta_desc" class="form-control" id="imageInput" placeholder="Enter Meta Description" required value="<?php echo $meta_desc ?>">
      </div>
      <div class="mb-3">
        <label for="mkword" class="form-label">meta Keyword</label>
        <input type="text" name="meta_keyword" class="form-control" id="imageInput" placeholder="Enter Meta Keyword" required value="<?php echo $meta_keyword ?>">
      </div>

      <button type="submit" class="btn btn-lg btn-info btn-block " name="submit">Add</button>
      <div class="feild_error"><?php echo $msg ?></div>
    </form>
  </div>
</div>
<?php
include("./includes/footer.php");
?>
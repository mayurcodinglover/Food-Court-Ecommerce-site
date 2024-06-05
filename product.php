<?php
include('functions.php');
include("includes/header.php");
include("includes/navbar.php");
if (isset($_GET['category'])) {
    $cat_url = $_GET['category'];
    $category_data = getCategoryActive("category",$cat_url);

    $category = mysqli_fetch_array($category_data);
    if($category){
        $cat_id = $category['id'];
?>
<div class="py-3" style="background-color:#B6E2A1">
    <div class="container" style="background-color:#B6E2A1">
        <h6>
            <a class="text-dark" href="index.php">
                Home /
            </a>
            <?=ucfirst($category['categories']);?>
        </h6>
    </div>
</div>
<div class="container py-3">
    <div class="row">
        <div class="col-md-12">
            <h4 class="fw-bold">Select your Choices</h4>
            <hr>
        </div>
        <div class="row">
            <?php
              $prod = getProductsByCategory($cat_id);
              if(mysqli_num_rows($prod)>0){
                foreach($prod as $item)
                {
            ?>
            <div class="col-md-3 mb-2">
                <div class="card">
                    <div class="card-body">
                        <img src="media/product/<?=$item['image']?>" alt="" class="image-resize w-100" height="200px">
                        <h4 class="fw-bold mx-2"><?=$item['name']?></h4>
                        <p class="mx-2"><?=$item['short_desc']?> <span class="float-end fw-bold">Rs:<?=$item['price']?></span></p>
                        <div class="d-grid gap-2 mb-2">
                            <a href="View-Details.php?product=<?=$item['name']?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
}
else
{
    echo "Something went wrong.";
}
}
else
{
    echo "Something went wrong.";
}
?>
<?php
include("includes/header.php");
include("includes/navbar.php");
include("connect.php");
$fetch_category = "select * from category where status = '1'";
$fetch_category_run = mysqli_query($con,$fetch_category);
?>
<div class="py-3" style="background-color:#B6E2A1">
    <div class="container"style="background-color:#B6E2A1">
        <h6>
            <a class="text-dark" href="index.php">
                Home /
            </a>
            Collections
        </h6>
    </div>
</div>
<div class="container py-3">
    <div class="row">
        <div class="col-md-12">
            <h4 class="fw-bold">whats on your mind?</h4>
            <hr>
        </div>
        <div class="row">
            <?php
          if(mysqli_num_rows($fetch_category_run) > 0){
            foreach($fetch_category_run as $items){
        ?>
            <div class="col-md-3 mb-2">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="AdminSite/images/<?=$items["cat_image"]?>" alt="" class="w-100 image-resize">
                        <h4 class="text-center"><a href="product.php?category=<?=$items['categories']?>"
                                class="text-dark"><?=$items['categories']?></a></h4>
                    </div>
                </div>
            </div>
            <?php
          }
        }else
        {
            ?>
            <div class="card card-body shadow text-center">
                <h4 class="py-3">No Data Available.</h4>
            </div>
            <?php
        }
        ?>
        </div>

    </div>
</div>
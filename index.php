<?php
include('functions.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/carousal.php');
include('connect.php');
$fetch_category = "select * from category where status = '1' limit 4";
$fetch_category_run = mysqli_query($con,$fetch_category);
?>
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="heading">New Dishes</h4>
                <div class="underline mb-2"></div>
                <div class="row">

                    <?php
                    
                        $latestProduct = getLatestProducts();
                        if(mysqli_num_rows($latestProduct) > 0){
                            foreach($latestProduct as $product){
                    ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="media/product/<?=$product['image']?>" class="card-img-top w-100 image-resize"
                                height="200px" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?=$product['name']?></h5>
                                <p class="card-text"><?=substr($product['description'],0,90)."..."?></p>
                                <small><a href="View-Details.php?product=<?=$product['name']?>">view more</a></small>
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
    </div>
</div>
</div>
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="heading">What you want to eat?</h4>
                <div class="underline mb-2"></div>
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
        }
        ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>
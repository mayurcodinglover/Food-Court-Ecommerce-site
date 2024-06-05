<?php
include("functions.php");
include("includes/header.php");
include("includes/navbar.php");
if(isset($_GET['product'])){
    $product_url = $_GET['product'];
    $product_data = getProductActive("product",$product_url);
    
    $product = mysqli_fetch_array($product_data);
    if($product)
{
?>
<div class="py-3" style="background-color:#B6E2A1">
    <div class="container" style="background-color:#B6E2A1">
        <h6>
            <a class="text-dark" href="index.php">
                Home /
            </a>
            <?=ucfirst($product['name']);?>
        </h6>
    </div>
</div>
<div class="bg-light py-5">
    <div class="container my-5 ">
        <div class="row">
            <div class="col-md-4">
                <div class="shadow">
                    <img src="media/product/<?=$product['image'];?>" alt="Product Image" class="w-100" height="400px">
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="fw-bold"><?=ucfirst($product['name']);?></h4>
                <hr>
                <p><?=$product['short_desc'];?></p>
                <div class="row">
                    <div class="col-md-4">
                        <h4>Rs <span class="text-success fw-bold"><?=$product['price']?></span></h4>
                    </div>
                </div>
                <form action="cart.php" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group mb-1">
                            <input type="number" id="qty" class="form-control text-center input-qty bg-white" min="1"
                                max="20" value="1" name="qty1">                                 
                        </div> 
                    </div>
                </div>
                <?php $_SESSION['product_name']=$product['name'] ?>
                <div class="row mt-3">
                    <div class="col-md-6">
                        
                        <button class="btn btn-primary px-4" name="submit"><i
                                class="fa fa-shopping-cart me-2"></i>Add to
                            cart</button>
                    </div>
                </div>
                </form>
                
                <hr>

                <h6>Product Description</h6>
                <p><?=$product['description'];?></p>
            </div>
        </div>
    </div>
</div>

<?php
}
else
{
    echo 'Product Not Found';
}
}
else
{
echo "Something went wrong.";
}
?>
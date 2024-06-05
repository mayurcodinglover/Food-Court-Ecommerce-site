<?php
include 'connect.php';
session_start();
$uid = $_SESSION['uid'];
$total= $_GET['total'];

if (isset($_GET['hidden_field'])) {
    $sql1 = "select c.*,u.email from checkout c inner join users u on c.uid=u.user_id where c.uid=$uid";
    $res1 = mysqli_query($con, $sql1);
    $sql2 = "select c.uid ,c.pid,p.* from cart c inner join product p on c.pid=p.id where c.uid=$uid";
    $res2 = mysqli_query($con, $sql2);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Court</title>

    <!-- Bootstrap CSS CDN Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fontawesome CDN Link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="partials/css/style1.css">
    <link rel="stylesheet" type="text/css" href="print.css" media="print">

</head>

<body>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="text-white fs-4">Bill Receipt</span>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mt-3 ml-1">
                                    <h4 class="ms-1">Delievery Details</h4>
                                    <hr>
                                    <div class="row">
                                        <?php
                                            $row=mysqli_fetch_assoc($res1);
                                        ?>
                                        <div class="col-md-12 mb-2 ms-1">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                            <?php echo $row['fullname']?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2 ms-1">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                            <?php echo $row['email']?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2 ms-1">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1">
                                            <?php echo $row['phone']?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2 ms-1">
                                            <label class="fw-bold">Tracking No</label>
                                            <div class="border p-1">
                                            <?php echo $row['id']?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2 ms-1">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                            <?php echo $row['address']?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2 ms-1">
                                            <label class="fw-bold">Pincode</label>
                                            <div class="border p-1">
                                            <?php echo $row['zipcode']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6  mt-3 ml-5">
                                    <h4>Order Details</h4>
                                    <hr>
                                    <table class="table border-dark">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($row=mysqli_fetch_assoc($res2))
                                            {?>
                                            <tr>
                                                <td class="align-middle"><img src="./media/product/<?php echo $row['image']?>" width="50px" height="50px" alt="">
                                                </td>

                                                <td class="align-middle"><?php echo $row['price']?></td>
                                                <td class="align-middle"><?php echo $row['qty']?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            

                                        </tbody>
                                    </table>
                                    <hr>
                                    <h5>Total Price <span class="float-end fw-bold"><?php echo $total ?></span>
                                    </h5>
                                    <hr>
                                    <label class="fw-bold">Payment Mode</label>
                                    <div class="border p-1 mb-3">
                                    COD
                                    </div>
                                    <label class="fw-bold">Status</label>
                                    <div class="border p-1 mb-3">
                                    Pending
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center py-2">
            <button class="btn btn-primary" onclick="window.print();" id="print-btn"><i class="fa fa-print m-1"></i>Download</button>
        </div>


        <!-- Bootstrap JS CDN LINK-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
</body>

</html>
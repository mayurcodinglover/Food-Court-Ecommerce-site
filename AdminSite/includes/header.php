<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="partials/css/style.css">
</head>
<body>
        <header>
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="./categories.php">Categories Master</a>
            <a href="./product.php">Product Master</a>
            <a href="./orderdetail.php">Order Master</a>
            <a href="./users.php">User Master</a>
            <a href="./contact us.php">Contact Us</a>
        </div>
        <div id="main">
            <button class="openbtn" onclick="openNav()" id="openbtn1">☰</button>  
        </div>
        <div>
            <a href="./login.php"><button class="btn btn-primary btn-submit" >logout</button></a>
        </div>
    </header>
   
<?php
session_start();
include('connect.php');

function getLatestProducts(){
 global $con;
 $query = "Select * from product where status = '1' order by id  limit 4";
 return $query_run = mysqli_query($con,$query);
}


function getCategoryActive($table,$categories){
    global $con;
    $query = "SELECT * FROM $table WHERE categories = '$categories' AND status = '1' LIMIT 1";
    return $query_run = mysqli_query($con,$query);
}

function getProductsByCategory($cat_id){
    global $con;
    $query = "SELECT * FROM product where categories_id = '$cat_id' AND status = '1' order by id";
    return $query_run = mysqli_query($con,$query);
}

function getProductActive($table,$name){
    global $con;
    $query = "SELECT * FROM $table WHERE name = '$name' AND status = '1' LIMIT 1";
    return $query_run = mysqli_query($con,$query);
}

?>
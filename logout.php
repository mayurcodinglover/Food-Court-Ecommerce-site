<?php
session_start();
$_SESSION['message'] = "Logged Out Successfully";
session_destroy();
header('location: index.php');

?>
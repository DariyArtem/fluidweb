<?php
session_start();

$id = $_SESSION['user']['id'];

$par1 = "127.0.0.1";
$par2 = "root";
$par3 = "root";
$par4 = "fluidweb";
$induction = mysqli_connect($par1, $par2, $par3, $par4);
if ($induction === false){
    die('Unable to connect with the database');
}

?>

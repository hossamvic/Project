<?php 
session_start();
$errors = [] ;
if($_SERVER['REQUEST_METHOD'] == "GET") {


if(!isset($_GET['id']) or !is_numeric($_GET['id']))
{ 
    $errors [] = " Wrong request "; 
}

$id = $_GET['id'] ;
if(!isset($_SESSION['cart'])){
   $_SESSION['cart'] = [] ;
}
 $_SESSION['cart'][] = $id;

header('location:men.php') ;
die ; 


}
?>
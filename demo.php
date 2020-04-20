<?php
/**
 * Created by PhpStorm.
 * User: Rishabh
 * Date: 20-Apr-20
 * Time: 4:30 PM
 */

    $dbuser="root";
    $dbhost="localhost";
    $dbpass="";
    $dbname="chocostreets";
    $connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if (!isset($connection)){
          echo "Some Error occoured. Please Contact Administrators";
          die();
    }

    if(!isset($_POST['submit'])){
        header("Location: index.html");
    }

    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $mobile = mysqli_real_escape_string($connection,$_POST['phone']);
    $items  = mysqli_real_escape_string($connection,$_POST['items']);
    $quantity  = mysqli_real_escape_string($connection,$_POST['quantity']);
    $address = mysqli_real_escape_string($connection,$_POST['address']);
    $city = mysqli_real_escape_string($connection,$_POST['city']);
    $pinCode = mysqli_real_escape_string($connection,$_POST['pincode']);
    $comments = mysqli_real_escape_string($connection,$_POST['comments']);


    $query="INSERT INTO orders (name,email,mobile,items,quantity,city,address,pincode,comments) ";
    $query.=" VALUES(?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sssssssss",$name,$email,$mobile,$items,$quantity,$city,$address,$pinCode,$comments);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
    <h1 class="jumbotron text-center"> Your Order has been successfully placed.</h1>
    </body>
</html>
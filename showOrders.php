<?php

if(!isset($_GET['pass'])){
    header("Location: index.html");
}
if ($_GET['pass'] != 'baadme'){
    header("Location: index.html");
}

$dbuser="root";
$dbhost="localhost";
$dbpass="";
$dbname="chocostreets";
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (!isset($connection)){
    echo "Some Error occoured. Please Contact Administrators";
    die();
}
$res = mysqli_query($connection,"SELECT * FROM orders ORDER BY id DESC ");

?>

<!Doctype html>
<html>
    <head>
        <title>
            Order Listing
        </title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h2 class="jumbotron text-center">Orders Placed</h2>
        <table class="table table-bordered">
            <thead>
            <th>Name of Customer</th>
            <th>Phone Number</th>
            <th>Email ID</th>
            <th>City</th>
            <th>Address</th>
            <th>PIN Code</th>
            <th>Item Ordered</th>
            <th>Quantity</th>
            <th>Additional Comments</th>
            </thead>
            <tbody>

            <?php
                while($row = mysqli_fetch_assoc($res)){
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['mobile']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['city']."</td>";
                    echo "<td>".$row['address']."</td>";
                    echo "<td>".$row['pincode']."</td>";
                    echo "<td>".$row['items']."</td>";
                    echo "<td>".$row['quantity']."</td>";
                    echo "<td>".$row['comments']."</td>";
                    echo "</tr>";
                }

            ?>
            </tbody>
        </table>
    </body>
</html>

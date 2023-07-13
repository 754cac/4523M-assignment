<?php
date_default_timezone_set('Asia/Hong_Kong');
$orderID = $_GET['orderID'];
$today = date('Y-m-d');
 
require_once("mysqli_conn.php");
$sql = "SELECT deliveryDate FROM orders ";
$sql .= " WHERE  orderID = $orderID ";
$result = mysqli_query($conn, $sql);
$rc=mysqli_fetch_assoc($result);
$deliveryDate=$rc['deliveryDate'];

if (strtotime($deliveryDate) > strtotime($today . '+2 days'))
 {
    require_once("mysqli_conn.php");
    $sql = "DELETE FROM ordersitem ";
    $sql .= " WHERE  orderID = $orderID ";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM orders ";
    $sql .= " WHERE  orderID = $orderID ";
    mysqli_query($conn, $sql);
    header("Location: delete_order.php");
} else {
    echo '<h1 style="color: red;">This order cannot be deleted as it is within the two-day limit before the delivery date.</h1>';
    echo '<a href="delete_order.php"><button style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">Delete Order record</button></a>';
}
?>
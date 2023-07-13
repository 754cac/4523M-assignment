<?php
session_start();
$prefix = "quantity-";
$Qty = array();
$itemID = array();
require_once("mysqli_conn.php");

$i = 0;
$sql = "SELECT itemID FROM item WHERE stockItemQty>0 ORDER BY itemID ASC";
$result = mysqli_query($conn, $sql);
while ($rs = mysqli_fetch_assoc($result)) {
    $rc1 = $prefix . "$rs[itemID]";
    if ($_GET[$rc1] != 0) {
        $Qty[$i] = $_GET[$rc1];
        $itemID[$i] = $rs['itemID'];
        $i++;
    }
}
if (empty($Qty)) {
    header("Location: make_order.php");
    exit();
}
$pID = $_SESSION['account'];
$dAdss = $_SESSION['address'];
$dDate = $_GET['date'];
$sql = "INSERT INTO orders(purchaseManagerID, deliveryAddress, deliveryDate) VALUE('$pID','$dAdss','$dDate')";
$result = mysqli_query($conn, $sql);


$sql = "SELECT MAX(orderID) AS maxID FROM orders";
$result = mysqli_query($conn, $sql);
$rs = mysqli_fetch_assoc($result);
$orderID = $rs['maxID'];


for ($i = 0; $i < count($Qty); $i++) {
    $sql = "SELECT price  FROM item WHERE itemID = " . $itemID[$i];
    $result = mysqli_query($conn, $sql);
    $rs = mysqli_fetch_assoc($result);
    $price = $rs['price'];
    $sql = "INSERT INTO ordersitem VALUE('$orderID','$itemID[$i]','$Qty[$i]','$price')";
    $result = mysqli_query($conn, $sql);
    $sql = "SELECT stockItemQty FROM item WHERE itemID='$itemID[$i]'";
    $result = mysqli_query($conn, $sql);
    $rs = mysqli_fetch_assoc($result);
    $stockCnt = $rs['stockItemQty'];
    $stockCnt -= $Qty[$i];
    $sql = "UPDATE item SET stockItemQty =$stockCnt WHERE itemID='$itemID[$i]'";
    $result = mysqli_query($conn, $sql);
}
header("Location: make_order.php");
?>
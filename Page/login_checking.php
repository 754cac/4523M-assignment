<?php
session_start();
require_once("mysqli_conn.php");

$sql = "SELECT * FROM purchasemanager WHERE purchaseManagerID = \"{$_POST['acount']}\" AND password= \"{$_POST['passwords']}\"";
$result = mysqli_query($conn, $sql);
$rc = mysqli_fetch_assoc($result);
if ($rc != null && $_POST['passwords'] == $rc['password']) {
    $_SESSION['status'] = "loggedin";
    $_SESSION['account'] = $_POST['acount'];
    $_SESSION['address'] = $rc['warehouseAddress'];
    header("Location: make_order.php");
} else {
    header("Location: login.php");
}
?>
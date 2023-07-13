<?php
session_start();
$acount = $_SESSION['account'];
if ($_SESSION['status'] != "loggedin") {
    header("Location: login.php");
}
$result = "";
require_once("mysqli_conn.php");
if ($_POST['npwd'] != null) {
    $sql = "UPDATE  purchasemanager 
    SET password = '{$_POST['npwd']}' 
    WHERE purchaseManagerID = '$acount';";
    mysqli_query($conn, $sql);
    $result .= "Password updated\n";
}
if ($_POST['cont'] != null) {
    $sql = "UPDATE  purchasemanager 
    SET contactNumber = '{$_POST['cont']}' 
    WHERE purchaseManagerID = '$acount'; ";
    mysqli_query($conn, $sql);
    $result .= "Contact Number updated\n";
}
if ($_POST['wareAdds'] != null) {
    $sql = "UPDATE  purchasemanager 
    SET warehouseAddress = '{$_POST['wareAdds']}' 
    WHERE purchaseManagerID = '$acount';";
    mysqli_query($conn, $sql);
    $result .= "Warehouse Address updated\n";
}
$_SESSION['updateResult'] = $result;
header("Location: update_acount.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <style>
    header {
        background-color: #555555;
        color: #8B4513;
    }

    a {
        color: #00ff00;
        text-decoration: none;
        font-weight: bold;
    }

    a.active {
        background-color: purple;
        color: white;
    }

    footer {
        background-color: grey;
        position: relative;
    }
    </style>
</head>
<header>
    <table border="10px" width="100%" margin="0px 0px 0px 0px">
        <tr>
            <td><img src="/Assignment/images/final2.jpg" alt="icon" height="80px" /></td>
            <td><a href="make_order.php">Make order</a></td>
            <td><a href="view_order.php">View Order record</a></td>
            <td><a href="update_acount.php">Update purchase account</a></td>
            <td><a class="active" href="delete_order.php">Delete Order record</a></td>
            <td>
                <form method="get">
                    <?php
                    if (isset($_GET['logout'])) {
                        session_start();
                        session_destroy();
                        header('Location: login.php');
                        exit();
                    }
                    ?>
                    <input type="submit" name="logout" value="logout">
                </form>
            </td>
        </tr>
    </table>
    <script>
    function setValue(orderID) {
        if (confirm("Do you want to delete!")) {
            document.getElementById("orderID").value = orderID;
            var form = document.getElementById("from");
            form.action = "deleting.php";
            form.submit();
        }
    }
    </script>
</header>

<body>
    <?php
    session_start();
    if ($_SESSION['status'] != "loggedin") {
        header("Location: login.php");
    }
    
    date_default_timezone_set('Asia/Hong_Kong');
    require_once("mysqli_conn.php");
    $sql = "SELECT orders.orderID,  orders.orderDateTime,
    orders.deliveryDate, item.itemID, item.itemName, ordersitem.orderQty
    FROM orders , item, ordersitem
    WHERE orders.orderID=ordersitem.orderID AND
    item.itemID=ordersitem.itemID ";
    $result = mysqli_query($conn, $sql);
    ?>

    <h2>Delete order records</h2>
    <form id="from" method="GET" action="deleting.php">
        <h2>Ordered Items:</h2>
        <table border='1'>
            <th>Action</th>
            <th>OrderID</th>
            <th>ItemID</th>
            <th>Item Name</th>
            <th>Order Quantity</th>
            <th>Order Date Time</th>
            <th>Order Delivery Date</th>


            <?php
            while ($item = mysqli_fetch_assoc($result)) {
                ?>
            <tr>
                <td><input type='button' value='Delete' onClick='setValue(<?php echo $item['orderID'] ?>)' /></td>
                <td>
                    <?php echo $item['orderID'] ?>
                </td>
                <td>
                    <?php echo $item['itemID'] ?>
                </td>
                <td>
                    <?php echo $item['itemName'] ?>
                </td>
                <td>
                    <?php echo $item['orderQty'] ?>
                </td>
                <td>
                    <?php echo $item['orderDateTime'] ?>
                </td>
                <td>
                    <?php echo $item['deliveryDate'] ?>
                </td>
            </tr>
            <?php } ?>

        </table>
        <input type="hidden" id="orderID" name="orderID" value="" />
    </form>
</body>
<hr>
<footer>
    &copy Yummy group limited
</footer </html>
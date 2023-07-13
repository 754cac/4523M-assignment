<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
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
            <td><a class="active" href="make_order.php">Make order</a></td>
            <td><a href="view_order.php">View Order record</a></td>
            <td><a href="update_acount.php">Update purchase account</a></td>
            <td><a href="delete_order.php">Delete Order record</a></td>
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
</header>

<body>
    <?php
    session_start();
    if ($_SESSION['status'] != "loggedin") {
        header("Location: login.php");
    }
    ?>
    <h2>View product information</h2>
    Select items (only show items when stock quantity is greater than zero)
    <form action="ordering.php" method="get">
        <table border="1">
            <tr>
                <th>Item ID</th>
                <th>Supplier ID</th>
                <th>Item Name</th>
                <th>Item Image</th>
                <th>Item Description</th>
                <th>Stock Item Quantity</th>
                <th>Price</th>
                <th>Ordering quantity</th>
            </tr>
            <?php
            $_SESSION['account'];
            require_once("mysqli_conn.php");
            $sql = "SELECT * FROM item WHERE stockItemQty>0 ORDER BY itemID ASC";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($rc = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>$rc[itemID]</td>
                            <td>$rc[supplierID]</td>
                            <td>$rc[itemName]</td>
                            <td><img src='/Assignment/images/$rc[ImageFile]' alt=\"$rc[itemName]\" height='80px'/></td>
                            <td>$rc[itemDescription]</td>
                            <td>$rc[stockItemQty]</td>
                            <td>$$rc[price]</td>
                            <td><input type='number' min='0' name='quantity-$rc[itemID]' value='0' max='$rc[stockItemQty]'></td>
                        </tr>";
                }
            }
            ?>
        </table>
        <input type="date" id="date" name="date" required>
        <input type="submit" value="Place order">
    </form>
</body>
<hr>
<footer>
    &copy Yummy group limited
</footer </html>
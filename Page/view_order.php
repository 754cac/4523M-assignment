<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
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
    <table border="10px" width="100%" margin="0px 0px 0px 0px" >
        <tr>
            <td><img src="/Assignment/images/final2.jpg" alt="icon" height="80px" /></td>
            <td><a href="make_order.php">Make order</a></td>
            <td><a class="active" href="view_order.php">View Order record</a></td>
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
    <script>
    function disableSelectedColumns(selectedDropdown, otherDropdown) {
        // Get the selected value of the selected dropdown
        var selectedDropdownElement = document.getElementById(selectedDropdown);
        var selectedValue = selectedDropdownElement.options[selectedDropdownElement.selectedIndex].value;

        // Disable the selected column in the other dropdown
        var otherDropdownElement = document.getElementById(otherDropdown);
        for (var i = 0; i < otherDropdownElement.options.length; i++) {
            if (otherDropdownElement.options[i].value === selectedValue) {
                otherDropdownElement.options[i].disabled = true;
                if (otherDropdownElement.options[i].selected) {
                    otherDropdownElement.value = '';
                }
            } else {
                otherDropdownElement.options[i].disabled = false;
            }
        }
    }
    // Disable the selected columns initially on page load
    disableSelectedColumns('col1', 'col2');
    disableSelectedColumns('col2', 'col1');
    </script>
</header>

<body>
    <?php
    session_start();
    if ($_SESSION['status'] != "loggedin") {
        header("Location: login.php");
    }
    ?>
    <h2>View order records</h2>
    <?php
    require_once("mysqli_conn.php");
    $_SESSION['account'];
    $orderlist = "SELECT DISTINCT(orderID) AS ordersss
        FROM orders;";
    $result = mysqli_query($conn, $orderlist);

    echo "<h2>Ordered Items:</h2>";
    ?>
    <form method="POST">

        <label for="col1">Order By:</label>
        <select name="col1" id="col1" onchange="disableSelectedColumns('col1', 'col2')">
            <option value="">Select Column</option>
            <option value="orders.orderID">OrderID</option>
            <option value="supplier.supplierID">SupplierID</option>
            <option value="supplier.companyName">Supplier Company Name</option>
            <option value="supplier.contactName">Supplier Contact Name</option>
            <option value="supplier.contactNumber">Supplier Contacts</option>
            <option value="item.itemID">ItemID</option>
            <option value="item.ImageFile">Image</option>
            <option value="item.itemName">Item Name</option>
            <option value="ordersitem.orderQty">Order Quantity</option>
            <option value="ordersitem.orderQty">Order Date Time</option>
            <option value="orders.deliveryAddress">Delivery Address</option>
            <option value="orders.deliveryDate">Order Delivery Date</option>
            <option value="totalOrderAmount">Total Order Amount</option>
        </select>

        <label for="order1">Sort by:</label>
        <select name="order1" id="order1">
            <option value="">Select Order</option>
            <option value="ASC">Ascending</option>
            <option value="DESC">Descending</option>
        </select>
        <br>
        <label for="col2">Order By:</label>
        <select name="col2" id="col2" onchange="disableSelectedColumns('col2', 'col1')">
            <option value="">Select Column</option>
            <option value="orders.orderID">OrderID</option>
            <option value="supplier.supplierID">SupplierID</option>
            <option value="supplier.companyName">Supplier Company Name</option>
            <option value="supplier.contactName">Supplier Contact Name</option>
            <option value="supplier.contactNumber">Supplier Contacts</option>
            <option value="item.itemID">ItemID</option>
            <option value="item.ImageFile">Image</option>
            <option value="item.itemName">Item Name</option>
            <option value="ordersitem.orderQty">Order Quantity</option>
            <option value="ordersitem.orderQty">Order Date Time</option>
            <option value="orders.deliveryAddress">Delivery Address</option>
            <option value="orders.deliveryDate">Order Delivery Date</option>
            <option value="totalOrderAmount">Total Order Amount</option>
        </select>

        <label for="order2">Sort by:</label>
        <select name="order2" id="order2">
            <option value="">Select Order</option>
            <option value="ASC">Ascending</option>
            <option value="DESC">Descending</option>
        </select>
        <br>
        <select name="group" id="group">
            <option value="">Selete Group BY</option>
            <option value="true">Group BY Supplier</option>
        </select>
        <br>
        <input type="submit" name="updateTable" id="updateTable" value="Sort">
        <?php
        echo "<table border='1'>
                 <th>OrderID</th>                 
                 <th>SupplierID</th>                 
                 <th>Supplier Company Name</th>
                 <th>Supplier Contact Name</th>
                 <th>Supplier Contacts</th>
                 <th>ItemID</th>
                 <th>Image</th>
                 <th>Item Name</th>
                 <th>Order Quantity</th>
                 <th>Order Date Time</th>
                 <th>Delivery Address</th>
                 <th>Order Delivery Date</th>
                 <th>Total Order Amount</th>
                 ";

        if (isset($_POST['updateTable'])) {
            if ($_POST['col1'] != null && $_POST['order1'] != null && $_POST['col2'] != null && $_POST['order2'] != null) {
                displaySortedOrder($_POST['col1'], $_POST['order1'], $_POST['col2'], $_POST['order2'], $_POST['group']);
            } else if ($_POST['col1'] != null && $_POST['order1'] != null) {
                displaySortedOrder($_POST['col1'], $_POST['order1'], null, null, $_POST['group']);
            } else {
                displaySortedOrder(null, null, null, null, $_POST['group']);
            }
        }

        function displaySortedOrder($col1, $order1, $col2, $order2, $groupby)
        {
            $hostname = "127.0.0.1";
            $username = "root";
            $pwd = "";
            $db = "projectdb";
            $conn = mysqli_connect($hostname, $username, $pwd, $db) or die(mysqli_connect_error());

            $sql = "SELECT orders.orderID, supplier.supplierID,
            supplier.companyName,supplier.contactName,supplier.contactNumber,
            orders.orderDateTime,orders.deliveryAddress, orders.deliveryDate,
            item.itemID, item.ImageFile, item.itemName, ordersitem.orderQty,
            ordersitem.orderQty, ordersitem.itemPrice 
            FROM orders , item,supplier,ordersitem
            WHERE item.supplierID=supplier.supplierID AND
            orders.orderID=ordersitem.orderID AND
            item.itemID=ordersitem.itemID";
            if ($groupby == "true") {
                $sql .= " GROUP BY supplier.supplierID";
            }
            if ($col1 != null && $order1 != null && $col2 != null && $order2 != null) {
                $sql .= " ORDER BY $col1 $order1 , $col2 $order2";

            } else if ($col1 != null && $order1 != null) {
                $sql .= " ORDER BY $col1 $order1";
            }

            $result = mysqli_query($conn, $sql);
            $totalAmount = 0;
            if (mysqli_num_rows($result) > 0) {

                while ($item = mysqli_fetch_assoc($result)) {
                    $totalAmount = $item['orderQty'] * $item['itemPrice'];
                    echo "
                  <tr>
                 <td>$item[orderID]</td>
                 <td>$item[supplierID]</td>

                 <td>$item[companyName]</td>                  
                 <td>$item[contactName]</td>
                 <td>$item[contactNumber]</td>
                 <td>$item[itemID]</td>
                 <td><img src='/Assignment/images/$item[ImageFile]' alt=\"$item[itemName]\" height='80px'/></td>
                 <td>$item[itemName]</td>
                 <td>$item[orderQty]</td>
                <td>  $item[orderDateTime] </td>
                <td> $item[deliveryAddress] </td>
                <td> $item[deliveryDate] </td> ";
                    $url = 'http://localhost/api/discountCalculator?TotalOrderAmount=' . $totalAmount;

                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($curl);

                    if ($response !== false) {
                        $data = json_decode($response, true); // convert JSON to PHP array
        
                        // Process the response data here
                        if (isset($data['NewOrderAmount'])) {
                            echo ' <td>$' . $data['NewOrderAmount'] . '</td></tr>';
                        }
                    }
                }
            }
        }
        ?>
        </table>
</body>
<hr>
<footer>
    &copy Yummy group limited
</footer>

</html>
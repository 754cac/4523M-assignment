<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Panel</title>
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
            <td><a class="active" href="update_acount.php">Update purchase account</a></td>
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
    $acount = $_SESSION['account'];
    if ($_SESSION['status'] != "loggedin") {
        header("Location: login.php");
    }
    ?>
    <form method="post" action="update_checking.php">
        <label for="acont">Acount:
            <?php echo $acount; ?>
        </label>
        <br>
        <label for="npwd">New Password: </label>
        <input type="password" name="npwd" id="npwd">
        <br>
        <label for="cont">Contact Number</label>
        <input type="number" name="cont" id="cont" pattern="^[0-9]{8}$" max="99999999">
        <br>
        <label for="wareAdds">Warehouse Address</label>
        <input type="text" name="wareAdds" id="wareAdds">
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($_SESSION['updateResult'])) {
        echo $_SESSION['updateResult'];
    }
    ?>
</body>
<hr>
<footer>
    &copy Yummy group limited
</footer </html>
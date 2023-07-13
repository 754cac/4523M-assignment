<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <table border="10px" width="100%" margin="0px 0px 0px 0px" background="/Assignment/images/background.png">
        <tr>
            <td><img src="/Assignment/images/final2.jpg" alt="icon" height="80px" /></td>
        </tr>
    </table>


</header>

<body>
    <?php
    session_start();
    if(session_status() == PHP_SESSION_ACTIVE && $_SESSION !=null){
        if(isset($_SESSION['status'])){
            header("Location: make_order.php");
        }
    }else if(!isset($_POST['submit'])){
?>
    <form action="login_checking.php" method="post">
        <br>
        Acount:
        <input type="text" name="acount" required>
        <br>
        Password:
        <input type="password" name="passwords" required>
        <input type="submit" value="Login">
    </form>
    <?php
    }    
?>
</body>
<hr>
<footer>
    &copy Yummy group limited
</footer </html>
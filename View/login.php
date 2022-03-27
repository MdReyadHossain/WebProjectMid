<?php
    session_start();
    if(isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/Admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signin</title>
        <style>
            fieldset {
                width: 500px;
            }
        </style>
    </head>
    <body>
        <fieldset style="width: 98%;">
            <?php include('../View/Header.php'); ?>
            <div style="float: right;">
                <a href="/ProjectEZ/View/login.php">Login</a> | <a href="/ProjectEZ/Home.php">Home</a>
            </div>
        </fieldset>

        <form action="/ProjectEZ/Controller/LoginAction.php" target="_self" method="POST">
            <fieldset style="width: 500px; margin-left: auto; margin-right: auto;">
                <legend><h3>SignIn</h3></legend>
                <?php
                    $error = "";
                    if(isset($_COOKIE['error'])) {
                        $error = $_SESSION['error'];
                    }
                    else {
                        $error = "";
                    }
                    echo $error;
                    if(isset($_SESSION['reg'])) {
                        echo $_SESSION['reg'];
                        session_unset();
                        session_destroy();
                    }
                ?>
               <table>
                    <tr>
                        <td>
                            <label for="user">Username </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="user" id="user">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">Password </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="pass" id="pass">
                        </td>
                    </tr>
                </table> 
                <br>
                <input type="submit" name="login" value="Login">
            </fieldset>
        </form>
        <br>
        
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
    </body>
</html>
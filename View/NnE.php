<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News and Events</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>
    <fieldset style="width: 50%; height: 100%; float: left;">
        <legend><b>News And Events</b></legend>
        <br>
        <form action="/ProjectEZ/Controller/NnEAction.php"  method="POST">
            <?php 
                if(isset($_COOKIE['msg'])) {
                    echo $_COOKIE['msg'];
                }    
            ?>
            <table>
                <tr>
                    <td>
                        <label for="date">Date: </label>
                        <input type="date" name="date" id="date">
                    </td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td>
                        <label for="news">Write a News or Events:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="news" id="news" cols="80" rows="10"></textarea>
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Announce">
        </form>
        <br>
        <a href="/ProjectEZ/View/NnEdata.php"><p style="text-align: center;">See all</p></a>
    </fieldset>

    <br>
    <fieldset style="width: 98%;">
        <?php 
            include '../View/Footer.php'; 
        ?>
    </fieldset>
</body>
</html>
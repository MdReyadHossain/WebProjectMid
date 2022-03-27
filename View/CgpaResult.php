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
        <title>Wbsite</title>
    </head>
    <body>
        <?php include('../View/Adminbar.php') ?>

        <fieldset style="width: 50%; height: 500px; overflow: scroll;">
            <legend><b>CGPA Result</b></legend>
            <?php echo $_COOKIE['res']; ?>
        </fieldset>
        <br>
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
    </body>
</html>
<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }

    define("file", "../Model/user.json");
    $handle = fopen(file, "r");
    $fr = fread($handle, filesize(file));
    $json = json_decode($fr);
    fclose($handle);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>

    <form action="/ProjectEZ/Controller/ChangepassAction.php" target="_self" method="post" novalidate>
        <fieldset style="width: 40%;">
            <legend><b>Change Password</b></legend>
            <br>
            <?php
                if(isset($_COOKIE['msg'])) {
                    echo $_COOKIE['msg'];
                }
            ?>
            <table>
                <tr>
                    <td>
                        <label for="curpass">Current Password </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="password" name="currentpass" id="curpass">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="newpass">New Password </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="password" name="newpassword" id="newpass">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="repass">Retype Password </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="password" name="repassword" id="repass">
                    </td>
                </tr>
            </table>
            <br>
        </fieldset>
        <br>
        <input type='submit' name='submit' value='Update'>
        <br>
    </form>

    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>
</body>
</html>
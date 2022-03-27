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

    <form action="/ProjectEZ/Controller/UpdateAction.php" target="_self" method="post" novalidate>
        <fieldset style="width: 40%;">
            <legend><b>Update Profile</b></legend>
            <br>
            <?php
                if(isset($_COOKIE['err'])) {
                    echo $_COOKIE['err'];
                }
            ?>
            <table>
                <tr>
                    <td>
                        <label for="fname">First Name </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="text" name="firstname" id="fname" value="<?php echo $_SESSION['fname']; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="lname">Last Name </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="text" name="lastname" id="lname" value="<?php echo $_SESSION['lname']; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>"><?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];} ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phone">Contact No. </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="tel" name="phone" id="phone" value="<?php echo $_SESSION['phone']; ?>"><?php if(isset($_COOKIE['phone'])) {echo $_COOKIE['phone'];} ?>
                    </td>
                </tr>
                <tr>
                <td>
                    <label for="preadd">Present Address </label> 
                </td>
                <td>:</td>
                <td>
                    <textarea name="preaddress" id="preadd"><?php echo $_SESSION['preaddress']; ?></textarea> 
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
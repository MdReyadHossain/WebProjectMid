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
            <legend><b>CGPA Calculator</b></legend>
            <form action="/ProjectEZ/Controller/CgpaAction.php" method="POST">
                <?php
                    if(isset($_COOKIE['cgpa'])) {
                        echo "<p style='text-align: center;'>" . $_COOKIE['cgpa'] . "</p>";
                    }
                ?>
                <table style="margin-left: auto; margin-right: auto;">
                    <tbody>
                        <tr>
                            <td>Credit <hr></td>
                            <td>GPA <hr></td>
                        </tr>
                        <?php 
                            for($i = 1; $i <= $_SESSION['cg']; $i++) {
                                echo '<tr>';
                                echo "<td><input type='number' name='credit$i' value='0'></td>";
                                echo "<td><select name='cgpa$i' id='rel'> 
                                            <option value='none'>Select</option>
                                            <option value='4.00'>A+ (4.00)</option>
                                            <option value='3.75'>A (3.75)</option>
                                            <option value='3.50'>B+ (3.50)</option>
                                            <option value='3.25'>B (3.25)</option>
                                            <option value='3.00'>C+ (3.00)</option>
                                            <option value='2.75'>C (2.75)</option>
                                            <option value='2.50'>D+ (2.50)</option>
                                            <option value='2.25'>D (2.25)</option>
                                            <option value='0'>F (0.00)</option>
                                        </select></td>";
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <?php 
                    echo "<td><p style='text-align: center;'><a href='../Controller/CgpaAddAction.php'>Add</a> | <a href='/ProjectEZ/Controller/CgpaDelAction.php'>Delete</a></p></td>";
                ?>
                <p style='text-align: center;'><input type="submit" name="submit" value="Calculate"></p>
            </form>
        </fieldset>
        <br>
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
    </body>
</html>
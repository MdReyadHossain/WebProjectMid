<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }
    define("t", "../Model/teacher.json");
    $handle_t = fopen(t, "r"); 
    $fr1 = fread($handle_t, filesize(t));
    $arr1 = json_decode($fr1);
    $fc1 = fclose($handle_t);

    define("s", "../Model/student.json");
    $handle_s = fopen(s, "r");
    $fr2 = fread($handle_s, filesize(s));
    $arr2 = json_decode($fr2);
    $fc2 = fclose($handle_s);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wbsite</title>
        <style>
            td {
                width: 25%;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php include('../View/Adminbar.php') ?>

        <fieldset style="width: 50%;">
            <legend><b>Dashboard</b></legend>
            <h3 align='center'>EZ Learning</h3>
            <hr>
                <table style="margin-left: auto; margin-right: auto;">
                    <tbody>
                        <tr>
                            <td>Teachers</td>
                            <td>Student</td>
                        </tr>
                        <tr>
                            <td><?php echo count($arr1); ?></td>
                            <td><?php echo count($arr2); ?></td>
                        </tr>
                    </tbody>
                </table>
                <table border="1" style="margin-left: auto; margin-right: auto;">
                    <tbody>
                        <tr>
                            <td rowspan="<?php echo count($arr1)+1; ?>">Teachers</td>
                        </tr>
                        <?php 
                            for ($i = 0; $i < count($arr1); $i++) {
                                echo "<tr><td>" . $arr1[$i]->fname . " " . $arr1[$i]->lname . "</tr></td>";
                            }
                        ?>
                    </tbody>
                </table>
        </fieldset>
        
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
    </body>
</html>
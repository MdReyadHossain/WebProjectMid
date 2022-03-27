<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }

    define("t", "../Model/news.json");
    $handle_t = fopen(t, "r");
    $fr1 = fread($handle_t, filesize(t));
    $arr1 = json_decode($fr1);
    $fc1 = fclose($handle_t);
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
    <fieldset style="width: 50%; height: 100%; float: left; overflow: scroll ;">
        <legend><b>News And Events</b></legend>
        <br>
        <form action="/ProjectEZ/Controller/NnEAction.php"  method="POST">
            <table border="1" align="center">
                <tbody>
                    <tr>
                        <th>Date</th>
                        <th>News and Events</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        if ($arr1 === NULL) {}
                        else {
                            for ($i = 0; $i < count($arr1); $i++) {
                                echo "<tr>";
                                echo "<td>" . $arr1[$i]->date . "</td>";
                                echo "<td>" . $arr1[$i]->news . "</td>";
                                echo "<td>" . "<a href='/ProjectEZ/Controller/DeleteNnE.php?no=" . $arr1[$i]->no . "'>Delete</a></td>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </form>
        <br>
        <a href="/ProjectEZ/View/NnE.php"><p style="text-align: center;">Add News and Events</p></a>
    </fieldset>

    <br>
    <fieldset style="width: 98%;">
        <?php 
            include '../View/Footer.php'; 
        ?>
    </fieldset>
</body>
</html>
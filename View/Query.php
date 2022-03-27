<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }

    define("file", "../Model/query.json");
    $handle = fopen(file, "r");
    $fr = fread($handle, filesize(file));
    $arr1 = json_decode($fr);
    fclose($handle);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>

    <fieldset style="width: 60%; height: 450px; float: left;">
        <legend><b>Query</b></legend>
        <table border="1" align="center">
            <br>
            <tbody>
                <tr>
                    <th>Teacher ID</th>
                    <th>Teacher Name</th>
                    <th>Query</th>
                    <th>Action</th>
                </tr>
                <?php 
                    if ($arr1 === NULL) {}
                    else {
                        for ($i = 0; $i < count($arr1); $i++) {
                            echo "<tr>";
                                echo "<td> 100-" . $arr1[$i]->sl . "</td>";
                                echo "<td>" . $arr1[$i]->fname . " " . $arr1[$i]->lname . "</td>";
                                echo "<td>" . $arr1[$i]->query . "</td>";
                                echo "<td>" . "<a href='/ProjectEZ/View/QueryDone.php?sl=" . $arr1[$i]->sl . "'>Done</a></td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
        <br>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php 
            include '../View/Footer.php'; 
        ?>
    </fieldset>
</body>
</html>
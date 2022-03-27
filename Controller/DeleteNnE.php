<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete Action</title>
</head>
<body>
    <?php include('../View/Adminbar.php'); ?>
    <fieldset style="width: 50%; height: 450px;">
        <legend><b>News and Events</b></legend>
        <?php
            define("file", "../Model/news.json");
            if (isset($_GET['no'])) {		
                $no = $_GET['no'];
                $handle = fopen(file, "r");
                $fr = fread($handle, filesize(file));
                $arr1 = json_decode($fr);
                $fc = fclose($handle);

                $handle = fopen(file, "w");
                $arr2 = array();
                for ($i = 0; $i < count($arr1); $i++) {
                    if (+$no !== $arr1[$i]->no) {
                        array_push($arr2, $arr1[$i]);
                    }
                }

                $data = json_encode($arr2);
                $fw = fwrite($handle, $data);
                $fc = fclose($handle);
            }
            else {
                die("Invalid Request");
            }   
            echo "<h3>Notice Removed</h3><br>";
        ?>
        <a href="/ProjectEZ/View/NnEdata.php">Go Back</a>
    </fieldset>
    

    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>
</body>
</html>
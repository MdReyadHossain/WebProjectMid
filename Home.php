<?php 
    define("t", "../ProjectEZ/Model/news.json");
    $handle = fopen(t, "r");
    $fr1 = fread($handle, filesize(t));
    $arr1 = json_decode($fr1);
    $fc1 = fclose($handle);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>
    <body>
        <fieldset>
            <?php include '../ProjectEZ/View/Header.php'; ?> 
            <div style="float: right;">
                <a href="/ProjectEZ/View/login.php">Login</a> | <a href="/ProjectEZ/View/Registration.php">Sign Up</a>
            </div>
        </fieldset>
          
        <h3 align="center">Welcome to EZ Learning</h3>
        <h3>News and Events</h3>
        <?php 
            if($arr1 == NULL){}
            else {
                for ($i = 0; $i < count($arr1); $i++) {
                    echo "<ul>";
                    echo "<li>" . $arr1[$i]->news . "</li>";
                    echo "</ul>";
                }
            }
        ?>
        
        <fieldset>
            <?php include '../ProjectEZ/View/Footer.php'; ?>
        </fieldset>
        
    </body>
</html>
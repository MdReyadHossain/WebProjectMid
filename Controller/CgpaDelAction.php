<?php
    session_start();

    if($_SESSION['cg'] > 1)
        $_SESSION['cg'] -= 1; 

    header('location: /ProjectEZ/View/Cgpacal.php');
?>
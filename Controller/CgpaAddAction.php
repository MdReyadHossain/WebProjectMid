<?php
    session_start();

    $_SESSION['cg'] += 1; 
    header('location: /ProjectEZ/View/Cgpacal.php');
?>
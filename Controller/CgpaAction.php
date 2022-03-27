<?php 
    session_start();

    $Tcgpa = $Tcredit = $CG = 0;

    $isValid = true;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $isChecked = true;
        function test($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        for($i = 1; $i <= $_SESSION['cg']; $i++) {
            $cgpa[$i] = test($_POST["cgpa$i"]);
            $credit[$i] = test($_POST["credit$i"]);
            
            if($cgpa[$i] == 'none'){
                $isValid = false;
                break;
            }
            
            $Tcgpa = $Tcgpa + ($cgpa[$i] * $credit[$i]);
            $Tcredit = $Tcredit + $credit[$i];
        }

        if($isValid) {
            setcookie('res', $Tcgpa / $Tcredit, time() + 120, '/');
            header('location: /ProjectEZ/View/CgpaResult.php');
        } 
        else {
            setcookie('cgpa', '<b>GPA input should not be empty.</b>', time() + 1, '/');
            header('location: /ProjectEZ/View/Cgpacal.php');
        }
    }
?>
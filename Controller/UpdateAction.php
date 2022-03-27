<?php
    echo "<h2>Update Profile</h2>";
    session_start();
    $firstname = $lastname = $email = $preaddress = $phone = "";

    $firstnameErr = $lastnameErr = $preaddressErr = $phoneErr = $emailErr = $usernameErr = $passwordErr = "";

    $isValid = true;
    $isChecked = $isEmpty = false;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $isChecked = true;
        function test($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $firstname = test($_POST["firstname"]);
        $lastname = test($_POST["lastname"]);
        $preaddress = test($_POST["preaddress"]);
        $phone = test($_POST["phone"]);
        $email = test($_POST["email"]);

        if(empty($firstname)) {
            $isValid = false;
            $isEmpty = true;
        }

        if(empty($lastname)) {
            $isValid = false;
            $isEmpty = true;
        }

        if(empty($phone)) {
            $isValid = false;
            $isEmpty = true;
        }
        elseif(!is_numeric($phone)) {
            $isValid = false;
            $phoneErr = "<b>*Invalid Contact Number</b>";
        }

        if(empty($preaddress)) {
            $isValid = false;
            $isEmpty = true;
        }

        if(empty($email)) {
            $isValid = false;
            $isEmpty = true;
        }

        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $emailErr = "<b>*Invalid email format</b>";
        }

    }
    if($isValid and $isChecked){
        header('location: /ProjectEZ/View/Admin.php');

        define("file", "../Model/user.json");
        $handle = fopen(file, "r");
        $fr = fread($handle, filesize(file));
        $json = json_decode($fr);
        fclose($handle);
        
        $handle = fopen(file, "w");
        if($_SESSION['sl'] == $json[$i]->sl){
            $json[0]->fname = $firstname;
            $json[0]->lname = $lastname;
            $json[0]->phone = $phone;
            $json[0]->email = $email;
            $json[0]->preaddress = $preaddress;

            $_SESSION['fname'] = $json[0]->fname;
            $_SESSION['lname'] = $json[0]->lname;
            $_SESSION['phone'] = $json[0]->phone;
            $_SESSION['email'] = $json[0]->email;
            $_SESSION['preaddress'] = $json[0]->preaddress;
        }
        $data = json_encode($json);
        fwrite($handle, $data);
        fclose($handle);
    }

    else if($isEmpty) {
        setcookie('err', "*<b>Required input should not empty</b>", time() + 1, "/");
        header("location: /ProjectEZ/View/Update.php");
    }

    else {
        if($emailErr != NULL)
            setcookie('email', $emailErr, time() + 1, "/");
        if($phoneErr != NULL)
            setcookie('phone', $phoneErr, time() + 1, "/");
        header("location: /ProjectEZ/View/Update.php");
    }
?>
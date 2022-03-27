<?php 
    session_start();

    define("file", "../Model/user.json");
    $handle = fopen(file, "r");
    $fr = fread($handle, filesize(file));
    $json = json_decode($fr);
    fclose($handle);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Passowrd</title>
    </head>
    <body>
        <?php 
            $curpass = $password = $conpassword = "";
            
            $passwordErr = "";

            $isValid = true;
            $isChecked = $isEmpty = false;

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $isChecked = true;
                function test($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $curpass = test($_POST["currentpass"]);
                $password = test($_POST["newpassword"]);
                $conpassword = test($_POST["repassword"]);


                if(empty($curpass)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if(empty($password)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                else if(strlen($password) < 8) {
                    $isValid = false;
                    $passwordErr = "*Password must be at least 8 characters long";
                }

                if(empty($conpassword)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if($password != $conpassword) {
                    $isValid = false;
                    $passwordErr = "*Password not matched";
                }

                if($curpass != $json[0]->password) {
                    $isValid = false;
                    $passwordErr = "*Password not matched";
                }

                
                if($isValid and $isChecked){
                    setcookie('msg', '<b>*Password Changed</b><br>', time() + 1, '/');
                    header("location: /ProjectEZ/View/ChangePass.php");

                    $handle = fopen(file, "w");
                    if($_SESSION['sl'] == $json[$i]->sl){
                        $json[0]->password = $password;
                        $_SESSION['password'] = $json[0]->password;
                    }
                    $data = json_encode($json);
                    fwrite($handle, $data);
                    fclose($handle);
                }

                else if($isEmpty) {
                    setcookie('msg', '<b>*Input missing</b><br>', time() + 1, '/');
                    header("location: /ProjectEZ/View/ChangePass.php");
                }

                else {
                    if($passwordErr != NULL)
                        setcookie('msg', '<b>' . $passwordErr . '</b>', time() + 1, '/');
                    header("location: /ProjectEZ/View/ChangePass.php");
                }
            }
        ?>
    </body>
</html>
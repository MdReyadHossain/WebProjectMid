<?php
    session_start();
    $username = $password = "";
    $isEmpty = $isValid = false;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        function test($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $username = test($_POST["user"]);
        $password = test($_POST["pass"]);

        if(empty($username))
            $isEmpty = true;
            
        if(empty($password))
            $isEmpty = true;

        if(!$isEmpty) {    
            define("file", "../Model/user.json");
            $handle = fopen(file, "r");
            $json = NULL;
        
            if(filesize(file) > 0) {
                $fr = fread($handle, filesize(file));
                $json = json_decode($fr);
                fclose($handle);
            }

            if($json == NULL) {
                $_SESSION['error'] = "*Please register first!<br><br>";
                $error = $_SESSION['error'];
                header("Location: /ProjectEZ/View/login.php");
                setcookie('error', $error, time() + 1, "/");
            }

            else {
                if($json[0]->username == $username and $json[0]->password == $password) {
                    $_SESSION['fname'] = $json[0]->fname;
                    $_SESSION['lname'] = $json[0]->lname;
                    $_SESSION['email'] = $json[0]->email;
                    $_SESSION['phone'] = $json[0]->phone;   
                    $_SESSION['preaddress'] = $json[0]->preaddress;  
                    $_SESSION['cg'] = 1;  
                    
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    header("Location: /ProjectEZ/View/Dashboard.php");
                    $isValid = true;
                }
                if(!$isValid) {
                    $_SESSION['error'] = "*Username or Password incorrect<br><br>";
                    $error = $_SESSION['error'];
                    header("Location: /ProjectEZ/View/login.php");
                    setcookie('error', $error, time() + 1, "/");
                }
            }
        }
        else {
            $_SESSION['error'] = "*Please input  Username and Password<br><br>";
            $error = $_SESSION['error'];
            header("Location: /ProjectEZ/View/login.php");
            setcookie('error', $error, time() + 1, "/");
        }
    }
?>
<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Teacher Profile</title>
    </head>
    <body>
        <?php
            define("file", "../Model/teacher.json");
            $sl = $firstname = $lastname = $gender = $dob = $religion = $preaddress = $paraddress = $phone = $email = $website = $username = "";
            if (isset($_GET['sl'])) {		
                $sl = $_GET['sl'];
                $handle = fopen(file, "r");
                $fr = fread($handle, filesize(file));
                $arr1 = json_decode($fr);
                $fc = fclose($handle);

                for ($i = 0; $i < count($arr1); $i++) {
                    if (+$sl === $arr1[$i]->sl) {
                        $firstname = $arr1[$i]->fname;
                        $lastname = $arr1[$i]->lname;
                        $gender = $arr1[$i]->gender;
                        $dob = $arr1[$i]->dob;
                        $religion = $arr1[$i]->religion;
                        $preaddress = $arr1[$i]->preaddress;
                        $paraddress = $arr1[$i]->paraddress;
                        $phone = $arr1[$i]->phone;
                        $email = $arr1[$i]->email;
                        $website = $arr1[$i]->website;
                        $username = $arr1[$i]->username;
                    }
                }
            }
            else {
                die("Invalid Request");
            }
        ?>

        <?php include('../View/Adminbar.php') ?>
        <fieldset style="width: 40%; height: auto;">
            <legend><b>Teachers Profile</b></legend>
            <br>
            <form action="/ProjectEZ/Controller/EditTeacherAction.php" method="POST">
                <input type="number" name="sl" value="<?php echo $sl; ?>" hidden>
                <table>
                    <tr>
                        <td>
                            <label for="fname">First Name </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="firstname" id="fname" value="<?php echo $firstname; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lname">Last Name </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="lastname" id="lname" value="<?php echo $lastname; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="gen">Gender </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input <?php if($gender == 'male') {echo 'checked="checked"';} ?> type="radio" name="gender" value="male" id="male"> <label for="male">Male</label> 
                            <input <?php if($gender == 'female') {echo 'checked="checked"';} ?> type="radio" name="gender" value="female" id="female"> <label for="female">Female</label>
                            <input <?php if($gender == 'other') {echo 'checked="checked"';} ?> type="radio" name="gender" value="other" id="other"> <label for="other">Others</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dob">Date of Birth </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="rel">Religion </label>
                        </td>
                        <td>:</td>
                        <td>
                            <select name="religion" id="rel"> 
                                <option <?php if($religion == 'islam'){echo 'selected';} ?> value="islam">Islam</option>
                                <option <?php if($religion == 'hindu'){echo 'selected';} ?> value="hindu">Hindu</option>
                                <option <?php if($religion == 'christian'){echo 'selected';} ?> value="christian">Christian</option>
                                <option <?php if($religion == 'other'){echo 'selected';} ?> value="other">Other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="preadd">Present Address </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <textarea name="preaddress" id="preadd"><?php echo $preaddress; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="paradd">Parmanent Address </label>
                        </td>
                        <td>:</td>
                        <td>
                            <textarea name="paraddress" id="paradd"><?php echo $paraddress; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="phone">Phone No. </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="tel" name="phone" id="phone" value="<?php echo $phone; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="email" name="email" id="email" value="<?php echo $email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="web">Website </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="url" name="website" id="web" value="<?php echo $website; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="user">Username </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="username" id="user" value="<?php echo $username; ?>">
                        </td>
                    </tr>
                </table>
                <br>
                <input type='submit' name='submit' value='Update'>
            </form>
        </fieldset>
        <br>
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
    </body>
</html>
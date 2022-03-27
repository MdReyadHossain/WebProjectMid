<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form submit</title>
    </head>
    <body>
        <?php 
            $date = $news = "";

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

                $date = test($_POST["date"]);
                $news = test($_POST["news"]);
                $year = date("Y") - intval($date);

                if(empty($date)) {
                    $isValid = false;
                    $isEmpty = true;
                }
                else if ($year < 0) {
                    $isValid = false;
                }

                if(empty($news)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if($isValid and $isChecked){
                    // data insertion
                    define("file", '../Model/news.json');
                    $handle = fopen(file, "r");
                    $json = NULL;

                    if(filesize(file) > 0) {
                        $fr = fread($handle, filesize(file));
                        $json = json_decode($fr);
                        fclose($handle);
                    }
                    
                    $handle = fopen(file, "w");
                    if($json == NULL){
                        $no = 1;
                        $data = array(array("no" => $no,
                                            "date" => $date, 
                                            "news" => $news));
                        $data = json_encode($data);
                    }
                    else {
                        $no = $json[count($json)-1]->no;
                        $json[] = array("no" => $no + 1,
                                        "date" => $date, 
                                        "news" => $news);
                        $data = json_encode($json);
                    }
                    fwrite($handle, $data);
                    fclose($handle);
                    header("location: /ProjectEZ/View/NnEdata.php");
                }

                else if($isEmpty) {
                    setcookie('msg', '<b>*Required input missing</b><br>', time() + 1, '/');
                    header("location: /ProjectEZ/View/NnE.php");
                }
    
                else {
                    setcookie('msg', "<b>*Invalid Date</b>", time() + 1, '/');
                    header("location: /ProjectEZ/View/NnE.php");
                }
            }
        ?>
    </body>
</html>
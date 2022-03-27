<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset style="width: 98%;">
        <?php include('../View/Header.php'); ?>
        <div style="float: right;">
            <a href="/ProjectEZ/View/ChangePass.php">Change Password</a> | <a href="/ProjectEZ/Controller/Logout.php">Logout</a>
        </div>
        <br>
        <div style="float: right;">
            <b>Admin Panel</b>
        </div>
    </fieldset>
    <br>
    <div style="width: 30%; float: left;">
        <ul>
            <li><a href="/ProjectEZ/View/Dashboard.php"><b> Dashboard</b></a><br><br></li>
            <li><a href="/ProjectEZ/View/Admin.php"><b> Profile</b></a><br><br></li>
            <li><a href="/ProjectEZ/View/Update.php"><b> Update Admin</b></a><br><br></li>
            <li><a href="/ProjectEZ/View/Teacher.php"><b> Teachers </b></a><br><br></li>
            <li><a href="/ProjectEZ/View/Student.php"><b> Students </b></a><br><br></li>
            <li><a href="/ProjectEZ/View/Cgpacal.php"><b> CGPA calculator </b></a><br><br></li>
            <li><a href="/ProjectEZ/View/NnE.php"><b> News and Events</b></a><br><br></li>
            <li><a href="/ProjectEZ/View/Query.php"><b> Query Session</b></a><br><br></li>
        </ul>
    </div>
</body>
</html>
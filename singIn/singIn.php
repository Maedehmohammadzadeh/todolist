<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>singIn</title>
    <?php
    include_once "../components/mainStyles.php";
    ?>
    <link rel="stylesheet" href="singIn.css">
</head>

<body>
    <?php
    include_once "../components/header.php";
    ?>
    <div class="cont-page">
        <h1>Logo</h1>
        <form action="getuser.php" method="post" id="form">
            <input type="text" class="allinput select-input" id="name-input" name="username" placeholder="Enter your  UserName">
            <label for="">your Name must longe lenght </label>
            <input type="password" class="allinput select-input" id="family-input" name="password" placeholder="Enter your password">
            <label for="">your Familyname must longe lenght</label>
            <button type="submit" class="bt1" id="button-singIn">Login</button>
        </form>
    </div>
    <!-- <script src="singIn.js"></script> -->
</body>

</html>
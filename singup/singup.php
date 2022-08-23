<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SingUp</title>
    <?php
    include_once "../components/mainStyles.php";
    ?>
    <link rel="stylesheet" href="singup.css">
</head>

<body>
    <?php
    include_once "../components/header.php";
    ?>
    <div class="cont-page">
        <h1>Logo</h1>
        <form action="adduser.php" method="post" id="form">
            <input type="text" class="allinput select-input" name="username" id="name-input" placeholder="Enter your  Username">
            <label for="" class="lable-error">your username must be 8 charchter</label>

            <input type="email" class="allinput" name="email" id="input-email" placeholder="Enter your Email">
            <label for="" class="lable-email">your Email must have @</label>

            <input type="text" class="allinput select-input" id="family-input" name="password" placeholder="Enter your Password">
            <label for="" class="lable-error">your password must be 8 charchter</label>

            <button type="submit" class="bt1" id="button">Sing Up</button>
        </form>
    </div>
    <script src="singup.js"></script>
</body>

</html>
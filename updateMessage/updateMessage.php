<?php
require_once "../components/dbconnection.php";
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: ../singIn/singIn.php");
}
$userId = $_SESSION['user_id'];
// آیدی مربوط به هر فیلد رو از متغیر $_GET دریافت میکنیم تا بتونیم اون رو از دیتابیس بگیریم
$messageId = intval($_GET['id']);
// چک میکنیم اگر آیدی  عدد نبود یا صفر بود به صفحه اصلی برگردانده شود
if ($messageId <= 0) {
    header("location: ../index.php");
}
// فیلد مربوط به آیدی پیغام و آيدی کاربر رو از دیتابیس میگیریم
if(isset($_SESSION['user_admin'])){
    $sql = "SELECT * FROM `list` WHERE id='$messageId'";

}else{
    $sql = "SELECT * FROM `list` WHERE id='$messageId' AND user_id='$userId'";
}
$result = mysqli_query($db_connection, $sql);
$result = mysqli_fetch_assoc($result);
if ($result === null) {
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="./style.css" rel="stylesheet" />
    <?php
    include_once "../components/mainStyles.php";
    ?>
</head>

<body>
    <?php
    include_once "../components/header.php";
    ?>
    <form action="./updateMessageDB.php?id=<?= $messageId ?>" method="POST" class="form-container">
        <h1 class="form-title">Update</h1>
        <input class="form-input" name="title" value="<?= $result["title"] ?>" />
        <input class="form-input" type="date" name="date_added" value="<?= $result["date_added"] ?>" />
        <input class="form-input" name="message" value="<?= $result["message"] ?>" />
        <input class="form-button" value="Update" type="submit">
    </form>
</body>

</html>
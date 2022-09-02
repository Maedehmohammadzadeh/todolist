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
$sql = "DELETE FROM `list` WHERE id='$messageId'";
$result = mysqli_query($db_connection, $sql);
header("location: ../index.php");

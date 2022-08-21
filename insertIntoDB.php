<?php
require_once "./components/dbconnection.php";
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: ./singIn/signIn.php");
}
$userId = $_SESSION["user_id"];
$title = $_POST['title'];
$date_add = $_POST['date'];
$message = $_POST['messge'];
$is_active = true;
$sql = "INSERT INTO `list`
(title, date_added, message, is_active, user_id) 
VALUES ('$title', '$date_add', '$message', '$is_active', '$userId')";
$result = mysqli_query($db_connection, $sql);
header("Location: ./index.php");

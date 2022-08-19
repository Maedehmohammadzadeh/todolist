<?php
require_once "./components/dbconnection.php";
$title = $_POST['title'];
$date_add = $_POST['date'];
$message = $_POST['messge'];
$is_active = true;
$sql = "INSERT INTO `list`
(title, date_added, message, is_active) 
VALUES ('$title', '$date_add', '$message', '$is_active')";
$result = mysqli_query($db_connection, $sql);
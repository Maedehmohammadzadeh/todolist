<?php
require_once "../components/dbconnection.php";
$title = $_POST['title'];
$date_add = $_POST['date_added'];
$message = $_POST['message'];
$messageId = $_GET['id'];
$sql = "UPDATE `list` SET title='$title', date_added='$date_add', message='$message' WHERE id='$messageId'";
$result = mysqli_query($db_connection, $sql);
header("Location: ../index.php");

<?php
require_once "../components/dbconnection.php";
//اطلاعاعات سمت کاربر نگهدارد 
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT * FROM `account` WHERE username='$username' AND password='$password'";
$query=mysqli_query($db_connection,$sql);
//خروجی مثل ارایع به ما برمیگردانئد
$query = mysqli_fetch_assoc($query);
if ($query===null){
    // مسیر صفحه را عوض میکند
    header("location: singIn.php");
}
$_SESSION["user_id"] = $query["id"];
header("location: ../index.php");

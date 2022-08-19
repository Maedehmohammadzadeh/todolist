<?php
require_once "../components/dbconnection.php";
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
// برای اینکه چک کند isername تکراری نداشته باشیم
$select="SELECT * from `account` Where username='$username'";
 $query=mysqli_query($db_connection,$select);
 $query = mysqli_fetch_assoc($query);
 // اگر به ما کاربری را داد که از قبل وجود داشت اجازه صبت نام نده
 if($query !== null){
 header("location: ./singup.php");
die();    
}
 $sql="INSERT into `account` (username, email, password) values ('$username','$email','$password')";
 $query=mysqli_query($db_connection,$sql);
 header("location: ../singIn/singIn.php");
  
 

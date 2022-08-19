<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  header("location: ./singIn/singIn.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="./style.css" rel="stylesheet" />
</head>

<body>
  <form action="./insertIntoDB.php" method='post' id="myDIV" class="header">
    <h2>My To Do List</h2>
    <input type="text" name="title" placeholder="Title...">
    <input type="date" name="date" placeholder="Date...">
    <input type="text" name="messge" placeholder="message...">
    <button type="submit" class="addBtn">Add</button>
  </form>
  <?php
  require_once "./components/dbconnection.php";
  $user_id = $_SESSION["user_id"];
  $sql = "SELECT * from `list` WHERE user_id='$user_id'";
  $query = mysqli_query($db_connection, $sql);
  //همه ی فیلد هایی که پیدا کند برمیگرداند و ارایع اسوکی برمیگرداند
  $query = mysqli_fetch_all($query, MYSQLI_ASSOC);
  // از حلقه استفاده میکنیم تا  به تعداد فیلد ها برگرداند
  for ($i = 0; $i < sizeof($query); $i++) {
  ?>
    <div class="message-container">
      <h2 class="message-title"><?= $query[$i]['title'] ?></h2>
      <p class="message-text"><?= $query[$i]['message'] ?></p>
      <a href="./updateMessage/updateMessage.php?id=<?= $query[$i]['id'] ?>" class="message-button">update</a>
      <a href="./deleteMessage/deleteMessage.php?id=<?= $query[$i]['id'] ?>" class="message-button">delete</a>
    </div>
  <?php
  }
  ?>
  <script src="./script.js"></script>
</body>

</html>
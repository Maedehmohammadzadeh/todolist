<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  $userlogin = false;
} else {
  $userlogin = true;
}

// شماره ی صفحه ی مورد نظر را از url دریافت میکنیم
$pageNumber = 1;
if (isset($_GET['p'])) {
  $pageNumber = intval($_GET['p']);
  if ($pageNumber <= 0) {
    $pageNumber = 1;
  }
}
$countItemInPage = 5;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TODO list</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <?php
  include_once "./components/mainStyles.php";
  ?>
  <link href="./css/style.css" rel="stylesheet" />
</head>

<body>
  <?php
  include_once "./components/header.php";
  if ($userlogin) {
  ?>
    <form action="./insertIntoDB.php" method='post' id="myDIV" class="form-container">
      <h2 class="form-header">Add New Item</h2>
      <input type="text" name="title" placeholder="Title..." class="form-input">
      <input type="date" name="date" placeholder="Date..." class="form-input">
      <textarea name="messge" placeholder="message..." class="form-input form-textarea"></textarea>
      <button type="submit" class="addButton">Add Item</button>
    </form>
    <?php
    require_once "./components/dbconnection.php";
    $user_id = $_SESSION["user_id"];

    // تعداد همه ی فیلد های مربوط به یک یوزر را برمیگرداند
    if (isset($_SESSION['user_admin'])) {
      $sql = "SELECT COUNT(id) FROM `list`";
    } else {
      $sql = "SELECT COUNT(id) FROM `list` WHERE user_id='$user_id'";
    }
    // تعداد کل فیلد هارو میگیریم تا پیج بندی کنیم
    $countOfRows = mysqli_query($db_connection, $sql);
    $countOfRows = mysqli_fetch_assoc($countOfRows);
    $countOfRows = intval($countOfRows['COUNT(id)']);
    // تعداد کل فیلد هارو تقسیم بر تعداد در هر صفحه میکنیم تا ببینیم کلا چند پیج نیاز داریم
    $pageNumbers = ceil($countOfRows / $countItemInPage);
    if ($pageNumber > $pageNumbers) {
      $pageNumber = 1;
    }
    $offsetItems = ($pageNumber - 1) * $countItemInPage;
    if (isset($_SESSION['user_admin'])) {
      $sql = "SELECT * from `list` LIMIT $countItemInPage OFFSET $offsetItems";
    } else {
      $sql = "SELECT * from `list` WHERE user_id='$user_id' LIMIT $countItemInPage OFFSET $offsetItems";
    }
    $query = mysqli_query($db_connection, $sql);
    //همه ی فیلد هایی که پیدا کند برمیگرداند و ارایع اسوکی برمیگرداند
    $query = mysqli_fetch_all($query, MYSQLI_ASSOC);
    // از حلقه استفاده میکنیم تا  به تعداد فیلد ها برگرداند
    for ($i = 0; $i < sizeof($query); $i++) {
    ?>
      <div class="message-container">
        <a class="bi bi-x-lg" href="./deleteMessage/deleteMessage.php?id=<?= $query[$i]['id'] ?>" closeIcon></a>
        <h2 class="message-title"><?= $query[$i]['title'] ?></h2>
        <p class="message-text"><?= $query[$i]['message'] ?></p>
        <a href="./updateMessage/updateMessage.php?id=<?= $query[$i]['id'] ?>" class="message-button">Update</a>
      </div>
    <?php
    }
    ?>
    <div class="pagination-container">
      <?php
      for ($p = 1; $p <= $pageNumbers; $p++) { ?>
        <!-- لینک هر صفحه را با اکو کردن شماره صفحه جلوی آن قرار میدهیم -->
        <!-- برای صفحه ای که الان روی آن هستیم یک کلاس اکتیو قرار میدهیم تا رنگ متفاوتی داشته باشد -->
        <a href="/todolist/index.php?p=<?= $p ?>" class="pagination-counter <?php if ($p == $pageNumber) echo 'pagination-counter-active' ?>"><?= $p ?></a>
      <?php }
      ?>
    </div>
  <?php
  } else {
  ?>
    <div class="guest-user-message-container">
      <h1 class="guest-user-message-title">Hi, For Use Our App, Please Login or Sign-up!</h1>
      <div class="guest-user-message-button-container">
        <a href="./singIn/singIn.php" class="guest-user-message-button">Login</a>
        <a href="./singup/singup.php" class="guest-user-message-button">Sign-up</a>
      </div>
    </div>
  <?php
  }
  ?>
  <script src="./script.js"></script>
</body>

</html>
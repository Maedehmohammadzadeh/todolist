<header class="header-container">
    <a class="header-logo">TODO App</a>
    <ul class="header-menu-items-container">
        <a href="/todolist/index.php" class="header-menu-item">Home</a>
        <?php
        if (isset($_SESSION['user_id'])) {
        ?>
            <a href="/todolist/singIn/logout.php" class="header-menu-item">Logout</a>
            <?php
            if (isset($_SESSION['user_admin'])) {
            ?>
                <span class="header-menu-item">Admin</span>
            <?php
            }
        } else {
            ?>
            <a href="/todolist/singup/singup.php" class="header-menu-item">Sign-Up</a>
            <a href="/todolist/singIn/singIn.php" class="header-menu-item">Login</a>
        <?php
        }
        ?>
    </ul>
</header>
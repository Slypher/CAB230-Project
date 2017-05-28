<div id="navbar">
    <ul class="navbar-item-container">
        <li class="navbar-item"><a class="navbar-link" href="index.php"><span class="fa fa-home"></span> Home</a></li>
        <li class="navbar-item"><a class="navbar-link" href="search.php"><span class="fa fa-search"></span> Search</a></li>
        <?php if (!isset($_SESSION['user'])) echo '<li class="navbar-item"><a class="navbar-link" href="login.php"><span class="fa fa-sign-in"></span> Login</a></li>'; ?>
        <?php if (!isset($_SESSION['user'])) echo '<li class="navbar-item"><a class="navbar-link" href="registration.php"><span class="fa fa-user-plus"></span> Register</a></li>'; ?>
        <?php
            if (isset($_SESSION['user'])) {
                echo '<li class="navbar-item">';
                echo '<form method="POST" action="index.php" class="navbar-link">';
                echo '<button type="submit" name="logout" value="logout" class="navbar-link navbar-logout"><span class="fa fa-sign-out"></span> Logout</button>';
                echo '</form>';
                echo '</li>';
            }
        ?>
    </ul>
</div>
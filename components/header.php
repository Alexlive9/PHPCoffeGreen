<header class="header">
    <div class="flex">
        <a href="home.php" class="logo"><img src="img/logo.jpg" alt="Logo"></a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="products.php">products</a>
            <a href="orders.php">orders</a>
            <a href="about.php">about us</a>
            <a href="contact.php">contact us</a>
        </nav>

        <div class="icons">
            <i class="bx bxs-user" id="user-btn"></i>
            <a href="wishlist.php" class="cart-btn"><i class="bx bx-heart"></i></a>
            <a href="cart.php" class="cart-btn"><i class="bx bx-cart"></i></a>
            <i class="bx bx-list-plus" id="menu-btn"></i>
        </div>

       
        <div class="user-box" id="user-popup">
            <button class="close-btn" id="close-btn">&times;</button>
            <p>Username: <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>Email: <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="login.php" class="btn">Login</a>
            <a href="register.php" class="btn">Register</a>
            <form method="post">
                <button type="submit" name="logout" class="logout-btn">Log Out</button>
            </form>
        </div>
    </div>
</header>




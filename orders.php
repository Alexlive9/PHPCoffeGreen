<?php
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
if (isset($_POST['add_to_wishlist'])) {
    $id = unique_id();
    $product_id = $_POST['product_id'];

   
    $varify_wishlist = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ? AND product_id = ?");
    $varify_wishlist->execute([$user_id, $product_id]);

 
    $cart_num = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
    $cart_num->execute([$user_id, $product_id]);

  
    if ($varify_wishlist->rowCount() > 0) {
        $warning_msg[] = 'Product already exists in your wishlist';
    } else if ($cart_num->rowCount() > 0) {
        $warning_msg[] = 'Product already exists in your cart';
    } else {
        
        $select_price = $conn->prepare("SELECT * FROM products WHERE id = ? LIMIT 1");
        $select_price->execute([$product_id]);
        $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

       
        $insert_wishlist = $conn->prepare("INSERT INTO wishlist (id, user_id, product_id, price) VALUES (?, ?, ?, ?)");
        $insert_wishlist->execute([$id, $user_id, $product_id, $fetch_price['price']]);
        $success_msg[] = 'Product added to wishlist successfully';
    }
}

?>
<style type="text/css">
    <?php include 'style.css'; ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Green - Orders Page</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wkXH6Kvk5JAW7rjNw9OFdy4jO/6M4WY3I1sANiF+D6WJFPzv4j3ztxfaGo4KGx0x" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> <!-- Assuming you have your styles in styles.css -->
</head>
<body>
    <?php include 'components/header.php'; ?>

    <div class="main">
        <div class="banner">
            <h1>My Orders</h1>
        </div>
        <div class="title">
            <a href="home.php">Home</a><span>Orders Shop</span>
        </div>
        <section class="product1">
            <div class="box-container1">
                <div class="title1">
                    <img src="img/download.png" alt="logo">
                    <h1>My Orders</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad recusandae veniam possimus corporis neque nisi doloribus veritatis vero dicta labore.</p>
                </div>
                <?php
                $orders1 = [
                    ['id' => 1, 'date' => '2024-08-01', 'status' => 'delivered', 'product_id' => 101, 'price' => 20, 'qty' => 2],
                    ['id' => 2, 'date' => '2024-08-15', 'status' => 'delivered', 'product_id' => 102, 'price' => 15, 'qty' => 1],
                    ['id' => 3, 'date' => '2024-08-15', 'status' => 'delivered', 'product_id' => 103, 'price' => 10, 'qty' => 1],
                    ['id' => 4, 'date' => '2024-08-15', 'status' => 'delivered', 'product_id' => 104, 'price' => 25, 'qty' => 1],
                    ['id' => 5, 'date' => '2024-08-15', 'status' => 'delivered', 'product_id' => 105, 'price' => 45, 'qty' => 1],
                    ['id' => 6, 'date' => '2024-08-15', 'status' => 'delivered', 'product_id' => 106, 'price' => 60, 'qty' => 1],
                    ['id' => 7, 'date' => '2024-08-15', 'status' => 'delivered', 'product_id' => 107, 'price' => 35, 'qty' => 1],
                    ['id' => 8, 'date' => '2024-08-15', 'status' => 'delivered', 'product_id' => 108, 'price' => 55, 'qty' => 1],



                ];
                
                $products1 = [
                    101 => ['image' => 'blend6.jpg', 'name' => 'Coffee Blend 1'],
                    102 => ['image' => 'blend2.jpg', 'name' => 'Coffee Blend 2'],
                    103 => ['image' => 'blend3.jpg', 'name' => 'Coffee Blend 3'],
                    104 => ['image' => 'blend4.jpg', 'name' => 'Coffee Blend 4'],
                    105 => ['image' => 'cofee green 23.jpg', 'name' => 'Coffee Blend 5'],
                    106 => ['image' => 'cofee green 22.jpg' ,'name' => 'Coffee Blend 6'],
                    107 => ['image' => 'coffe green 20.jpg', 'name' => 'Coffee Blend 7'],
                    108 => ['image' => 'coffe green 21.jpg', 'name' => 'Coffee Blend 8']
                ];

                



                if (count($orders1) > 0) {
                    foreach ($orders1 as $fetch_order) {
                        $product_id = $fetch_order['product_id'];
                        if (isset($products1[$product_id])) {
                            $fetch_product = $products1[$product_id];

                            


                ?>
                <div class="box1" <?php 
                    if ($fetch_order['status'] == 'cancelled') {
                        echo 'style="border: 2px solid #e74c3c;"';
                    } 
                ?>>
                            <p class="date1">
                            <i class="bi bi-calendar-fill"></i>
                            <span><?= $fetch_order['date']; ?></span>
                        </p>
                        <img src="img/<?= $fetch_product['image']; ?>" class="image">
                        <div class="info">
                            <h3 class="name1"><?= $fetch_product['name']; ?></h3>
                            <p class="price1">Price: $<?= $fetch_order['price']; ?> x <?= $fetch_order['qty']; ?></p>
                            <p class="status" style="color:<?php 
                                if ($fetch_order['status'] == 'delivered') { 
                                    echo '#2ecc71'; 
                                } elseif ($fetch_order['status'] == 'cancelled') { 
                                    echo '#e74c3c'; 
                                } else { 
                                    echo '#f39c12'; 
                                } 
                            ?>;">
                                <?= ucfirst($fetch_order['status']); ?>
                            </p>
                        </div>
                    </a>
                </div>
                <?php
                        }
                    }
                } else {
                    echo '<p class="empty">No orders placed yet!</p>';
                }
                ?>
                
            </div>
        </section>
        <?php include 'components/footer.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.1/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>
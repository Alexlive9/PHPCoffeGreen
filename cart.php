<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}


$products = [
    1 => ['id' => 1, 'name' => 'Product 1', 'price' => 10, 'image' => 'img/shop7.jpg'],
    2 => ['id' => 2, 'name' => 'Product 2', 'price' => 20, 'image' => 'img/shop5.jpg'],
    3 => ['id' => 3, 'name' => 'Product 3', 'price' => 30, 'image' => 'img/shop4.jpg'],
    4 => ['id' => 4, 'name' => 'Product 4', 'price' => 25, 'image' => 'img/shop3.jpg'],
    5 => ['id' => 5, 'name' => 'Product 5', 'price' => 42, 'image' => 'img/shop13.jpg'],
    6 => ['id' => 6, 'name' => 'Product 6', 'price' => 28, 'image' => 'img/shop6.jpg'],
    7 => ['id' => 7, 'name' => 'Product 3', 'price' => 30, 'image' => 'img/shop11.png'],
    8 => ['id' => 8, 'name' => 'Product 4', 'price' => 25, 'image' => 'img/shop12.jpg'],
    9 => ['id' => 9, 'name' => 'Product 5', 'price' => 42, 'image' => 'img/shop13.jpg'],

];

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
function unique_id()
{
    return uniqid();
}


if (isset($_POST['add_to_wishlist'])) {
    $product_id = $_POST['product_id'];


    if (in_array($product_id, $_SESSION['wishlist'])) {
        $warning_msg[] = 'Product already exists in your wishlist';
    } elseif (in_array($product_id, array_column($_SESSION['cart'], 'product_id'))) {
        $warning_msg[] = 'Product already exists in your cart';
    } else {
        $_SESSION['wishlist'][] = $product_id;
        $success_msg[] = 'Product added to wishlist successfully';
    }
}

// update product in cart
/*if(isset($_POST['update_cart'])){
    $cart_id = $_POST['cart_id'];
    $cart_id = filter_var($cart_id, FILTER_SANITIZE_STRING);
    $qty = $_POST['qty'];
    $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   
   $update_qty = $conn->prepare("UPDATE cart SET qty = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   
   $success_msg[]= 'cart quantity updated successfully';
   }

*/

if (isset($_POST['update_cart'])) {
    $cart_id = filter_var($_POST['cart_id'], FILTER_SANITIZE_STRING);
    $qty = filter_var($_POST['qty'], FILTER_SANITIZE_STRING);
    if (isset($_SESSION['cart'][$cart_id])) {
        $_SESSION['cart'][$cart_id] = $qty;
        $success_msg[] = 'Cart quantity updated successfully';
    } else {
        $error_msg[] = 'Cart item not found';
    }
}




if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $qty = filter_var($qty, FILTER_SANITIZE_STRING);
    $cart_product_ids = array_column($_SESSION['cart'], 'product_id');
    if (in_array($product_id, $cart_product_ids)) {
        $warning_msg[] = 'Product already exists in your cart';
    } elseif (count($_SESSION['cart']) >= 20) {
        $warning_msg[] = 'Cart is full';
    } else {
        $fetch_price = $products[$product_id];

        $_SESSION['cart'][] = ['product_id' => $product_id, 'qty' => $qty, 'price' => $fetch_price['price']];
        $success_msg[] = 'Product added to cart successfully';
    }
}
if (isset($_POST['delete_item'])) {
    $cart_id = $_POST['cart_id'];
    $product_id = filter_var($product_id, FILTER_SANITIZE_STRING);

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['cart_id'] == $cart_id) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            $success_msg[] = " cart Item deleted successfully";

        } else {
            $warning_msg[] = " cart Item already successfully";

        }



        //-----empty_cart my sql----
        /*if (isset($_POST['empty_cart'])) {
            $verify_empty_item = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
            $verify_empty_item->execute([$user_id]);
        
            if ($verify_empty_item->rowCount() > 0) {
                $delete_cart_id = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
                $delete_cart_id->execute([$user_id]);
                $success_msg[] = "Cart emptied successfully";
            } else {
                $warning_msg[] = "Cart is already empty";
            }
        }
            }
        }
        */

        session_start();

        if (isset($_POST['empty_cart'])) {
            if (isset($_SESSION['cart'][$user_id]) && count($_SESSION['cart'][$user_id]) > 0) {
                $_SESSION['cart'][$user_id] = [];
                $success_msg[] = "Cart emptied successfully";
            } else {
                $warning_msg[] = "Cart is already empty";
            }
        }
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
    <title>Coffe Green - cart details</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wkXH6Kvk5JAW7rjNw9OFdy4jO/6M4WY3I1sANiF+D6WJFPzv4j3ztxfaGo4KGx0x" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> <!-- Assuming you have your styles in styles.css -->
    <style>
    </style>
</head>

<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>my wishlist</h1>
        </div>
        <div class="title2">
            <a href="home.php">Home</a><span>cart</span>
        </div>
        <section class="products">
            <h1 class="title">products in cart</h1>
            <div class="page">
                <div class="box-container">
                    <?php
                    $grand_total = 0;
                    /* ------my sql------
                    $select_cart = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
                    $select_cart->execute([$user_id]);
                    if ($select_cart->rowCount() > 0) {
                        while ($wishlist_item = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                            $select_products = $conn->prepare("SELECT * FROM products WHERE id= ?");
                            $select_products->execute([$fetch_cart['product_id']]);
                            if ($select_products->rowCount() > 0) {
                                $fetch_products = $select_products->fetch(PDO::FETCH_ASSOC);
                                ?>
                      */

                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $cart_item) {
                            $product_id = $cart_item['product_id'];
                            $fetch_product = $products[$product_id];
                            if ($fetch_product) {
                                ?>
                                <form method="post" action="" class="box">
                                    <input type="hidden" name="product_id" value="<?= $product_id; ?>">
                                    <img src="<?= $fetch_product['image']; ?>" class="img">
                                    <h3 class="name">
                                        <?= $fetch_product['name']; ?>
                                    </h3>
                                    <div class="flex">
                                        <p class="price">price $
                                            <?= $fetch_product['price']; ?>/-
                                        </p>
                                        <input type="number" name="qty" required min="1" value="<?= $cart_item['qty']; ?>" max="99"
                                            maxlength="2" class="qty">
                                        <button type="submit" name="update_cart" class="bx bxs-edit fa-edit"></button>
                                    </div>
                                    <p class="sub-total">sub total: <span>$
                                            <?= $sub_total = ($cart_item['qty'] * $cart_item['price']); ?>
                                        </span></p>
                                    <button type="submit" name="delete_item" class="btn"
                                        onclick="return confirm('Delete this item?')">delete</button>
                                </form>
                                <?php
                                $grand_total += $sub_total;
                            } else {
                                echo '<p class="empty">Product not found!</p>';
                            }
                        }
                    } else {
                        echo '<p class="empty">No products added yet!</p>';
                    }
                    ?>
                </div>
            </div>


            <?php
            if ($grand_total != 0) {

                ?>
                <div class="cart-total">
                    <p>total amount payable : <span>$
                            <?= $grand_total; ?>
                        </span></p>
                </div>

                <div class="button-container">
                    <form method="post" style="display: inline-block;">
                        <button type="submit" name="empy_cart" class="btn"
                            onclick="return confirm('are you sure to empty your cart')">
                            empty cart
                        </button>
                    </form>

                    <a href="checkout.php" class="btn">proceed to checkout</a>
                </div>


            <?php } ?>

        </section>

        <?php include 'components/footer.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.1/sweetalert.min.js"></script>
    <script src="script.js"></script>

    <?php include 'components/alert.php'; ?>
</body>

</html>
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


if (isset($_POST['place_order'])) {
    
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

   
    $number = $_POST['number'];

  
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    
    $address = $_POST['flat'] . ', ' . $_POST['building'] . ',' . $_POST['city'] . ',' . $_POST['country'] . ',' . $_POST['pincode'];
    $address = filter_var($address, FILTER_SANITIZE_STRING);

  
    $address_type = $_POST['address_type'];
    $address_type = filter_var($address_type, FILTER_SANITIZE_STRING);

    
    $method = $_POST['method'];
    $method = filter_var($method, FILTER_SANITIZE_STRING);

    
    $varify_cart = $conn->prepare("SELECT * FROM cart WHERE user_id=?");
    $varify_cart->execute([$user_id]);

    
    if (isset($_GET['get_id'])) {
        $get_product = $conn->prepare("SELECT * FROM products WHERE id = ? LIMIT 1");
        $get_product->execute([$_GET['get_id']]);

        if ($get_product->rowCount() > 0) {
           
            while ($fetch_p = $get_product->fetch(PDO::FETCH_ASSOC)) {
                $insert_order = $conn->prepare("INSERT INTO orders(id, user_id, name, number, email, address, address_type, method, product_id, price, qty) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                $insert_order->execute([uniqid(), $user_id, $name, $number, $email, $address, $address_type, $method, $fetch_p['id'], $fetch_p['price'], 1]);
                header('location: order.php'); 
            }
        } else {
            $warning_msg[] = 'something went wrong'; 
        }
    } 
    
    elseif ($varify_cart->rowCount() > 0) {
        
        while ($f_cart = $varify_cart->fetch(PDO::FETCH_ASSOC)) {
            $insert_order = $conn->prepare("INSERT INTO orders(id, user_id, name, number, email, address, address_type, method, product_id, price, qty) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $insert_order->execute([uniqid(), $user_id, $name, $number, $email, $address, $address_type, $method, $f_cart['id'], $f_cart['price'], $f_cart['qty']]);
            header('location: order.php'); 
        }

        
        if ($insert_order) {
            $delete_cart_id = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
            $delete_cart_id->execute([$user_id]);
            header('location: order.php'); 
        } else {
            $warning_msg[] = 'something went wrong';
        }
    }
}


/*
$conn = new PDO("mysql:host=localhost;dbname=your_db", "username", "password");
*/
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
    <title>Green Coffee - Checkout Page</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wkXH6Kvk5JAW7rjNw9OFdy4jO/6M4WY3I1sANiF+D6WJFPzv4j3ztxfaGo4KGx0x" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> <!-- Assuming you have your styles in styles.css -->
</head>

<body>
    <?php include 'components/header.php'; ?>

    <div class="main">
        <div class="banner">
            <h1>Checkout Summary</h1>
        </div>
        <div class="title2">
            <a href="home.php">Home</a><span>Checkout Summary</span>
        </div>
        <section class="checkout">
            <div class="title">
                <img src="img/download.png" class="logo">
                <h1>Checkout Summary</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores, aliquam facilis non est amet odit assumenda at architecto, tempora sint voluptatum alias ipsum ab minus beatae quo saepe id, nihil velit! Facere numquam rem voluptas ipsa deleniti mollitia maxime voluptatibus vero? Sit assumenda ipsam officiis amet iste beatae quidem nulla, temporibus a odio distinctio quaerat nostrum suscipit alias! Facere?</p>
            </div>

            <div class="row">
                <form method="post" id="orderForm">
                    <h3>Billing Details</h3>
                    <div class="flex">
                        <div class="box">
                            <div class="input-field">
                                <p>Your Name <span>*</span>
                                    <input type="text" name="name" required maxlength="50" placeholder="Enter Your Name" class="input">
                                </p>
                            </div>
                            <div class="input-field">
                                <p>Your Number <span>*</span>
                                    <input type="text" name="number" required maxlength="20" placeholder="Enter Your Number" class="input">
                                </p>
                            </div>
                            <div class="input-field">
                                <p>Your Email <span>*</span>
                                    <input type="text" name="email" required maxlength="40" placeholder="Enter Your Email" class="input">
                                </p>
                            </div>
                            <div class="input-field">
                                <p>Payment Method <span>*</span>
                                    <select name="method" class="input">
                                        <option value="cash on delivery">Cash on Delivery</option>
                                        <option value="credit or debit card">Credit or Debit Card</option>
                                        <option value="net banking card">Net Banking Card</option>
                                        <option value="UPI or RuPay">UPI or RuPay</option>
                                        <option value="paytm">Paytm</option>
                                    </select>
                                </p>
                            </div>
                            <div class="input-field">
                                <p>Address Type <span>*</span>
                                    <select name="address_type" class="input">
                                        <option value="home">Home</option>
                                        <option value="office">Office</option>
                                    </select>
                                </p>
                            </div>
                        </div>

                        <div class="box">
                            <div class="input-field">
                                <p>Address Line 01 <span>*</span>
                                    <input type="text" name="flat" required maxlength="40" placeholder="e.g flat & building number" class="input">
                                </p>
                            </div>
                            <div class="input-field">
                                <p>City Name <span>*</span>
                                    <input type="text" name="city" required maxlength="40" placeholder="Enter Your City Name" class="input">
                                </p>
                            </div>
                            <div class="input-field">
                                <p>Country Name <span>*</span>
                                    <input type="text" name="country" required maxlength="40" placeholder="Enter Your Country Name" class="input">
                                </p>
                            </div>
                            <div class="input-field">
                                <p>Pincode <span>*</span>
                                    <input type="text" name="pincode" required maxlength="6" placeholder="110022" min="0" max="99999" class="input">
                                </p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="place_order" class="btn" id="placeOrderButton">Place Order</button>
                </form>

                <div class="summary">
                    <h3>My Bag</h3>
                    <div class="box-container">
                        <?php
                        $grand_total = 0;
                       
                        if (isset($_GET['get_id'])) {
                            //Database query commented out
                            // $select_get = $conn->prepare("SELECT * FROM products WHERE id=?");
                            // $select_get->execute([$_GET['get_id']]);
                          
                            $fetch_get = [
                                'image' => 'example-product.jpg',
                                'name' => 'Green Coffee Beans',
                                'price' => 50
                            ];
                            $sub_total = $fetch_get['price'];
                            $grand_total += $sub_total;
                        ?>
                            <div class="flex">
                                <img src="img/<?=$fetch_get['image'];?>" class="image">
                                <div>
                                    <h3 class="name"><?=$fetch_get['name'];?></h3>
                                    <p class="price">$<?=$fetch_get['price'];?></p>
                                </div>
                            </div>
                        <?php
                        } else {
                            //Database query commented out
                            // $select_cart = $conn->prepare("SELECT * FROM cart WHERE user_id=?");
                            // $select_cart->execute([$user_id]);
                         
                            $cart = [
                                [
                                    'image' => 'green cofee.jpg',
                                    'name' => 'Green Coffee Beans - 1kg',
                                    'price' => 30,
                                    'qty' => 1
                                ],
                                
                                [
                                    'image' => 'lemon.jpg',
                                    'name' => 'Lemon Coffee Beans - 500g',
                                    'price' => 20,
                                    'qty' => 2
                                ],

                                
                                [
                                    'image' => 'minty.jpg',
                                    'name' => 'minty Coffee Beans - 2g',
                                    'price' => 40,
                                    'qty' => 3
                                ],

                            ];

                            if (!empty($cart)) {
                                foreach ($cart as $item) {
                                    $sub_total = ($item['qty'] * $item['price']);
                                    $grand_total += $sub_total;
                        ?>
                                    <div class="flex">
                                        <img src="img/<?=$item['image'];?>" class="image">
                                        <div>
                                            <h3 class="name"><?=$item['name'];?></h3>
                                            <p class="price">$<?=$item['price'];?> x <?=$item['qty'];?></p>
                                        </div>
                                    </div>
                        <?php
                                }
                            } else {
                                echo '<p class="empty">Your cart is empty</p>';
                            }
                        }
                        ?>
                    </div>
                    <div class="grand-total"><span>Total Amount Payable:</span>$<?=$grand_total;?></div>
                </div>
            </div>
        </section>

        <?php include 'components/footer.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.1/sweetalert.min.js"></script>
    <script>
        document.getElementById('orderForm').addEventListener('submit', function (e) {
            e.preventDefault();

          
            swal({
                title: "Your order has been completed!",
                text: "Thanks for your purchase! Your order has been successfully completed.",
                icon: "success",
                button: "Ок"
            }).then(() => {
              
                e.target.submit();
            });
        });
    </script>
</body>

</html>

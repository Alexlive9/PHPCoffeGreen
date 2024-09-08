<?php
include 'connection.php';
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
    <title>Coffee Green - About Us Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wkXH6Kvk5JAW7rjNw9OFdy4jO/6M4WY3I1sANiF+D6WJFPzv4j3ztxfaGo4KGx0x" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> <!-- Assuming you have your styles in styles.css -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

</head>

<body>
    <?php include 'components/header.php'; ?>

    <div class="main">
        <div class="banner">
            <h1>About Us</h1>
        </div>
        <div class="title2">
            <a href="home.php">Home</a><span>About</span>
        </div>
        <div class="about-category">
            <div class="box">
                <img src="img/3.webp" alt="">
                <div class="detail">
                    <span>Coffee</span>
                    <h1>Lemon Green</h1>
                    <a href="products.php" class="btn">Shop Now</a>
                </div>
            </div>

            <div class="box">
                <img src="img/about.png" alt="">
                <div class="detail">
                    <span>Coffee</span>
                    <h1>Lemon Tea</h1>
                    <a href="products.php" class="btn">Shop Now</a>
                </div>
            </div>

            <div class="box">
                <img src="img/2.webp" alt="">
                <div class="detail">
                    <span>Coffee</span>
                    <h1>Lemon Tea</h1>
                    <a href="products.php" class="btn">Shop Now</a>
                </div>
            </div>

            <div class="box">
                <img src="img/1.webp" alt="">
                <div class="detail">
                    <span>Coffee</span>
                    <h1>Lemon Green</h1>
                    <a href="products.php" class="btn">Shop Now</a>
                </div>
            </div>
        </div>

        <section class="services">
            <div class="title">
                <img src="img/download.png" class="logo">
                <h1>Why Choose Us</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis aperiam dignissimos ipsam fuga
                    voluptate sint!</p>
            </div>
            <div class="box-container">
                <div class="box">
                    <img src="img/icon2.png" alt="">
                    <div class="detail">
                        <h3>Great Savings</h3>
                        <p>Save big on every order</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/icon1.png" alt="">
                    <div class="detail">
                        <h3>24/7 Support</h3>
                        <p>One-on-one support</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/icon0.png" alt="">
                    <div class="detail">
                        <h3>Gift Vouchers</h3>
                        <p>Vouchers on every festival</p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/icon.png" alt="">
                    <div class="detail">
                        <h3>Worldwide Delivery</h3>
                        <p>Drop shipping worldwide</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="about">
            <div class="row">
                <div class="img-box">
                    <img src="img/3.png" alt="">
                </div>
                <div class="detail">
                    <h1>Visit Our Beautiful Showroom</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed cum beatae aperiam modi consectetur
                        aliquid amet nobis minus ullam. Cum sapiente fugit deserunt quidem molestiae sed assumenda
                        accusamus omnis culpa?</p>
                    <a href="products.php" class="btn">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="testimonial-container">
            <div class="title">
                <img src="img/download.png" alt="logo">
                <h1>what people say about us</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut molestiae reiciendis saepe, blanditiis
                    eligendi harum beatae odio hic aliquid praesentium!</p>
            </div>

            <div class="container">
                <div class="testimonial-item active">
                    <img src="img/01.jpg" alt="">
                    <h1>sara smith</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt id corporis, saepe
                        necessitatibus tempora aliquam ipsam unde, neque dolorum deserunt dolores mollitia commodi, fuga
                        assumenda voluptas amet! Delectus omnis saepe error reprehenderit nulla impedit ad itaque
                        nostrum expedita? Non, aperiam. Deleniti pariatur id sit ex, ut excepturi suscipit minus
                        aliquam!</p>
                </div>

                <div class="testimonial-item">
                    <img src="img/02.jpg" alt="">
                    <h1>alex smith</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt id corporis, saepe
                        necessitatibus tempora aliquam ipsam unde, neque dolorum deserunt dolores mollitia commodi, fuga
                        assumenda voluptas amet! Delectus omnis saepe error reprehenderit nulla impedit ad itaque
                        nostrum expedita? Non, aperiam. Deleniti pariatur id sit ex, ut excepturi suscipit minus
                        aliquam!</p>
                </div>

                <div class="testimonial-item">
                    <img src="img/03.jpg" alt="">
                    <h1>selena ansari</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt id corporis, saepe
                        necessitatibus tempora aliquam ipsam unde, neque dolorum deserunt dolores mollitia commodi, fuga
                        assumenda voluptas amet! Delectus omnis saepe error reprehenderit nulla impedit ad itaque
                        nostrum expedita? Non, aperiam. Deleniti pariatur id sit ex, ut excepturi suscipit minus
                        aliquam!</p>
                </div>

                <div class="left-arrow" onclick="prevSlide()"><i class="bx bxs-left-arrow-alt"></i></div>
                <div class="right-arrow" onclick="nextSlide()"><i class="bx bxs-right-arrow-alt"></i></div>
            </div>
        </div>


        <?php include 'components/footer.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.1/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>

</body>

</html>
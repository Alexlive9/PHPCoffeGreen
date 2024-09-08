<?php
include 'connection.php';
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location:login.php");
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
    <title>Coffe Green</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />



</head>

<body>
    <?php include 'components/header.php'; ?>


    <div class="main">

        <div class="home-section">
            <div class="slider_slider slider1">
                <div class="overlay"></div>
                <div class="slide-detail">
                    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum, perspiciatis.</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae et doloremque animi dolorum a
                        ipsa modi adipisci illum ea? Laborum consequatur eaque illum, vel labore ducimus sequi eligendi
                        iusto nihil.</p>
                    <a href="products.php" class="btn">shop now</a>
                </div>
                <div class="hero-dec-top"></div>
                <div class="hero-dec-bottom"></div>
            </div>
            <!----------slide end----->
            <div class="slider_slider slider2">
                <div class="overlay"></div>
                <div class="slide-detail">
                    <h1>welcome to my shop</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam in dolorum ea iure
                        pariatur?</p>
                    <a href="products.php" class="btn">shop now</a>
                </div>
                <div class="hero-dec-top"></div>
                <div class="hero-dec-bottom"></div>
            </div>
            <!----------slide end----->
            <div class="slider_slider slider3">
                <div class="overlay"></div>
                <div class="slide-detail">
                    <h1>welcome to my shop</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam in dolorum ea iure
                        pariatur?</p>
                    <a href="products.php" class="btn">shop now</a>
                </div>
                <div class="hero-dec-top"></div>
                <div class="hero-dec-bottom"></div>
            </div>
            <!----------slide end----->
            <div class="slider_slider slider4">
                <div class="overlay"></div>
                <div class="slide-detail">
                    <h1>welcome to my shop</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam in dolorum ea iure
                        pariatur?</p>
                    <a href="products.php" class="btn">shop now</a>
                </div>
                <div class="hero-dec-top"></div>
                <div class="hero-dec-bottom"></div>
            </div>
            <!----------slide end----->
            <div class="slider_slider slider5">
                <div class="overlay"></div>
                <div class="slide-detail">
                    <h1>welcome to my shop</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam in dolorum ea iure
                        pariatur?</p>
                    <a href="products.php" class="btn">shop now</a>
                </div>
                <div class="hero-dec-top"></div>
                <div class="hero-dec-bottom"></div>
            </div>
            <!----------slide end----->
            <div class="left-arrow"><i class="bx-bxs-left-arrow"></i></div>
            <div class="right-arrow"><i class="bx-bxs-right-arrow"></i></div>
        </div>
        <!---------- New slide end----->
        <section class="thumb">
            <div class="box-container">
                <div class="box">
                    <img src="img/thumb2.jpg" alt="">
                    <h3>green Tea</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam in dolorum ea iure
                        pariatur?</p>
                    <i class="bx bx-chevron-right"></i>
                </div>

                <div class="box">
                    <img src="img/thumb0.jpg" alt="">
                    <h3>lemon Tea</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam in dolorum ea iure
                        pariatur?</p>
                    <i class="bx bx-chevron-right"></i>
                </div>

                <div class="box">
                    <img src="img/thumb1.jpg" alt="">
                    <h3>green coffee</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam in dolorum ea iure
                        pariatur?</p>
                    <i class="bx bx-chevron-right"></i>
                </div>

                <div class="box">
                    <img src="img/thumb.jpg" alt="">
                    <h3>green Tea</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quisquam in dolorum ea iure
                        pariatur?</p>
                    <i class="bx bx-chevron-right"></i>
                </div>


            </div>

    </div>

    <section>

        <div class="box-container">
            <div class="box">

                <img src="img/about-us.jpg" alt="">


            </div>
            <div class="box">
                <img src="img/download.png" alt="">
                <span>healthy tea</span>
                <h1>save up to 50% off</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio nemo quisquam aliquid dolorem. Nisi
                    repellendus delectus esse dolorem laborum inventore totam mollitia molestiae. Dolorem, saepe at
                    dignissimos rerum explicabo, repudiandae labore aspernatur fuga reiciendis nulla perspiciatis aut
                    pariatur est quia.</p>
                <img src="img/coffe login2.png" alt="">
            </div>
        </div>
    </section>
    <section>
        <div class="shop">
            <div class="title">
                <img src="img/download.png" alt="">
                <h1>Trending Products</h1>
            </div>
            <div class="row">
                <img src="img/about.jpg" alt="">
                <div class="row-detail">
                    <img src="img/basil.jpg" alt="">
                    <div class="top-footer">
                        <h1> a cup of green tea makes you healthy</h1>
                    </div>
                </div>
            </div>
            <div class="box-container">
                <div class="box">
                    <img src="img/card.jpg" alt="">
                    <a href="products.php" class="btn">shop now</a>
                </div>

                <div class="box">
                    <img src="img/card0.jpg" alt="">
                    <a href="products.php" class="btn">shop now</a>
                </div>

                <div class="box">
                    <img src="img/card1.jpg" alt="">
                    <a href="products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="img/card2.jpg" alt="">
                    <a href="products.php" class="btn">shop now</a>
                </div>

                <div class="box">
                    <img src="img/10.jpg" alt="">
                    <a href="products.php" class="btn">shop now</a>
                </div>

                <div class="box">
                    <img src="img/6.webp" alt="">
                    <a href="products.php" class="btn">shop now</a>
                </div>
            </div>
        </div>
    </section>
    <section class="shop-category">
        <div class="box-container">
            <div class="box">
                <img src="img/6.jpg" alt="">
                <div class="detail">
                    <span>BIG OFFERS</span>
                    <h1>Extra 15% off</h1>
                    <a href="products.php" class="btn">shop now</a>
                </div>
            </div>
            <div class="box">
                <img src="img/7.jpg" alt="">
                <div class="detail">
                    <span>new in taste</span>
                    <h1>coffee house</h1>
                    <a href="products.php" class="btn">shop now</a>
                </div>
            </div>
        </div>
    </section>
    <section class="services">
        <div class="box-container">
            <div class="box">
                <img src="img/icon2.png" alt="">
                <div class="detail">
                    <h3>great savings</h3>
                    <p>save big every order</p>
                </div>
            </div>
            <div class="box">
                <img src="img/icon1.png" alt="">
                <div class="detail">
                    <h3>24*7 support</h3>
                    <p>one-on-one support</p>
                </div>
            </div>
            <div class="box">
                <img src="img/icon0.png" alt="">
                <div class="detail">
                    <h3>gift vouchers</h3>
                    <p>vouchers on every festivals</p>
                </div>
            </div>
            <div class="box">
                <img src="img/icon.png" alt="">
                <div class="detail">
                    <h3>worldwide delivery</h3>
                    <p>dropship worldwide</p>
                </div>
            </div>
        </div>
    </section>

    <section class="brand">
        <div class="box-container">
            <div class="box">
                <img src="img/brand (1).jpg" alt="">
            </div>
            <div class="box">
                <img src="img/brand (2).jpg" alt="">
            </div>
            <div class="box">
                <img src="img/brand (3).jpg" alt="">
            </div>
            <div class="box">
                <img src="img/brand (4).jpg" alt="">
            </div>
            <div class="box">
                <img src="img/brand (5).jpg" alt="">
            </div>
        </div>
    </section>
    <?php include 'components/footer.php'; ?>
    </div>

    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.1/sweetalert.min.js"></script>



    <?php include 'components/alert.php'; ?>


</body>

</html>
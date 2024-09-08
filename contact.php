<?php
include 'connection.php';

include 'connection.php';
session_start();
if(isset($_SESSION['user_id'])){
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
          <title>Coffee Green - Contact Us Page</title>

          <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-wkXH6Kvk5JAW7rjNw9OFdy4jO/6M4WY3I1sANiF+D6WJFPzv4j3ztxfaGo4KGx0x" crossorigin="anonymous">
          <link rel="stylesheet" href="styles.css"> <!-- Assuming you have your styles in styles.css -->
      </head>
      
      <body>
          <?php include 'components/header.php'; ?>
      
          <div class="main">
              <div class="banner">
                  <h1>Contact us</h1>
              </div>
              <div class="title2">
                  <a href="home.php">Home</a><span>Contact us</span>
              </div>
      
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
      <div class="form-container">
                  <form method="post" id="contactForm">
                      <div class="title">
                          <img src="img/download.png" alt="logo">
                          <h1>leave a message</h1>
                      </div>
      
                      <div class="input-field">
                          <p>your name</p>
                          <input type="text" name="name" required>
                      </div>
      
                      <div class="input-field">
                          <p>your email </p>
                          <input type="email" name="email" required>
                      </div>
      
                      <div class="input-field">
                          <p>your number </p>
                          <input type="text" name="number" required>
                      </div>
      
                      <div class="input-field">
                          <p>your message </p>
                          <textarea name="message" cols="30" rows="10" required></textarea>
                      </div>
      
                      <button type="submit" name="submit-btn" class="btn">send message</button>
                  </form>
                  <div class="address">
                      <div class="title">
                          <img src="img/download.png" alt="logo">
                          <h1>Contact detail</h1>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure corporis magni sint aliquid veniam
                              cupiditate labore et vitae deleniti nesciunt distinctio libero, repudiandae sunt laudantium
                              dolores perspiciatis quibusdam facere obcaecati, voluptatibus, ratione nihil laboriosam.
                              Voluptas.</p>
                      </div>
                      <div class="box">
                          <i class="bx bxs-map-pin"></i>
                          <div>
                              <h4>Address</h4>
                              <p>1092 Merigold Lane, Coral Way</p>
                          </div>
                      </div>
                      <div class="box">
                          <i class="bx bxs-phone"></i>
                          <div>
                              <h4>Phone Number</h4>
                              <p>+37379783045</p>
                          </div>
                      </div>
                      <div class="box">
                          <i class="bx bxs-envelope"></i>
                          <div>
                              <h4>Email</h4>
                              <p>ciobanualexandru743@gmail.com</p>
                          </div>
                      </div>
                  </div>
      
                 
              </div>
      
              <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.1/sweetalert.min.js"></script>
<script>

              document.getElementById('contactForm').addEventListener('submit', function (event) {
                      event.preventDefault(); 
      
                      swal("Message sent", "Your message has been sent successfully.!", "success"); 
      
                      
                  });


                  </script>


      
      <?php include 'components/alert.php'; ?>
      <?php include 'components/footer.php'; ?>
      </body>
      
      </html>
      





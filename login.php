<?php 
include 'connection.php'; 
session_start();
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
}


if(isset($_POST['submit'])) {
  $id = unique_id();
  
  $email = $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_STRING);
  $pass = $_POST['pass'];
  $pass = filter_var($pass, FILTER_SANITIZE_STRING);
  $cpass = $_POST['cpass'];
  $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

  $select_user = $conn->prepare("SELECT * FROM `users` WHERE email AND password = ?");
  $select_user->execute([$email,$pass]);
  $row = $select_user->fetch(PDO::FETCH_ASSOC);

  if($select_user->rowCount() >0){
     $_SESSION['user_id'] = $row['id'];
     $_SESSION['user_name'] = $row['name'];
     $_SESSION['user_email'] = $row['email'];
     header('location: home.php');
}else{
  $message[] = 'incorrect username or password';



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
    <title>Green Сoffe - Register Now</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

</head>
<body>
    <div class="form-container">
        <section class="form-section">
            <div class="title">
                <h1>Register Now</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, perspiciatis?</p>
            </div>
            <form id="register-form">
                <div class="input-field">
                    <p>Your Name</p>
                    <input type="text" name="name" required placeholder="Enter your name" maxlength="50">
                </div>

                <div class="input-field">
                    <p>Your Email</p>
                    <input type="email" name="email" required placeholder="Enter your email" maxlength="50">
                </div>

                <div class="input-field">
                    <p>Your Password</p>
                    <input type="password" name="password" required placeholder="Enter your password" maxlength="50">
                </div>

                <input type="submit" value="Register Now" class="btn">
                <p>Already have an account? <a href="login.php">Login Now</a></p>
            </form>
        </section>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        document.getElementById('register-form').addEventListener('submit', function(event) {
            event.preventDefault();
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Your registration was successful!',
                showConfirmButton: true,
                timer: 3000
            });

        });
    </script>
</body>
</html>

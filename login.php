<?php 

session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
  header('location:account.php');
  exit;
}

if (isset($_POST['login_btn'])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']); // password _hash, password_verify

    $stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email=? AND user_password=? LIMIT 1");

    $stmt->bind_param('ss',$email,$password);

  if($stmt->execute()) {

      $stmt->bind_result($user_id,$username,$user_email,$user_password);
      $stmt->store_result();

        if ($stmt->num_rows() == 1) {

          $stmt->fetch();

          // save all data in session
          $_SESSION['user_id'] = $user_id;
          $_SESSION['user_name'] = $user_name;
          $_SESSION['user_email'] = $user_email;
          $_SESSION['login_in'] = true;

          header('location: account.php?message=logged in successfully');

        }else {
          //error
          header('location: login.php?error=something went wrong');
        
        }

    } else {
      
      header('location: login.php?error=something went wrong');

    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
      <div class="container">
        <img class="logo" src="assets/imgs/logo.jpeg" alt="logo" />
        <h2 class="brand">Minna</h2>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse nav-buttons"
          id="navbarSupportedContent"
        >
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop.php">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item">
              <a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a>
              <a href="account.php"><i class="fa-solid fa-user"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--End nav-->

    <!--Strat login -->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Login</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container">
        <p style="color:red" class="text-center"> <?php if(isset($_GET['error'])) {echo $_GET['error'];}?></p>
        <form id="login-form" method="post" action="login.php">
          <div class="form-group">
            <label for="">Email</label>
            <input
              type="text"
              class="form-control"
              id="login-email"
              name="email"
              placeholder="Email"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input
              type="password"
              class="form-control"
              id="login-password"
              name="password"
              placeholder="Password"
              required
            />
          </div>
          <div class="form-group">
            <input type="submit" class="btn" id="login-btn" name="login_btn" value="login" />
          </div>
          <div class="form-group">
            <a id="register-url" class="btn" href="register.php"
              >Don't have account? Register</a
            >
          </div>
        </form>
      </div>
    </section>

    <!--End login -->
    <!--Footer-->
    <footer class="mt-5 py-5">
      <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-3 col-sm-12">
          <img class="logo" src="assets/imgs/logo.jpeg" alt="logo" />
          <p class="pt-3">We are provide the best products</p>
        </div>
        <div class="footer-one col-lg-3 col-md-3 col-sm-12">
          <h5 class="pb-2">Features</h5>
          <ul class="text-uppercase">
            <li><a href="#">men</a></li>
            <li><a href="#">women</a></li>
            <li><a href="#">boys</a></li>
            <li><a href="#">girls</a></li>
            <li><a href="#">clothes</a></li>
          </ul>
        </div>
        <div class="footer-one col-lg-3 col-md-3 col-sm-12">
          <h5 class="pb-2">contact us</h5>
          <div>
            <h6 class="text-uppercase">Adress</h6>
            <p>1234 street wilshon, mycity</p>
          </div>
          <div>
            <h6 class="text-uppercase">Phone</h6>
            <p>023668844</p>
          </div>
          <div>
            <h6 class="text-uppercase">email</h6>
            <p>sjas@msahs.ksj</p>
          </div>
        </div>
        <div class="footer-one col-lg-3 col-md-3 col-sm-12">
          <h5 class="pb-2">instagram</h5>
          <div class="row">
            <img
              src="assets/imgs/featured1.jpeg"
              class="img-fluid w-25 h-100 m2"
              alt=""
            />
            <img
              src="assets/imgs/featured2.jpeg"
              class="img-fluid w-25 h-100 m2"
              alt=""
            />
            <img
              src="assets/imgs/featured3.jpeg"
              class="img-fluid w-25 h-100 m2"
              alt=""
            />
            <img
              src="assets/imgs/featured4.jpeg"
              class="img-fluid w-25 h-100 m2"
              alt=""
            />
            <img
              src="assets/imgs/clothes1.jpeg"
              class="img-fluid w-25 h-100 m2"
              alt=""
            />
          </div>
        </div>
      </div>
      <div class="copyright mt-5">
        <div class="row container mx-auto">
          <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <img src="assets/imgs/payment.jpeg" alt="payment" />
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 mb-4 text-nowrap mb-2">
            <p>ecommerce @ 2022 All Right reserved</p>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
          </div>
        </div>
      </div>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

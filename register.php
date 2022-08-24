<?php

session_start();

include ('server/connection.php');
  // if user has already registerd then take user to account page
if (isset($_SESSION['logged_in'])) {
    
    header('location: account.php');
    exit;
}

if (isset($_POST['register'])) {
    
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmpassword'];

  // if password not match
  if ($password !== $confirmPassword) {
    
    header("location: register.php?error=passwords dont match");

  // if password less than 6 char

} else if(strlen ($password < 6)) {
  
    header("location: register.php?error=password must be at least  6 characters");

// ifthere is no error
} else {
// we check if user has account or not

$stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");

$stmt1->bind_param('s',$email);
$stmt1->execute();
$stmt1->bind_result($num_rows);
$stmt1->store_result();// without it code not work
$stmt1->fetch();


// if there is user alrady register with email
if ($num_rows != 0) {

  header("location: register.php?error=user with this email already exist");

}else { // if no user register with yhis email

//create a user
    $stmt = $conn->prepare("INSERT INTO USERS (user_name, user_email, user_password)

                    VALUES (?,?,?);");
    $stmt->bind_param('sss',$name,$email,md5($password));

    
    // if account was created successfully
    if ($stmt->execute()) {
        $user_id = $stmt->insert_id; //Returns the value generated for an AUTO_INCREMENT column by the last query
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['logged_in'] = true;
        header('location: account.php?register_success=You registerd successfully'); 

      // if account could not created
    }else {

    header('location: register.php?error=could not craete an account at the moment');
    
      }
    }
    
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
              <a class="nav-link" href="shop.html">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
            <li class="nav-item">
              <a href="cart.html"
                ><i class="fa-solid fa-basket-shopping"></i
              ></a>
              <a href="account.html"><i class="fa-solid fa-user"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--End nav-->

    <!--Strat register -->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Register</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container">
        <p style = "color: red;"><?php if (isset($_GET['error'])) {echo $_GET['error'];}?></p>
        <form id="register-form" method="post" action="register.php">
          <div class="form-group">
            <label for="">Name</label>
            <input
              type="text"
              class="form-control"
              id="register-name"
              name="name"
              placeholder="Name"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input
              type="text"
              class="form-control"
              id="register-email"
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
              id="register-password"
              name="password"
              placeholder="Password"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Confirm Password</label>
            <input
              type="password"
              class="form-control"
              id="register-confirm-password"
              name="confirmpassword"
              placeholder="Confirm Password"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="submit"
              class="btn"
              id="register-btn"
              value="Register"
              name="register"
            />
          </div>
          <div class="form-group">
            <a id="login-url" class="btn" href="login.php"
              >do you have an account? Login</a
            >
          </div>
        </form>
      </div>
    </section>

    <!--End Register -->
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

<?php
//for sure that user is login
session_start();
include('server/connection.php');

if(!isset($_SESSION['logged_in'])) {
  header('location: login.php');
  exit;
}

if (isset($_GET['logout'])) {
  if (isset($_SESSION['logged_in'])) {
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit;

  }
}

if (isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $user_email = $_SESSION['user_email'];
    if ($password !== $confirmPassword) {
        
        header("location: account.php?error=passwords dont match");

      // if password less than 6 char

    } else if(strlen($password < 6)) {
      
        header("location: account.php?error=password must be at least  6 characters");
    } else {
  
      $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
        $stmt->bind_param('ss',md5($password) ,$user_email);

      if ($stmt->execute()) {

          header('location: account.php?message=passsword has been updated successfully');
      
    } else {

          header('location: account.php?error=passsword has not been updated');

    }
 }
}

//gets order

if ($_SESSION['logged_in']) {
  
  $user_id = $_SESSION['user_id'];
  $stmt = $conn->prepare("SELECT * FROM orders where user_id = ?");
  $stmt->bind_param('i',$user_id);
  $stmt->execute();
  $orders = $stmt->get_result(); // this give an array of orders


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

    <!--Strat Account -->
    <section class="my-5 py-5">
      <div class="row container">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
        <p class="text-center" style="color: green;"> <?php if (isset($_GET['register_success'])) { echo $_GET['register_success'];}?> </?>
        <p class="text-center" style="color: green;"> <?php if (isset($_GET['loggin_success'])) { echo $_GET['loggin_success'];}?> </?>

          <h3 class="font-weight-bold">Account info</h3>
          <hr class="mx-auto" />
          <div class="account-info">
            <p>Name <span><?php if (isset($_SESSION['user_name'])) { echo $_SESSION['user_name'];}?></span></p>
            <p>Email <span><?php if (isset($_SESSION['user_email'])) { echo $_SESSION['user_email'];}?></span></p>
            <p><a href="#orders " id="order-btn"> Your orders</a></p>
            <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <form id="account-form" method="post" action="account.php">
            <p class="text-center" style="color: red;"> <?php if (isset($_GET['error'])) { echo $_GET['error'];}?> </?>
            <p class="text-center" style="color: green;"> <?php if (isset($_GET['message'])) { echo $_GET['message'];}?> </?>
            <h3>Change Password</h3>
            <hr class="mx-auto" />
            <div class="form-group">
              <label for="">Password</label>
              <input
                type="password"
                class="form-control"
                id="account-password"
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
                id="account-password-confirm"
                name="confirmPassword"
                placeholder="Confirm Password"
                required
              />
            </div>
            <div class="form-group">
              <input
                type="submit"
                name="change_password"
                id="change-pass-btn"
                value="Change password"
                class="btn"
              />
            </div>
          </form>
        </div>
      </div>
    </section>

    <!--Start orders -->
    <section id="orders" class="orders container my-5 py-2">
      <div class="container mt-2">
        <h2 class="font-weight-bold text-center">Your Orders</h2>
        <hr class="mx-auto" />
      </div>
      <table class="mt-5 pt-5">
        <tr>
          <th>Order id</th>
          <th>Order cost</th>
          <th>Order status</th>
          <th>Order Date</th>
          <th>Order details</th>
        </tr>

    <?php while($row = $orders->fetch_assoc()) { ?>
          <tr>
              <td>
                  <span><?php echo $row['order_id'];  ?> </span>
              </td>

              <td>
                  <span> <?php echo $row['order_cost'];?> </span>
              </td>

              <td>
                  <span> <?php echo $row['order_status'];?> </span>
              </td>

              <td>
                  <span> <?php echo $row['order_date'];?> </span>
              </td>

              <td>
                  <form>
                      <input class="btn order-details-btn " type="submit" value="details">
                  </form>
              </td>

          </tr>
      <?php } ?>
      </table>
    </section>
    <!--End Orders-->

    <!--End Account -->
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

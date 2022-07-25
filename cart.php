<?php
session_start();  //??? why he is  use session here not in the index.php

if (isset($_POST['add_to_cart'])) {

  // if user has already added a product to cart
  if (isset($_SESSION['cart'])) {

    $product_array_ids = array_column($_SESSION['cart'],"product_id"); // [1,4,5] represent array of id columns

    // if product has alresdy been added to cart or not
    if (!in_array($_POST['product_id'],$product_array_ids)) {

        $product_id = $_POST['product_id'];

        $product_array = array(
            
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_price' =>$_POST['product_price'],
            'product_image' => $_POST['product_image'],
            'product_quantity' => $_POST['product_quantity']
            );

        $_SESSION['cart'][$product_id] = $product_array; 

    //product has alredy been added
    }else {
      
        echo '<script>alert("Product was  alresdy add to cart");</script>';
      
    }

    // if this is the first product
  } else {
    
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $product_array = array(
    
    'product_id' => $product_id,
    'product_name' => $product_name,
    'product_price' => $product_price,
    'product_image' => $product_image,
    'product_quantity' => $product_quantity
    );

    $_SESSION['cart'][$product_id] = $product_array; // for session  [ 2=>[] ,5=> []]
  }

//calculate totale price
calculateTotalCart();

// remove product from cart

}else if (isset($_POST['remove_product'])) { 

  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);
  // calculate total
  calculateTotalCart();

} else if (isset($_POST['edit_quantity'])) {

    // we get id and quantity from the form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    // get product array from session
    $product_array = $_SESSION['cart'][$product_id];
    // this is old quantity will replace with a new quantity ..update product quantity
    $product_array['product_quantity'] = $product_quantity ; // this is a new quantity

    // we want now to add a new array with new quantity to session return array to its place
    $_SESSION['cart'][$product_id] = $product_array;

    // calculate total
    calculateTotalCart();

}else {

  header("location: index.php");

}

 //calculat total price
function calculateTotalCart() { // we need call this function each time  i add anew product
$total = 0; 
foreach ($_SESSION['cart'] as $key => $value) {
   
  $product = $_SESSION['cart'][$key] ;// array of one product
  $price = $product['product_price'];
  $quantity = $product['product_quantity'];
  $total = $total+ (  $price *   $quantity );
}
$_SESSION['total'] = $total;  
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

    <!--Start Cart section-->
    <section class="cart container my-5 py-5">
      <div class="container mt-5">
        <h2 class="font-weight-bold">Your Cart</h2>
        <hr />
        <table class="mt-5 pt-5">
          <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
          </tr>

          <?php foreach($_SESSION['cart'] as $key => $value) {?>

          <tr>
            <td>
              <div class="product-info">
                <img src="assets/imgs/<?php echo $value['product_image'] ;?>" alt="" />
                <div>
                  <p> <?php echo $value['product_name'] ;?></p>
                  <small><span>$</span><?php echo $value['product_price'] ;?></small>
                  <br />
                  <form action="cart.php" method="post">
                      <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>" />
                      <input type="submit" name="remove_product" class="remove-btn" value="remove">
                  </form>
                </div>
              </div>
            </td>
            <td>
              <form action="cart.php" method="post">
                  <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
                  <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'] ;?>" />
                  <input type="submit" class="edit-btn" value="edit" name="edit_quantity"/>
              </form>
            </td>
            <td>
              <span>$</span>
              <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price'];?></span>
            </td>
          </tr>

          <?php } ?>  
        
        </table>
        <div class="cart-total">
          <table>
            <tr>
              <td>Total</td>
              <td><?php echo $_SESSION['total'] ;?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="checkout-container">
        <form action="checkout.php" method="post">
            <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">
        </form>

      </div>
    </section>
    <!--End Cart section-->
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

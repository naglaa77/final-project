<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop</title>
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

    <style>
      .product img {
        width: 100%;
        height: auto;
        box-sizing: border-box;
        object-fit: cover;
      }
      .pagination a {
        color: coral;
      }
      .pagination li:hover a {
        color: #fff;
        background-color: coral;
      }
    </style>
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

    <!--Start Featured-->
    <section id="featured" class="my-5 py-5">
      <div class="container mt-5 py-5">
        <h3>Our Products</h3>
        <hr />
        <p>Her you can check out our products</p>
      </div>
      <div class="row max-auto container-fluid">
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/featured1.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/featured2.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/featured3.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/featured4.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/clothes1.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/clothes2.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/clothes3.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/clothes4.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/featured5.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/featured6.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/featured7.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/featured8.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/watch1.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/watch2.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/watch1.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div
          onclick="window.location.href = 'single_product.html';"
          class="product text-center col-lg-3 col-md-4 col-sm-12"
        >
          <img
            class="img-fluid mb-3"
            src="./assets/imgs/watch4.jpeg"
            alt="featured imag"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sports Shoes</h5>
          <h4 class="p-price">$199.5</h4>
          <button class="buy-btn">Buy Now</button>
        </div>

        <nav aria-label="Page navigation example">
          <ul class="pagination mt-5">
            <li class="page-item">
              <a class="page-link" href="#">Previous</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>

            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>

            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>

            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </section>
    <!--End Featured-->

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

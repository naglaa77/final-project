<?php
session_start();
include ('connection.php');

if (isset($_POST['place_order'])) {

    // 1. get user info and store it in database

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $adress = $_POST['adress'];
    $order_cost = $_SESSION['total'];
    $order_status = "on_hold";
    //$user_id = 1; i use this for test in the begging after that i use this
    $user_id = $_SESSION['user_id']; // yhis is comming from login page
    $order_date = date('Y-m-d H-i-s');

   $stmt =  $conn->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date)
    VALUES (?,?,?,?,?,?,?);"); // ?? protect database from hacker

    $stmt->bind_param('isiisss',$order_cost,$order_status,$user_id,$phone,$city,$adress,$order_date);

    $stmt->execute();
        // i want know id of order for store every product in table order_items


    // 2. issue anew order and store order info on databse

    $order_id = $stmt->insert_id;

    //echo $order_id;

    // 3. get  from cart (from session)

    foreach ($_SESSION['cart'] as $key => $value) {

        $product = $_SESSION['cart'][$key]; // this will done array for each product

        $product_id = $product['product_id'];
        $product_name = $product['product_name'];
        $product_image = $product['product_image'];
        $product_price = $product['product_price'];
        $product_quantity = $product['product_quantity'];

        // 4. store each single items in order items
        
       $stmt1 =  $conn->prepare("INSERT INTO order_items ( order_id,product_id,product_name,product_image,product_price,product_quantity,user_id,order_date) 

                        VALUES (?,?,?,?,?,?,?,?);");
        $stmt1->bind_param('iissiiis', $order_id,$product_id,$product_name,$product_image,$product_price,$product_quantity,$user_id,$order_date);

        $stmt1->execute();
    }

    

    //5.  remove every things from cart--> delay untill payment is done

    //unset($_SERVER['cart']);

    //6.  inform user whether everything is finr or there is a problem

    header('location: ../payment.php?order_status=order placed successfully');

}


?>
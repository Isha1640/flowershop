<?php 
include('partials-front/user_menu.php'); 
?>
<?php
if(isset($_POST['order_btn'])){

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];
 
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total = 0;
    if(mysqli_num_rows($cart_query) > 0){
       while($product_item = mysqli_fetch_assoc($cart_query)){
          $product_name[] = $product_item['title'] .' ('. $product_item['quantity'] .') ';
          $product_price = number_format($product_item['price'] * $product_item['quantity']);
          $price_total += $product_price;
       };
    };
 
    $total_product = implode(', ',$product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `orders_tbl`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');
 
    if($cart_query && $detail_query){
       echo "
       <div class='order-message-container'>
       <div class='message-container'>
          <h3>thank you for shopping!</h3>
          <div class='order-detail'>
             <span>".$total_product."</span>
             <span class='total'> total : $".$price_total."/-  </span>
          </div>
          <div class='customer-details'>
             <p> your name : <span>".$name."</span> </p>
             <p> your number : <span>".$number."</span> </p>
             <p> your email : <span>".$email."</span> </p>
             <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country.", ".$pin_code."</span> </p>
             <p> your payment mode : <span>".$method."</span> </p>
             <p>(*pay when product arrives*)</p>
          </div>
             <a href='products.php' class='btn-secondary'>Continue Shopping</a>
          </div>
       </div>
       ";
    }
 
 }
?>
<html>
    <header>  <title>checkout form</title> </header>

    <body>
    <div class="container">

    <section class="checkout-form">

   <h1 class="heading">Fill out following information to complete your order.</h1>

   <form action="" method="POST">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['title']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> Grand total : $<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Enter your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>Enter your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>Enter your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>Payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart"></option>
               <option value="paypal"></option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. Lalitpur" name="city" required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. Bagmati" name="province" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. Nepal" name="country" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="Confirm Order" name="order_btn" class="btn p-3 fs-4 btn-primary">
   </form>

</section>

</div>
    </body>
</html>
<?php 
include('partials-front/user_footer.php'); 
?>



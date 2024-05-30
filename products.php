
 <?php include('partials-front/user_menu.php'); ?>

 <?php
  if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['title'];
   $product_price = $_POST['price'];
   $product_image = $_POST['image_name'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE title = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(title, price, image_name, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully!';
   }

}
?>

<html><head>
<title>products</title>

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head></html>
    
<body>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
    <!-- Product SEARCH Section Starts Here -->
    <section class="product-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>product-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for flowers.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!--Section Ends Here -->


<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `tbl_product`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="images/products/<?php echo $fetch_product['image_name']; ?>" alt="">
            <h3><?php echo $fetch_product['title']; ?></h3>
            <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="title" value="<?php echo $fetch_product['title']; ?>">
            <input type="hidden" name="price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="image_name" value="<?php echo $fetch_product['image_name']; ?>">
            <input type="submit" class="btn btn-primary" value="Add to Cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

   
                          
    </body>

    <?php include('partials-front/user_footer.php'); ?>
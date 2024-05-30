<?php include('partials-front/user_menu.php'); ?>
<html>
    <head><title>Sign up page for user</title></head>
    <body>
    <div class="form-container my-5">
            

            <div class="d-flex justify-content-center">

                <div class="login-box m-auto mt-5 col-4">
                    <div><h4 class="text-center">Sign Up</h4></div>
                    <form action="" method="post">
                    <div class="flex">
         <div class="inputBox">
            <span>Enter your name</span>
            <input type="text" placeholder="enter your name" name="name" class="form-control m-2" required>
         </div>
         <div class="inputBox">
            <span>Enter your number</span>
            <input type="number" placeholder="enter your number" name="number" class="form-control m-2" required>
         </div>
         <div class="inputBox">
            <span>Enter your email</span>
            <input type="email" placeholder="enter your email" name="email" class="form-control m-2" required>
         </div>
        
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" class="form-control m-2" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" class="form-control m-2" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. Lalitpur" name="city" class="form-control m-2" required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. Bagmati" name="province"class="form-control m-2" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. Nepal" name="country" class="form-control m-2" required>
         </div>
         
      </div>
                        
                        
     <input type="submit" class="btnlog" name="add_user" value="Create Account">

     
            <p>already have an account? <a href="login.php">Login now</a></p>
    </form>
               
     </div>

            </div>
         
        </div>
    </body>
</html>

<?php include('partials-front/user_footer.php'); ?>
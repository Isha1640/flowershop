<?php include('partials-front/user_menu.php'); ?>
<html>
    <head><title>lofin page for user</title></head>

    <body>
    <div class="form-container my-5">
            <div><h4 class="text-center">
              <a href="dash.php"> <img src="images/blossom_logo.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-top"></a> <br>
           Welcome To Blossom</h4></div>
           

            <div class="d-flex justify-content-center">

                <div class="login-box m-auto mt-5 col-4">
                    <div><h1 class="text-center">LogIn</h1></div>
                    <form class="needs-validation" action="" method="post">
                      
                        <input type="email" name="email" class="form-control m-2" placeholder="Enter Email" required="">
                        <input type="password" name="pass" class="form-control m-2" placeholder="Enter Password" required="" minlength="8">
                        <input type="submit" class="btnlog" name="submit" value="login now">
                        <p>don't have an account? <a href="register.php">register now</a></p>
                     </form>
                </div>

            </div>
         
        </div>
    </body>
</html>

<?php include('partials-front/user_footer.php'); ?>
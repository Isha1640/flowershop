<?php include('admin/config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

   
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div>
              <a class="navbar-brand" href="#">
              <img src="images/blossom_logo.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
              <span class="logotext text-uppercase ms-2">Blossom</span>
              </a>
            </div>


            <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
       
      <div class="collapse navbar-collapse menu_div " id="navbarSupportedContent">



            <div class="midmenu">  
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">                         
              <li class="nav-item nav-items">
                  <a class="nav-link nav-links" href="<?php echo SITEURL;?>index.php">HOME</a>
              </li>
              <li class="nav-item nav-items">
                <a class="nav-link nav-links" href="<?php echo SITEURL; ?>products.php">CATALOGUE</a>
              </li>

              <li class="nav-item nav-items">
                <a class="nav-link nav-links" href="<?php echo SITEURL;?>order.php">CART</a>
              </li>
        
              <li class="nav-item nav-items">
                <a class="nav-link nav-links" href="<?php echo SITEURL;?>login.php">LOG IN</a>
              </li>

            </ul>
          </div>
      </div>
    </div>
   

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
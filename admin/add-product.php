<?php include('partials/menu.php'); ?>

<body>
             <div class="main-content">
            <div class="wrapper">
            <h1> Add to Catalogue</h1>
        
            
            <br /> <br /> <br />
            <?php 
             if(isset($_SESSION['upload']))
             {
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
             }
             ?>

            <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                
               <tr>
                    <td> Title:</td>
                    <td><input type="text" name="title" placeholder ="Title of product"> </td>
                </tr>
<tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of product."></textarea>
                    </td>
                </tr>

                
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" > 
                    </td>
                </tr>

               <tr>
<tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

 <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                            <?php 
                                //Create PHP Code to display categories from Database
                                //1. CReate SQL to get all active categories from database
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                
                                //Executing qUery
                                $res = mysqli_query($conn, $sql);

                                //Count Rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //IF count is greater than zero, we have categories else we donot have categories
                                if($count>0)
                                {
                                    //WE have categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    //WE do not have category
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            

                                //2. Display on Drpopdown
                            ?>

                        </select>
                    </td>
                </tr>


<tr>
                <td>Featured:</td>
                <td><input type="radio" name="featured" value="Yes">Yes
                     <input type="radio" name="featured" value="No">No
                </td>
               </tr>
<br />
               <tr>
                <td>Active:</td>
                <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
                </td>
               </tr>

               <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add To Products" class="btn-secondary">
                </td>
               </tr>

               
            </table>

            </form>

<!-- to insert data from form to database -->
            <?php
            //to check if button is clicked or not 
            if(isset($_POST['submit']))
            {
                // add the product to database
                // echo"Clicked";

                //1. to get data from form and insert into database
                $title = $_POST['title'];
                
                $description= $_POST['description'];
                $price =$_POST['price'];
                $category = $_POST['category'];
               
                //check whether radio button for featured and active are checked or not
                // if(isset($_POST['featured']))
                // {
                //     $featured = $_POST['featured'];
                // }
                // else{
                //     $featured = "No"; //setting the default value
                // }

                // if(isset($_POST['active']))
                // {
                //     $active = $_POST['active'];
                // }
                // else
                // {
                //     $active = "No"; //setting defalut value

                // }
                // Check whether radio button for featured and active are checked or not
$featured = isset($_POST['featured']) ? $_POST['featured'] : "No";
$active = isset($_POST['active']) ? $_POST['active'] : "No";

// Validate and sanitize inputs
$featured = ($featured === "Yes") ? "Yes" : "No"; // Ensure the value is either "Yes" or "No"
$active = ($active === "Yes") ? "Yes" : "No"; // Ensure the value is either "Yes" or "No"

    


                //2. Upload the image if selected
                //check  if select image is clicked or not and image only if the image is selected
                if(isset($_FILES['image']['name']))
                {
                    //get details of the selected image
                    $image_name = $_FILES['image']['name'];

                    //check whether the image is selected or not and upload image only if selected
                    if($image_name!="")
                    {
                        //image is selected
                        //a. rename the img
                        // to get the extection of selected img (jpg,png,gif)
                        $ext = end(explode('.', $image_name));

                        //create new name for image
                        $image_name = "Product-Name-".rand(0000,9999).".".$ext; //new img name may be "product-name-657.jpg"

                        //b. upload the img 
                        //get src path and destination path

                        //source path is the current location of image 
                        $src = $_FILES['image']['tmp_name'];

                        //destination path for the img to be uploaded
                        $dst ="../images/products/".$image_name;

                        //finally upload the product img
                        $upload = move_uploaded_file($src, $dst);

                        //to check if img uploaded or not
                        if($upload == false)
                        {
                            //failed to upload img
                            //redirect to add product page with error message
                            $_SESSION['upload']="<div class='error'>Failed to upload Image.</div>";
                            header('location:'.SITEURL.'admin/add-product.php');
                            //stop process
                            die();
                        }
                    }
                    
                }
                else{
                    $image_name =""; //setting default value as blank 
                }

                //3. Insert into database
                //create a sql query to save or add product
                
                // $sql="INSERT INTO tbl_product SET
                // title = '$title',
                // image_name ='$image_name',
                // description = '$description',
                // price = $price,
                // featured ='$featured',
                // active = '$active'
                // ";
                
                $sql2 = "INSERT INTO tbl_product (title, image_name, description, price, featured, active)
        VALUES ('$title', '$image_name', '$description', $price, '$featured', '$active')";



                //execute query
                $res2 = mysqli_query($conn,$sql2);

                //check whether data inserted or not 
                 //4. Redirect with message  to manage products
                if ($res2)
                {
                    //data inserted successfully
                    $_SESSION['add']="<div class='success'>Product Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-product.php');
                }
                else
                {
                    //failed to insert data
                    $_SESSION['add']="<div class='error'>Failed to add product.</div>";
                    header("location:".SITEURL.'admin/manage-product.php');
                }
               

            } ?>
           
          
        </div>
</div>
        



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php include('partials/footer.php'); ?>
    </body>




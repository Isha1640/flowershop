<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>


        <?php 
        
            //CHeck whether id is set or not
            if(isset($_GET['id']))
            {
                //GEt the Order Details
                $id=$_GET['id'];

                //Get all other details based on this id
                //SQL Query to get the order details
                $sql = "SELECT * FROM orders_tbl WHERE id=$id";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Detail Availble
                    $row=mysqli_fetch_assoc($res);

                    $customer_name = $row['name'];
                    $customer_number = $row['number'];
                    $customer_mail = $row['email'];
                    $method = $row['method'];
                    $flat = $row['flat'];
                    $street = $row['street'];
                    $city = $row ['city'];
                    $state = $row ['state'];
                    $country= $row['country'];
                    $pin_code= $row['pin_code'];
                    $total_products= $row['total_products'];
                    $total_price= $row['total_price'];

                    
                }
                else
                {
                    //DEtail not Available/
                    //Redirect to Manage Order
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                //REdirect to Manage ORder PAge
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Customer Name:</td>
                    <td><b> <?php echo $customer_name; ?> </b></td>
                </tr>

                <tr>
                    <td>Customer Number:</td>
                    <td><b> <?php echo $customer_number; ?> </b></td>
                </tr>

                <tr>
                    <td>Customer Mail:</td>
                    <td><b> <?php echo $customer_mail; ?> </b></td>
                </tr>

                <tr>
                    <td>Pay method:</td>
                    <td><b> <?php echo $method; ?> </b></td>
                </tr>

                
                <tr>
                    <td>Flat</td>
                    <td><b> <?php echo $flat; ?> </b></td>
                </tr>
                <tr>
                    <td>Street</td>
                    <td><b> <?php echo $street; ?> </b></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><b> <?php echo $city; ?> </b></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><b> <?php echo $state; ?> </b></td>
                </tr>
                <tr>
                    <td>Number of products</td>
                    <td><b> <?php echo  $total_products; ?> </b></td>
                </tr>


                <tr>
                    <td>Total Price:</td>
                    <td>
                        <b> $ <?php echo  $total_price; ?></b>
                    </td>
                </tr>


                <tr>
                    <!-- <td>Status</td> -->
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name: </td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact: </td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_number; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Email: </td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo   $customer_mail; ?>">
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
        </form>


        <?php 
            //CHeck whether Update Button is Clicked or Not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //Get All the Values from Form
            
                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_number = $_POST['customer_contact'];
                $customer_mail = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                //Update the Values
                $sql2 = "UPDATE orders_tbl SET 
                -- from here isha
                   
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_number',
                    customer_email = '$customer_mail',
                    WHERE id=$id
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //CHeck whether update or not
                //And REdirect to Manage Order with Message
                if($res2==true)
                {
                    //Updated
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
                else
                {
                    //Failed to Update
                    $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>

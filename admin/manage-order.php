<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Customer_Name</th>
                        <th>Customer_Number</th>
                        <th>Mail_Address</th>
                        <th>Method</th>
                        <th>Flat</th>
                        <th>Street</th>
                        <th>City</th> 
                        <th>Province</th>
                        <th>Country</th>
                        <th>Pin_code</th>
                        <th>Total_Product</th>
                        <th>Total_Price</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM `orders_tbl` ORDER BY id DESC"; // Display the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $customer_name = $row['name'];
                                $customer_number = $row['number'];
                                $email = $row['email'];
                                $method = $row['method'];
                                $flat = $row['flat'];
                                $street = $row['street'];
                                $city = $row['city'];
                                $state = $row['state'];
                                $country = $row['country'];
                                $total_products = $row['total_products'];
                                $total_price = $row['total_price'];

                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_number; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $method;?></td>
                                        <td><?php echo $flat; ?></td>
                                        <td><?php echo $street; ?></td>
                                        <td><?php echo $city; ?></td>
                                        <td><?php echo $state; ?></td>
                                        <td><?php echo $country; ?></td>
                                        <td><?php echo $total_products; ?></td>
                                        <td><?php echo $total_price; ?></td>


                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                // if($status=="Ordered")
                                                // {
                                                //     echo "<label>$status</label>";
                                                // }
                                                // elseif($status=="On Delivery")
                                                // {
                                                //     echo "<label style='color: orange;'>$status</label>";
                                                // }
                                                // elseif($status=="Delivered")
                                                // {
                                                //     echo "<label style='color: green;'>$status</label>";
                                                // }
                                                // elseif($status=="Cancelled")
                                                // {
                                                //     echo "<label style='color: red;'>$status</label>";
                                                // }
                                            ?>
                                        </td>

                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Edit Order</a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>
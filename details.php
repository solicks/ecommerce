<!DOCTYPE html>
<?php 
                    
include("functions/functions.php");

?>
<html>
    <head>
        <title>My Online Shop</title>
        <link rel="stylesheet" href="styles/style.css" media="all" />
    </head>
    <body>

    <!--- Main-Container Start here --->
        <div class="main_wrapper">

            <!--- Header Start here --->
            <div class="header_wrapper">
                <img id="logo" src="images/mylogo.png" />
                <img id="banner" src="images/ad_banner.jpeg" />

            </div>
            <!--- Header Ends here --->

            <!--- Menubar Start here --->
            <div class="menubar">
                <ul id="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="all_products.php">All Products</a></li>
                    <li><a href="customers/my_account.php">My Account</a></li>
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>

                <div id="form">
                    <form method="get" action="results.php" enctype="multipart/form-data">
                        <input type="text" name="user_query" placeholder="search a product" />
                        <input type="submit" name="search" value="search" />
                    </form>
                </div>
            </div>
            <!--- Menubar Ends here --->

            <!--- Content Wrapper Start here --->
            <div class="content_wrapper">

                <div id="sidebar">
                    <div id="sidebar_title">Categories</div>

                    <ul id="cats">
                       
                    <?php 
                        getCats();
                
                    ?>
                    
                    </ul>

                    <div id="sidebar_title">Brands</div>

                    <ul id="cats">
                        <?php 
                            getBrands();
                        ?>
                    </ul>
                </div>

                <div id="content_area">

                    <div id="shopping_cart">
                        <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
                        
                            Welcome Guest! <b style="color:Yellow">Shopping Cart</b> Total Items: Total Price: <a href="cart.php" style="color:yellow">Go to Cart</a>
                        
                        </span>
                    </div>

                    <div id="product_box">
                      <?php  
                        $con = mysqli_connect("localhost", "root", "", "ecommerce");

                        if(isset($_GET['pro_id'])) {

                            $product_id = $_GET['pro_id'];

                            $get_pro = "select * from products where product_id='$product_id'";

                            $run_pro = mysqli_query($con, $get_pro);

                            while($row_pro = mysqli_fetch_array($run_pro)) {
                                
                                $pro_id = $row_pro['product_id'];
                                $pro_title = $row_pro['product_title'];
                                $pro_price = $row_pro['product_price'];
                                $pro_image = $row_pro['product_image'];
                                $pro_desc = $row_pro['product_desc'];
                                

                                echo "
                                    <div id='single_product'>
                                        <h3>$pro_title</h3>
                                        <img src='admin_area/product_images/$pro_image' width='400' height='300' />
                                    
                                        <p><b> N$pro_price </b></p>

                                        <p>$pro_desc</p>

                                        <a href='index.php?pro_id=$pro_id' style='float:left;'>Go Back</a>
                                        <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
                                    </div>
                                
                                ";
                            }
                        }
                        ?>
                    </div>
                
                </div>
            </div>
            <!--- Content Wrapper Start here --->

            <div id="footer">
                <h2 style="text-align:center; padding-top:30px">&copy;2020 by solicks</h2> 
            </div>
        </div>
    <!--- Main-Container Ends here --->    
    </body>
</html>
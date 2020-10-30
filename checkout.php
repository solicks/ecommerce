<!DOCTYPE html>
<?php 
session_start();                    
include("functions/functions.php");

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Online Shop</title>
        <link rel="stylesheet" href="styles/style.css" media="all" />
    </head>
    <body>

    <!--- Main-Container Start here --->
        <div class="main_wrapper">

            <!--- Header Start here --->
            <div class="header_wrapper">
                <a href="index.php"><img id="logo" src="images/mylogo.png" /></a>
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

                    <?php cart(); ?>
                    
                    <div id="shopping_cart">
                        <span style="float:right; font-size:17px; padding:5px; line-height:40px;">
                        
                        <?php 
                            if(isset($_SESSION['customer_email'])) {
                                echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>";
                            }
                            else {
                                echo "<b>Welcome Guest:</b>";
                            }
                        ?> 
                            
                            <b style="color:Yellow">Shopping Cart</b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to Cart</a>
                        
                        </span>
                    </div>

                    <div id="products_box">
                       <?php 
                        if(!isset($_SESSION['customer_email'])) {

                            include("customer_login.php");
                        }
                        else {
                            include("payment.php");
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
<!DOCTYPE html>
<?php 
                    
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
                    <li><a href="customer/my_account.php">My Account</a></li>
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

                            if(isset($_GET['search'])) {

                                $search_query = $_GET['user_query'];

                                $con = mysqli_connect("localhost", "root", "", "ecommerce");

                                $get_pro = "select * from products where product_keywords like '%$search_query%'";

                                $run_pro = mysqli_query($con, $get_pro);
                    
                                while($row_pro=mysqli_fetch_array($run_pro)) {
                                    
                                    $pro_id = $row_pro['product_id'];
                                    $pro_cat = $row_pro['product_cat'];
                                    $pro_brand = $row_pro['product_brand'];
                                    $pro_title = $row_pro['product_title'];
                                    $pro_price = $row_pro['product_price'];
                                    $pro_image = $row_pro['product_image'];
                                    
                    
                                    echo "
                                        <div id='single_product'>
                                            <h3>$pro_title</h3>
                                            <img src='admin_area/product_images/$pro_image' width='180' height='180' />
                                        
                                            <p><b> N$pro_price </b></p>
                    
                                            <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
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
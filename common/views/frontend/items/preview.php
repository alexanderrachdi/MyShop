<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
    <title>Free Home Shoppe Website Template | Preview :: w3layouts</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
    <link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/global.css">
    <script src="js/slides.min.jquery.js"></script>
    <script>
        $(function(){
            $('#products').slides({
                preload: true,
                preloadImage: 'img/loading.gif',
                effect: 'slide, fade',
                crossfade: true,
                slideSpeed: 350,
                fadeSpeed: 500,
                generateNextPrev: true,
                generatePagination: false
            });
        });
    </script>
</head>
<body>
<div class="wrap">
    <div class="header">
        <div class="headertop_desc">
            <div class="call">
                <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
            </div>
            <div class="account_desc">
                <ul>
                    <?php if(!isset($_SESSION['user'])): ?>


                        <li><a href="index.php?c=user&m=create">Register</a></li>
                        <li><a href="index.php?c=login&m=login">Login</a></li>

                    <?php endif; ?>

                    <li><a href="index.php?c=login&m=logout">Logout</a></li>
                    <li><a href="index.php?c=user&m=update">My Account</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="header_top">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="" /></a>
            </div>
            <div class="cart">
                <p><span><?php echo (isset($_SESSION['user']))? $_SESSION['user']->getFname() : 'Unregistered'; ?></span> Welcome to our Online Store ! <span>Cart:</span><div id="dd" class="wrapper-dropdown-2"> 0 item(s) - $0.00

                    <ul class="dropdown">
                        <li>you have no items in your Shopping cart</li>
                    </ul></div></p>
            </div>
            <script type="text/javascript">
                function DropDown(el) {
                    this.dd = el;
                    this.initEvents();
                }
                DropDown.prototype = {
                    initEvents : function() {
                        var obj = this;

                        obj.dd.on('click', function(event){
                            $(this).toggleClass('active');
                            event.stopPropagation();
                        });
                    }
                }

                $(function() {

                    var dd = new DropDown( $('#dd') );

                    $(document).click(function() {
                        // all dropdowns
                        $('.wrapper-dropdown-2').removeClass('active');
                    });

                });

            </script>
            <div class="clear"></div>
        </div>
        <div class="header_bottom">
            <div class="menu">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="index.php?c=other&m=about">About</a></li>
                    <li><a href="index.php?c=other&m=delivery">Delivery</a></li>
                    <li><a href="index.php?c=news&m=index">News</a></li>
                    <li><a href="index.php?c=contact&m=contact">Contact</a></li>
                    <div class="clear"></div>
                </ul>
            </div>
            <div class="search_box">
                <form>
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="back-links">
                    <p><a href="index.php">Home</a> >>>> <a href="#">Electronics</a></p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">
                <div class="cont-desc span_2_of_2">
                    <div class="product-details">
                        <div class="grid images_3_of_2">
                            <div id="container">
                                <div id="products_example">
                                    <div id="products">
                                        <div class="slides_container">
                                            <a href="#" target="_blank"><img src="http://softacad.dev/MVS%20MYSHOP/admin/uploads/<?php echo $item->getImage(); ?>" alt=" " height="250px" /></a>
                                            <?php foreach($images as $image):  ?>
                                            <a href="#" target="_blank"><img src="http://softacad.dev/MVS%20MYSHOP/admin/uploads/<?php echo $image->getImage(); ?>" alt=" " height="250px" /></a>
                                            <?php endforeach; ?>
                                        </div>
                                        <ul class="pagination">
                                            <li><a href="#"><img src="http://softacad.dev/MVS%20MYSHOP/admin/uploads/<?php echo $item->getImage(); ?>" alt=" " height="35px" /></a></li>
                                            <?php foreach($images as $image):  ?>
                                            <li><a href="#"><img src="http://softacad.dev/MVS%20MYSHOP/admin/uploads/<?php echo $image->getImage(); ?>" alt=" " height="35px" /></a></li>
                                            <?php endforeach; ?>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="desc span_3_of_2">
                            <h2><?php echo $item->getName(); ?></h2>
                            <div class="price">
                                <p>Price: <span><?php echo $item->getPrice(); ?> лв.</span></p>
                            </div>

                            <div class="share-desc">
                                <div class="share">
                                    <p>Share Product :</p>
                                    <ul>
                                        <li><a href="#"><img src="images/facebook.png" alt="" /></a></li>
                                        <li><a href="#"><img src="images/twitter.png" alt="" /></a></li>
                                    </ul>
                                </div>
                                <div class="button"><span><a href="#">Add to Cart</a></span></div>
                                <div class="clear"></div>
                            </div>

                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="product_desc">
                        <div id="horizontalTab">
                            <ul class="resp-tabs-list">
                                <li>Product Details</li>


                                <div class="clear"></div>
                            </ul>
                            <div class="resp-tabs-container">
                                <div class="product-desc">
                                    <?php echo $item->getDescription(); ?>
                            </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#horizontalTab').easyResponsiveTabs({
                                type: 'default', //Types: default, vertical, accordion
                                width: 'auto', //auto or any width like 600px
                                fit: true   // 100% fit in a container
                            });
                        });
                    </script>
                    <div class="content_bottom">
                        <div class="heading">
                            <h3>Other Products</h3>
                        </div>
                        <div class="see">
                            <p><a href="index.php?c=item&m=index">See all Products</a></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="section group">
                        <?php foreach($randomItems as $randomItem):  ?>
                            <div class="grid_1_of_4 images_1_of_4">
                                <a href="index.php?c=item&m=preview&id=<?php  echo $randomItem->getId(); ?>"><img src="http://softacad.dev/MVS%20MYSHOP/admin/uploads/<?php echo $randomItem->getImage(); ?>" alt="" width="150px" height="150px" /></a>
                                <h2><?php  echo $randomItem->getName(); ?></h2>
                                <div class="price-details">
                                    <div class="price-number">
                                        <p><span class="rupees"><?php  echo $randomItem->getPrice(); ?> лв.</span></p>
                                    </div>
                                    <div class="add-cart">
                                        <h4><a href="preview.php">Add to Cart</a></h4>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
require_once '/../include/footer.php';
?>


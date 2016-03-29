<!DOCTYPE HTML>
<head>
    <title>My market</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/startstop-slider.js"></script>
</head>
<body>

<div class="wrap">
    <div class="header">
        <div class="headertop_desc">
            <div class="call">
                <p><span>Need help?</span> call us <span class="number">+3598 9993 6167</span></span></p>
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
                <a href="index.php"><img src="images/my_shop_logo.png" alt="Logo" /></a>
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
                <form method="GET">
                    <input type="text" value="<?php echo htmlspecialchars(trim($search)); ?>" name="search" >
                    <input type="hidden" name="page" value="<?php echo $page; ?>" />
                    <input type="hidden" name="c" value="tour" />
                    <input type="hidden" name="m" value="index" />
                    <input type="submit" value="">
                </form>
            </div>
            <div class="clear"></div>
        </div>
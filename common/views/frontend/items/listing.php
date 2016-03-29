<?php
require_once '/../include/header.php';
?>
    <div class="header_slide">
        <div class="header_bottom_left">
            <div class="categories">
                <ul>
                    <h3>Categories</h3>
                    <?php
                    foreach($categories as $category): ?>

                        <li><a href="index.php?c=item&m=index&id=<?php echo $category->getId() ;?>"><?php echo $category->getName() ;?></a></li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="header_bottom_right">
            <div class="slider">
                <div id="slider">
                    <div id="mover">
                        <div id="slide-1" class="slide">
                            <div class="slider-img">
                                <a href="preview.php"><img src="images/slide-1-image.png" alt="learn more" /></a>
                            </div>
                            <div class="slider-text">
                                <h1>Clearance<br><span>SALE</span></h1>
                                <h2>UPTo 20% OFF</h2>
                                <div class="features_list">
                                    <h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>
                                </div>
                                <a href="preview.php" class="button">Shop Now</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="slide">
                            <div class="slider-text">
                                <h1>Clearance<br><span>SALE</span></h1>
                                <h2>UPTo 40% OFF</h2>
                                <div class="features_list">
                                    <h4>Get to Know More About Our Memorable Services</h4>
                                </div>
                                <a href="preview.php" class="button">Shop Now</a>
                            </div>
                            <div class="slider-img">
                                <a href="preview.php"><img src="images/slide-3-image.jpg" alt="learn more" /></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="slide">
                            <div class="slider-img">
                                <a href="preview.php"><img src="images/slide-2-image.jpg" alt="learn more" /></a>
                            </div>
                            <div class="slider-text">
                                <h1>Clearance<br><span>SALE</span></h1>
                                <h2>UPTo 10% OFF</h2>
                                <div class="features_list">
                                    <h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>
                                </div>
                                <a href="preview.php" class="button">Shop Now</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    </div>
    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="heading">
                    <h3>New Products</h3>
                </div>
                <div class="see">
                    <p><a href="index.php?c=item&m=index">See all Products</a></p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">
                <?php foreach($items as $item):  ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="index.php?c=item&m=preview&id=<?php  echo $item->getId(); ?>"><img src="http://softacad.dev/MVS%20MYSHOP/admin/uploads/<?php echo $item->getImage(); ?>" alt="" width="150px" height="150px" /></a>
                    <h2><?php echo $item->getName(); ?></h2>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="rupees"><?php echo $item->getPrice(); ?>лв.</span></p>
                        </div>
                        <div class="add-cart">
                            <h4><a href="preview.php">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>

                </div>
                <?php endforeach; ?>


            </div>
            <div class="content-pagenation ">
                <?php echo $pagination->create(); ?>

            </div>

        </div>
    </div>

<?php
require_once '/../include/footer.php';
?>
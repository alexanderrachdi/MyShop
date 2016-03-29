<?php
require_once '/../include/header.php';

?>
<div class="main">
    <div class="content">
        <?php foreach($news as $new): ?>

        <div class="image group">
            <div class="grid images_3_of_1">
                <img src="http://softacad.dev/MVS%20MYSHOP/admin/uploads/<?php echo $new->getImage(); ?>" alt="" />
            </div>
            <div class="grid news_desc">
                <h3><?php echo $new->getName(); ?></h3>
                <h4>Posted on <?php echo $new->getDate(); ?></h4>
                <p><?php echo $new->getText(); ?></p>
            </div>
        </div>
        <?php endforeach; ?>


        <div class="content-pagenation">
            <?php echo $pagination->create(); ?>
        </div>
    </div>
</div>
</div>

<?php
require_once '/../include/footer.php';
?>


<?php

require_once __DIR__.'/../include/header.php';
require_once __DIR__.'/../include/sidebar.php';

?>

<div id="content" class="span10">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.php">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Dashboard</a></li>
        </ul>

        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header">
                    <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Striped Table</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <?php
                    if (isset($_SESSION['flashMessage'])) {
                        echo $_SESSION['flashMessage'];
                        unset($_SESSION['flashMessage']);
                    }
                    ?>
                    <a href="index.php?c=news&m=create" class="btn btn-large btn-success pull-right">Create news</a>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Text</th>
                            <th>Image</th>
                            <th>Actions</th>



                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($news as $new):  ?>
                            <tr>
                                <td><?php echo $new->getName(); ?></td>
                                <td class="center"><?php echo $new->getDate(); ?></td>
                                <td class="center"><?php echo substr($new->getText(), 0, 15).'...' ; ?></td>
                                <td class="center"><img width="100" height="100" src="uploads/<?php echo $new->getImage(); ?>" alt=""></td>






                                <td class="center">
                                    <a class="btn btn-success" href="newsImages.php?id=<?php echo $new->getId();?>">
                                        <i class="halflings-icon white zoom-in"></i>
                                    </a>
                                    <a class="btn btn-info" href="index.php?c=news&m=update&id=<?php echo $new->getId(); ?>">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                    <a class="btn btn-danger" href="index.php?c=news&m=delete&id=<?php echo $new->getId(); ?>">
                                        <i class="halflings-icon white trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                    echo $pagination->create();
                    ?>

                </div>
            </div><!--/span-->
        </div><!--/row-->
<?php
require_once '/../include/footer.php';
?>
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

                <form action="index.php" method="get" class="form-horizontal" enctype="multipart/form-data">
                    <fieldset>



                        <div class="control-group">
                            <label class="control-label" for="selectError3">Category</label>
                            <input type="hidden" name="page" value="<?php echo $page; ?>" />
                            <input type="hidden" name="c" value="tour" />
                            <input type="hidden" name="m" value="index" />
                            <div class="controls">
                                <select id="selectError3" name="orderBy">
                                    <option value="0" <?php echo ($orderBy == 0)? "selected" : " " ?>>-- Select Order --</option>
                                    <option value="1" <?php echo ($orderBy == 1)? "selected" : " " ?>>ID Up</option>
                                    <option value="2" <?php echo ($orderBy == 2)? "selected" : " " ?>>Category Up</option>
                                    <option value="3" <?php echo ($orderBy == 3)? "selected" : " " ?>>Category Down</option>
                                </select>
                            </div>
                        </div
                        <div class="form-actions">
                            <input type="submit" value="Order Results" class="btn btn-primary"/>
                        </div>
                    </fieldset>
                </form>
<a href="index.php?c=item&m=create" class="btn btn-large btn-success pull-right">Create item</a>

<table class="table table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Image</th>
        <th>Description</th>
        <th>Actions</th>



            </tr>
            </thead>
            <tbody>
                    <?php foreach($items as $item): ?>
                        <tr>
                            <td><?php echo $item->getName(); ?></td>
                            <td class="center"><?php echo $item->getPrice(); ?></td>
                            <td class="center"><?php echo $item->getCategoryName(); ?></td>
                            <td class="center"><img width="100" height="100" src="uploads/<?php echo $item->getImage(); ?>" alt=""></td>
                            <td class="center"><?php echo substr($item->getDescription(), 0, 10).'...' ; ?></td>



                            <td class="center">
                                <a class="btn btn-success" href="index.php?c=item&m=itemImages&id=<?php echo $item->getId();?>">
                                    <i class="halflings-icon white zoom-in"></i>
                                </a>

                                <a class="btn btn-info" href="index.php?c=item&m=update&id=<?php echo $item->getId();?>">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="index.php?c=item&m=delete&id=<?php echo $item->getId();?>">
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
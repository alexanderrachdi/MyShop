<?php

require_once __DIR__.'/../include/header.php';
require_once __DIR__.'/../include/sidebar.php';

?>
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white user"></i><span class="break"></span>Admins</h2>
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

                <a href="index.php?c=admin&m=create" class="btn btn-large btn-success pull-right">Create new admin</a>

                <table class="table table-striped" >
                    <thead>
                    <tr>
                        <th>First name</th>
                        <th>Second name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($admins as $admin): ?>

                    <tr>
                        <td><?php echo $admin->getFname(); ?></td>
                        <td class="center"><?php echo $admin->getSname(); ?></td>
                        <td class="center"><?php echo $admin->getUsername(); ?></td>
                        <td class="center"><?php echo $admin->getEmail(); ?></td>


                        <td class="center">

                            <a class="btn btn-info" href="index.php?c=admin&m=update&id=<?php echo $admin->getId(); ?>">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="index.php?c=admin&m=delete&id=<?php echo $admin->getId(); ?>">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach;  ?>
                    </tbody>
                </table>
                <?php echo $pagination->create(); ?>
            </div>
        </div><!--/span-->

    </div><!--/row-->
<?php
require_once '/../include/footer.php';
?>
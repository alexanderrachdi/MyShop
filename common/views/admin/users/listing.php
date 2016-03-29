<?php

require_once __DIR__.'/../include/header.php';
require_once __DIR__.'/../include/sidebar.php';

?>

<!-- start: Content -->
    <div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.php?c=dashboard&m=index">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white user"></i><span class="break"></span>Users</h2>
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

                <a href="index.php?c=user&m=create" class="btn btn-large btn-success pull-right">Create new user</a>

                <table class="table table-striped ">
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
                    <?php foreach ($users as $user): ?>

                    <tr>
                        <td><?php echo $user->getFname(); ?></td>
                        <td class="center"><?php echo $user->getSname(); ?></td>
                        <td class="center"><?php echo $user->getUsername(); ?></td>
                        <td class="center"><?php echo $user->getEmail(); ?></td>


                        <td class="center">

                            <a class="btn btn-info" href="index.php?c=user&m=update&id=<?php echo $user->getId(); ?>">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="index.php?c=user&m=delete&id=<?php echo $user->getId(); ?>">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach;  ?>
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
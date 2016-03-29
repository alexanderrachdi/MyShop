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
        <form action="" method="post"  class="form-horizontal">
            <fieldset>
                <div class="control-group ">
                    <label class="control-label" for="inputError">Name</label>
                    <div class="controls">
                        <input type="text" id="inputError" name="name" value="<?php echo $insertInfo['name']; ?>">

                        <span class="help-inline"></span>

                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label" for="inputError">Description</label>
                    <div class="controls">
                        <input type="text" id="inputError" name="description" value="<?php echo $insertInfo['description']; ?>">

                        <span class="help-inline"></span>

                    </div>
                </div>

                <div class="form-actions">
                    <input type="submit" name="editCategory" value="Edit Category" class="btn btn-primary"/>
                </div>
            </fieldset>
        </form>


    </div>
<?php
require_once '/../include/footer.php';
?>
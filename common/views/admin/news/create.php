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

        <form action="" method="post"  class="form-horizontal" enctype="multipart/form-data">
            <fieldset>
                <div class="control-group ">
                    <label class="control-label" for="inputError">Name</label>
                    <div class="controls">
                        <input type="text" id="inputError" name="name" value="">

                            <span class="help-inline"></span>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="fileInput">File input</label>
                    <div class="controls">
                        <input class="input-file uniform_on" id="fileInput" name="image" type="file">

                    </div>
                </div>
<!--                <div class="control-group ">-->
<!--                    <label class="control-label" for="inputError">Date</label>-->
<!--                    <div class="controls">-->
<!--                        <input type="text" id="inputError" name="date" value="">-->
<!---->
<!--                            <span class="help-inline"></span>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Text</label>
                    <div class="controls">
                        <textarea name="text" class="cleditor" id="textarea2" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" name="createNews" value="Add News" class="btn btn-primary"/>
                </div>
            </fieldset>
        </form>


    </div>
<?php
require_once '/../include/footer.php';
?>
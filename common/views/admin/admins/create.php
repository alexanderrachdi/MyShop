<?php
require_once __DIR__.'/../include/header.php';
require_once __DIR__.'/../include/sidebar.php';

?>

<div id="content" class="span10" xmlns="http://www.w3.org/1999/html">

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
            <div class="control-group " >
                <label class="control-label" for="inputError">First name</label>
                <div class="controls">
                    <input type="text" id="inputError" name="fname" value="">

                            <span class="help-inline"></span>

                </div>
            </div>
            <div class="control-group " >
                <label class="control-label" for="inputError">Second name</label>
                <div class="controls">
                    <input type="text" id="inputError" name="sname" value="">

                            <span class="help-inline"></span>

                </div>
            </div>
            <div class="control-group " >
                <label class="control-label" for="inputError">Username</label>
                <div class="controls">
                    <input type="text" id="inputError" name="username" value="">

                            <span class="help-inline"></span>

                </div>
            </div>
            <div class="control-group " >
                <label class="control-label" for="inputError">Password</label>
                <div class="controls">
                    <input type="text" id="inputError" name="password" value="">

                            <span class="help-inline"></span>

                </div>
            </div>
            <div class="control-group " >
                <label class="control-label" for="inputError">Email</label>
                <div class="controls">
                    <input type="text" id="inputError" name="email" value="">

                            <span class="help-inline"></span>

                </div>
            </div>
            <div class="form-actions">
                <input type="submit" name="createAdmin" value="Add Admin" class="btn btn-primary"/>
            </div>
        </fieldset>
    </form>
</div>
<?php
require_once __DIR__.'/../include/footer.php';
?>
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
                <label class="control-label" for="inputError">First name</label>
                <div class="controls">
                    <input type="text" id="inputError" name="fname" value="<?php echo $insertInfo['fname']; ?>">
                    <span class="help-inline"></span>

                </div>
            </div>
            <div class="control-group ">
                <label class="control-label" for="inputError">Second name</label>
                <div class="controls">
                    <input type="text" id="inputError" name="sname" value="<?php echo $insertInfo['sname']; ?>">

                    <span class="help-inline"></span>

                </div>
            </div>
            <div class="control-group ">
                <label class="control-label" for="inputError">Username</label>
                <div class="controls">
                    <input type="text" id="inputError" name="username" value="<?php echo $insertInfo['username']; ?>">

                    <span class="help-inline"></span>

                </div>
            </div>
            <div class="control-group ">
                <label class="control-label" for="inputError">Password</label>
                <div class="controls">
                    <input type="text" id="inputError" name="password" >
                    <span class="help-inline"></span>
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label" for="inputError">Email</label>
                <div class="controls">
                    <input type="text" id="inputError" name="email" value="<?php echo $insertInfo['email']; ?>">
                    <span class="help-inline"></span>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" name="editUser" value="Edit User" class="btn btn-primary"/>
            </div>
        </fieldset>
    </form>

</div>
<?php
require_once '/../include/footer.php';
?>
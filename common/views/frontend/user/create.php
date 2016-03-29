<?php
require_once '/../include/header.php';

?>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="col span_1_of_3">
            </div>
            <div class="col span_1_of_3">
                <div class="contact-form">
                    <h2>Register</h2>
                    <form method="post" action="">
                        <div>
                            <span><label>First name</label></span>
                            <span><input name="firstName" type="text" class="textbox" ></span>
                        </div>
                        <div>
                            <span><label>Second name</label></span>
                                <span><input name="secondName" type="text" class="textbox" ></span>
                        </div>
                        <div>
                            <span><label>Username</label></span><span></span>
                            <span><input name="username" type="text" class="textbox" ></span>
                        </div>
                       <div>
                            <span><label>Password</label></span>
                            <span><input name="password" type="password" class="textbox"></span>
                        </div>
                        <div>
                            <span><label>E-mail</label></span>
                            <span><input name="email" type="text" class="textbox"></span>
                        </div>
                        <div>
                            <span><input type="submit" name="createUser" value="Submit"  class="myButton"></span>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<?php
require_once '/../include/footer.php';
?>
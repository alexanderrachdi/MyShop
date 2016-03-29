<?php
require_once '/include/header.php';
?>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="col span_1_of_3">
            </div>
            <div class="col span_1_of_3">
                <div class="contact-form">
                    <h2>Login</h2>
                    <form method="post" action="">
                        <div>
                            <span><label>Username</label></span>
                                <span><?php if(array_key_exists('login', $errors)){
                                        echo $errors['login'];
                                    }  ?></span>
                            <span><input name="username" type="text" class="textbox" ></span>
                        </div>

                        <div>
                            <span><label>Password</label></span>
                            <span><input name="password" type="password" class="textbox"></span>
                        </div>
                        <div>
                            <span><input type="submit" value="Submit"  class="myButton"></span>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<?php
require_once '/include/footer.php';
?>
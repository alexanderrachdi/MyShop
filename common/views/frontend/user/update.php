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
                        <h2>Profil</h2>
                        <form method="post" action="">
                            <div>
                                <span><label>First name</label></span>
                                <span><input name="firstName" type="text" class="textbox" value="<?php echo $user->getFname(); ?>" ></span>
                            </div>
                            <div>
                                <span><label>Second name</label></span>
                                <span><input name="secondName" type="text" class="textbox" value="<?php echo $user->getSname(); ?>" ></span>
                            </div>
                            <div>
                                <span><label>Username</label></span><span></span>
                                <span><input name="username" type="text" class="textbox" value="<?php echo $user->getUsername(); ?>" ></span>
                            </div>
                            <div>
                                <span><label>Password</label></span>
                                <span><input name="password" type="password" class="textbox" value="<?php echo $user->getPassword(); ?>"></span>
                            </div>
                            <div>
                                <span><label>E-mail</label></span>
                                <span><input name="email" type="text" class="textbox" value="<?php echo $user->getEmail(); ?>"></span>
                            </div>
                            <div>
                                <span><input type="submit" name="updateUser" value="Update"  class="myButton"></span>
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
<?php
require_once '/../include/header.php';

?>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="col span_2_of_3">
                <div class="contact-form">
                    <h2>Contact Us</h2>
                    <form method="post" action="">
                        <div>
                            <span><label>Name</label></span>
                            <span><input name="userName" type="text" class="textbox" ></span>
                        </div>
                        <div>
                            <span><label>E-mail</label></span>
                            <span><input name="userEmail" type="text" class="textbox"></span>
                        </div>
                        <div>
                            <span><label>Phone</label></span>
                            <span><input name="userPhone" type="text" class="textbox"></span>
                        </div>
                        <div>
                            <span><label>Subject</label></span>
                            <span><textarea name="userMsg"> </textarea></span>
                        </div>
                        <div>
                            <span><input type="submit" value="Send Message" name="sendMessage"  class="myButton"></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col span_1_of_3">
                <div class="contact_info">
                    <h3>Find Us Here</h3>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d739.6644294179695!2d24.75342412928455!3d42.13621029870016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14acd1ac27f2605d%3A0xf57153e179be4ae4!2s862%2C+4000+Plovdiv%2C+Bulgaria!5e0!3m2!1sen!2sus!4v1458325315815" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="company_address">
                    <h3>My Shop</h3>
                    <p>862 Plovdiv, 4000</p>

                    <p>Bulgaria</p>
                    <p>Phone:(00) 222 666 444</p>
                    <p>Fax: (000) 000 00 00 0</p>
                    <p>Email: <span>myshop@mail.com</span></p>
                    <p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
require_once '/../include/footer.php';
?>

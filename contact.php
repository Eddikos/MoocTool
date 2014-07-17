<?php
  require("htmlPage.php");
  $page = new htmlPage();
  $page->streamTop();
?>

<!--<link href="styles.css" rel="stylesheet" type="text/css" />-->

          <div id="contact" class="section">
            <div class="container content"> 
                <div class="desc">
                  <h2>Contact Us</h2>
                  <p class="desc">Please use the contact form below.</p>
                </div>
                
                <div id="contact-form">
                  <form id="contact-us" action="contact.php" method="post">
                    <div class="formblock">
                      <label class="screen-reader-text">Name</label>
                      <input type="text" name="contactName" id="contactName" value="" class="txt requiredField" placeholder="Name:" />
                    </div>
                                
                    <div class="formblock">
                      <label class="screen-reader-text">Email</label>
                      <input type="text" name="email" id="email" value="" class="txt requiredField email" placeholder="Email:" />
                    </div>
                                
                    <div class="formblock">
                      <label class="screen-reader-text">Message</label>
                       <textarea name="comments" id="commentsText" class="txtarea requiredField" placeholder="Message:"></textarea>
                      </div>
                                
                      <button name="submit" type="submit" class="subbutton">Send us Mail!</button>
                      <input type="hidden" name="submitted" id="submitted" value="true" />
                  </form>     
                </div>
            </div>
          </div>
          <script src="js/form.js" type="text/javascript"></script>
<!-- CONTACT FORM ENDSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->

<?php
  $page->streamBottom();
?>
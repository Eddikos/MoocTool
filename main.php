<?php
  require("htmlPage2.php");
  $page = new htmlPage2();
  $page->streamTop();
?>

    <div class="row">
        <div class="col-md-12">
            <h1>#FLDigital</h1>
            <img src="worldmap.png" alt="worldmap" width="100%">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                          <li><a href="#">Report a Problem</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="#">Data Retrieved: 
<!--Time Data Retrieved Function---------------------------------------------->
                          <?php 
                          echo date(" H:i:s",time());
                          echo ("on");
                          echo date(" m/d/y",time());
                          ?>
<!--Time Data Retrieved Function---------------------------------------------->
                          </a></li>
                          <li><a href="">           
                            <span class='st_facebook_large' displayText='Facebook'></span>
                            <span class='st_twitter_large' displayText='Tweet'></span>
                            <span class='st_sina_large' displayText='Sina'></span>
                            <span class='st_googleplus_large' displayText='Google +'></span>
                            <span class='st_linkedin_large' displayText='LinkedIn'></span>
                          </li>
                        </ul>
                        </ul>
                      </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
<!-- MAIN ENDSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
<?php
  $page->streamBottom();
?>
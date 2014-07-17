<?php
  require("htmlPage.php");
  $page = new htmlPage();
  $page->streamTop();
?>

    <div class="row">
        <div class="col-md-10">
            <h2>#FLDigital</h2>
            <img src="worldmap.png" alt="worldmap" width="100%">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                          <li><a href="#">Report a Problem</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="#">Data Retrieved: 21/07/2014 at 10:00(GMT)</a></li>
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

<!-- SIDEBAR STARTSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
        <h2>Other Stuff</h2>
        <div class="col-md-2">
            <div class="row">
              <div class="col-md-12">
                      <div class="box">vis 1</div>
                      <div class="box">vis 2</div>
                      <div class="box">vis 3</div>
                      <div class="box">vis 4</div>
              </div>
            </div>
            
            <div class="row">
<!-- Begin Comments JavaScript Code -->
                <script type="text/javascript" async>function ajaxpath_53c66b71167d1(url){return window.location.href == '' ? url : url.replace('&s=','&s=' + escape(window.location.href));}(function(){document.write('<div id="fcs_div"><a title="free comment script" href="http://www.freecommentscript.com">&nbsp;&nbsp;<b>Free HTML User Comments</b>...</a></div>');fcs_53c66b71167d1=document.createElement('script');fcs_53c66b71167d1.type="text/javascript";fcs_53c66b71167d1.src=ajaxpath_53c66b71167d1("http://www.freecommentscript.com/GetComments.php?p=53c66b71167d1&s=&Width=510&FontColor=111111&BackgroundColor=FFFFFF&FontSize=11&Size=10#!53c66b71167d1");setTimeout("document.getElementById('fcs_div').appendChild(fcs_53c66b71167d1)",1);})();</script><noscript><div><a href="http://www.freecommentscript.com" title="free html user comment box"></a></div></noscript><!-- End Comments JavaScript Code --></script>
<!-- End Comments JavaScript Code -->          
            </div>
          
            <div class="row">
                <a class="twitter-timeline" href="https://twitter.com/hashtag/FLDigital" data-widget-id="489362539017289728">#FLDigital Tweets</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
        </div>
      </div>
<!-- SIDEBAR ENDSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->

<?php
  $page->streamBottom();
?>
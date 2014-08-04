<?php
    class htmlPage
    {
        protected $title="MOOC Analytics";
        
        public function setTitle($newTitle){
            $this->title=$newTitle;
            return;
        }
        
        public function streamTop(){
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo("<title>".$this->title."</title>"); ?>

<!-- Start Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<!--End Bootstrap-->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <link href="css/mooctool.css" rel="stylesheet" media="screen">                    
    <script src="//code.jquery.com/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Start Social Buttons Script -->
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "4a18f991-9e2e-4e3b-86e5-e464b95375b8", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<!--End Social Button Script-->
  </head>
  
  <body>
    <div class="row">
        <div class="col-md-12">

<!-- NAVIGATION STARTSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
          <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand"><img src="southamptonlogo.png" alt="southampton logo"></a>
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a>
                    <li><a href="contact.php">Contact Us</a>
                    <li class="dropdown">
                      <a href="" class="dropdown-toggle" data-toggle="dropdown">More<span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">MOOC</a></li>
                        <li><a href="#">Web Observatory</a></li>
                        <li><a href="#">Info</a></li>
                        <li class="divider"></li>
                        <li><a href="http://www.southampton.ac.uk/management/postgraduate/taught_courses/msc_digital_marketing.page?" target="_blank">Our Digital Marketing Course</a></li>
                        <li class="divider"></li>
                        <li><a href="http://www.southampton.ac.uk/undergraduate/courses/" target="_blank">Our Other Courses</a></li>
                      </ul>
                    </li>
                  </ul>
                  <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Log Out</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
          </nav>
      </div>
    </div>
    
<!-- NAVIGATION ENDSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
<!-- MAIN STARTSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->

<?php
        }
        
        public function streamBottom(){
?>


<!-- FOOTER STARTSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
        <div class="row">
          <div class="col-md-10">
          </div>
          <div class="col-md-2">
          </div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

     <!-- FOOTER ENDSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
  </body>
</html>

<?php
        }
    }
?>
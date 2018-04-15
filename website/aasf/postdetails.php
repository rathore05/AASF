<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BLOG | AASF</title>
    <meta name="description" content="Free Bootstrap Theme by ProBootstrap.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <style type="text/css">
    img{
    display:block;
    max-width:100%;
    height:auto;
    }
    </style>

<?php
include("config.php");
$a=$_GET['link'];
     $display = "select * from post_table where post_id='".$a."'" ;
$result = $db->query($display);
$content;
$title;
$organisers;
$image;

    while($row = $result->fetch_assoc()) {
$content=$row['post'];
$title=$row['post_title'];
$organisers=$row['organiser_name'];
$image=$row['post_image'];
}

//echo $display;
?>
 
  </head>
  <body>
    
    <!-- Fixed navbar -->
    
    <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">

          <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="../new_index.php" class="external">Home</a></li>
            <li><a href="aboutaasf.php" class="external">About us</a></li>
            <li><a href="gal.php" class="external">Gallery And Media</a></li>
            <li><a href="abhishar.php" class="external">Abhishar</a></li>
            <li><a href="posts.php" class="external">Blog</a></li>
            <li><a href="#" data-nav-section="contact">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="flexslider">
      <ul class="slides">
        <li style="background-image: url(<?php echo $image;?>)" class="overlay" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <p class="sub-heading">ABV-Indian Institute of Information Technology And Management, Gwalior</p>
                  <h1><font color="white" style=" font-size: 3.0vw;"><?php echo $title;?></font></h1>
                  <br>
                  <br>
                  <p class="sub-heading"><?php echo $organisers;?></p>
                </div>
              </div>
            </div>
          </div>
        </li>
             </ul>
    </section>

    <section class="probootstrap-section probootstrap-bg-white" >
      <div class="container">
        <div class="row">
          <div class="col-md-12  probootstrap-animate">
            <div class="probootstrap-heading dark">
              
              <span class="seperator" ><p style="text-align: center;">* * *</p></span>
            </div>
            <p style="text-align:justify;"><font color="black"><?php echo $content?></font> </p>
            
          </div>
          
        </div>
        <!-- END row -->
        <center>

 <?php echo "<a class='probootstrap-custom-link' href='../blog/index.php?link=";
  echo "".$a."'>";
  echo "Start a new discussion on this post!</a>" ?>

</center>
      </div>
    </section>


    <section class="probootstrap-footer" data-section="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-6 probootstrap-animate">
            <div class="probootstrap-footer-widget">
              <h3>Location</h3>
              <div class="row">
                <div class="col-md-4">
                  <p> AASF Cell <br> Room no. : 201 <br>Block : A</p>
                </div>
                <div class="col-md-8">
                  <p> ABV-Indian Institute of Information Technology and Management <br> Morena Link Road, Gwalior- 474015</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 probootstrap-animate">
            <div class="probootstrap-footer-widget">
              <h3>Email</h3>
              <div class="row">
                <div class="col-md-4">
                  <p>aasf.iiitmg@gmail.com </p>
                </div>

                
              </div>
            </div>
          </div>
           <div class="col-md-3 probootstrap-animate">
            <div class="probootstrap-footer-widget">
              <h3>Phone No.</h3>
              <div class="row">
                <div class="col-md-4">
                  <p>8889857636 <br>7238944661 </p>
                </div>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="probootstrap-copyright" data-section="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <p class="copyright-text">Developed by&ensp; <a target="_blank" href="https://www.linkedin.com/in/shivam-rathore-b77b1b133/"> Shivam Rathore</a> | <a target="_blank" href="https://www.linkedin.com/in/juhi-tiwari-8046ab129/">Juhi Tiwari</a></p>
          </div>
          <div class="col-md-4">
            <ul class="probootstrap-footer-social right">
              <li><a target="_blank" href="https://plus.google.com/u/0/+AbhigyanAbhikaushalam"><i class="fa fa-google-plus-square" style="font-size:24px"></i></a></li>
              <li><a target="_blank" href="https://www.facebook.com/AASFIIITM?fref=ts"><i class="fa fa-facebook-square" style="font-size:24px"></i></i></a></li>
              <li><a target="_blank" href="https://www.youtube.com/user/AASFIIITM/"><i class="fa fa-youtube-square" style="font-size:24px"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>

  </body>
</html>
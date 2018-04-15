<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BLOG | AASF</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">

        <script type="text/javascript">
function AlertIt() {
var answer = confirm ("Authorized For Admin Only!!!")
if (answer)
  var ans = confirm ("Are You Sure To Continue??..")
if(ans){
window.location="webadmin/login.php";
}
}
</script>

<?php
include("config.php");
     $display = "select * from post_table order by post_time desc";

$result = $db->query($display);
   

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

            <li><a href="../new_index.php" class="external">Home</a></li>
            <li><a href="aboutaasf.php" class="external">About us</a></li>
            <li><a href="gal.php" class="external">Gallery And Media</a></li>
            <li><a href="abhishar.php" class="external">Abhishar</a></li>
            <li><a href="#" class="external">Blog</a></li>
            <li><a href="#" data-nav-section="contact">Contact Us</a></li>
            <li><a href="profile/login.php" class="external" >Login</a></li>
            <li><a href="javascript:AlertIt();" class="external" >AdminPanel</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="flexslider" >
      <ul class="slides">
        <li style="background-image: url(img/blogback2.jpg)" class="overlay" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <p class="sub-heading"><font style=" font-size: 3.0vw;">ABV-Indian Institute of Information Technology And Management, Gwalior</font></p>
                  <h1 class="primary-heading">Strengthen</h1>
                  <h3 class="secondary-heading">Your Knowledge</h3><br>
                  <p class="sub-heading"><font style=" font-size: 2.9vw;">Abhigyan Abhikaushlam Students Forum</font></p>
                </div>
              </div>
            </div>
          </div>
        </li>
             </ul>
    </section>

    <section class="probootstrap-section">

<?php

echo "<div class=\"container\">
        <div class=\"row\">";
$cnt=0;

    while($row = $result->fetch_assoc()) {
$cnt++;

echo "<div class=\"col-md-4 col-sm-4 probootstrap-animate\" >
            <div class=\"probootstrap-block-image\"style='height: 500px;' >
              <figure><img src=\"";
              echo $row['post_image'];
              echo "\"></figure>
              <div class=\"text\">
                <span class=\"date\">";
echo $row['post_time'];
echo "</span><h3>";
echo $row['post_title'];
echo "</h3> <p>";
echo $row['organiser_name'];
echo "</p> <p class=\"\">";

echo '<a class ="probootstrap-custom-link link-sm" href="postdetails.php?link=' . $row['post_id'] . '">Read More</a>';

echo "</p>
              </div>
            </div></div>";
if($cnt==3){
  echo "</div><div class=\"row\">";

  $cnt=0;
}

}
echo "</div></section>";

 ?>


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
<?php
include("aasf/config.php");

$display = "select * from post_table order by post_time desc limit 3";
$result = $db->query($display);
if(isset($_POST["c_submit"])){
        $hostname='localhost';
        $username='root';
        $password='toor@123';
        try {
            $dbh = new PDO("mysql:host=$hostname;dbname=aasfDB",$username,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $email = $_POST["c_email"];
            $name = $_POST["c_name"];
            if(!empty($email) || !empty($name)  ){
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                 $sql = "INSERT INTO feed_back (name, email, message) VALUES ('" . $_POST["c_name"] . "','" .$_POST["c_email"] . "','" . 
                 $_POST["c_message"] . "')";
                 $result = $dbh->prepare($sql);
                 $result->execute();
                 header("Location: index.php");
                  }else{
                    echo "<script type= 'text/javascript'>alert('Enter a valid email address...');</script>";
                  }

             }else{
              echo "<script type= 'text/javascript'>alert('Name & Email Required...');</script>";
             }
          }
          catch(PDOException $e)
        {
            echo $e->getMessage();
        }

    }        

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME | AASF</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="aasf/css/styles-merged.css">
    <link rel="stylesheet" href="aasf/css/style.min.css">
    <script src="jquery.min.js"></script>
<script src="jquery.textfill.min.js"></script>

    <script type="text/javascript">
function AlertIt() {
var answer = confirm ("Authorized For Admin Only!!!")
if (answer)
  var ans = confirm ("Are You Sure To Continue??..")
if(ans){
window.location="aasf/webadmin/login.php";
}
}
</script>



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

            <li class="active"><a href="#" data-nav-section="home" >Home</a></li>
            <li><a href="#" data-nav-section="aboutaasf" >About us</a></li>
            <li><a href="#" data-nav-section="gallery" >Gallery And Media</a></li>
            <li><a href="#" data-nav-section="abhishar" >Abhishar</a></li>
            <li><a href="#" data-nav-section="blog" >Blog</a></li>
            <li><a href="#" data-nav-section="contact" >Contact Us</a></li>
            <li><a href="aasf/profile/login.php" class="external" >Login</a></li>
            <li><a href="javascript:AlertIt();" class="external" >AdminPanel</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="flexslider" data-section="home">
      <ul class="slides">
        <li style="background-image: url(aasf/img/slide1.jpg)" class="overlay" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <p class="sub-heading"><font style=" font-size: 3.0vw;">ABV-Indian Institute of Information Technology And Management, Gwalior</font></p>
                  <h1 class="primary-heading">Peer to Peer</h1>
                  <h3 class="secondary-heading">Learning</h3><br>
                  <p class="sub-heading"><font style=" font-size: 2.9vw;">Abhigyan Abhikaushlam Students Forum</font></p>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li style="background-image: url(aasf/img/slide3.jpeg)" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <p class="sub-heading"><font style=" font-size: 3.0vw;">ABV-Indian Institute of Information Technology And Management, Gwalior</font></p>
                  <h1 class="primary-heading">Knowledge</h1>
                  <h3 class="secondary-heading">Development</h3><br>
                  <p class="sub-heading"><font style=" font-size: 2.9vw;">Abhigyan Abhikaushlam Students Forum</font></p>
                </div>
              </div>
            </div>
          </div>
          
        </li>
        <li style="background-image: url(aasf/img/slide2.jpeg)" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <p class="sub-heading"><font style=" font-size: 3.0vw;">ABV-Indian Institute of Information Technology And Management, Gwalior</font></p>
                  <h1 class="primary-heading">Collaborative</h1>
                  <h3 class="secondary-heading">Personality Development</h3><br>
                  <p class="sub-heading"><font style=" font-size: 2.9vw;">Abhigyan Abhikaushlam Students Forum</font></p>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </section>

    <section class="probootstrap-section probootstrap-bg-white" data-section="aboutaasf">
      <div class="container">
        <div class="row">
          <div class="col-md-5 text-center probootstrap-animate">
            <div class="probootstrap-heading dark">
              <h1 class="primary-heading">Know</h1>
              <h3 class="secondary-heading">About Us</h3>
              <span class="seperator">* * *</span>
            </div>
            <p>Abhigyan Abhikaushalam Students’ Forum aims to construct this shoreline and helps in constructing the further path. It works to conjugate the knowledge and skills into a single bunch. Knowledge is incomplete in itself, unless it is complemented by skills. This forum aims in providing the right kind of knowledge to the students and development of skills. </p>
            <p><a href="aasf/aboutaasf.php" class="probootstrap-custom-link">About Us</a></p>
          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            <p><img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-9/307357_170883469658080_1449274212_n.jpg?oh=9bc839806dd3192b38611f32ad45fdee&oe=5AE48F50" alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive"></p>
          </div>
        </div>
        <!-- END row -->
      </div>
    </section>

    <section class="probootstrap-section-bg overlay" style="background-image: url(aasf/img/galback.jpg);" data-stellar-background-ratio="0.5" data-section="gallery">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Gallery</h2>
              <h3 class="secondary-heading">And Media</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- probootstrap-bg-white -->
    <section class="probootstrap-section">
      <div class="container">
        <div class="row">
          <div class="probootstrap-cell-retro">
            <div class="half">

              <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(aasf/img/hiq.jpg);"></div>
                <div class="text text-center">
                  <h3>hIqs</h3>
                  <p>On Windows Basics, C, OOPS, Photoshop, Web, Java, Android, Linux and many more</p>
                  <br>
                </div>
              </div>
              <div class="probootstrap-cell reverse probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(aasf/img/pc.jpg);"></div>
                <div class="text text-center">
                  <h3>Programming Contests</h3>
                  <p>Regular programming contests such as ICPC Prep, Codehub and junior PCs</p>
                  <br>
                </div>
              </div>
              <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(aasf/img/webkriti.jpg);"></div>
                <div class="text text-center">
                  <h3>Technical Events</h3>
                  <p>Such as Webkriti, Aakriti, Overnight Software Contest, PPT Contest and many more</p>
                  <br>
                  <br>
                </div>
              </div>

            </div>
            <div class="half">

              <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(aasf/img/hardware.jpg);"></div>
                <div class="text text-center">
                  <h3>Workshops</h3>
                  <p>On an equally important field of IT - Hardware</p>
                  <br><br><br>
                </div>
              </div>
              <div class="probootstrap-cell reverse probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(aasf/img/jam.jpg);"></div>
                <div class="text text-center">
                  <h3>Oratory Events</h3>
                  <p>Such as Jest A Minute, Group Discussion, Debate, Block And Tackle and many more</p>
                  <br>
                  <br>
                </div>
              </div>
              <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(aasf/img/brandaid.jpg);"></div>
                <div class="text text-center">
                  <h3>Managerial Events</h3>
                  <p>Such as Case Study, Brandaid, BIT Quiz, Sports Quiz and many more</p>
                  <br><br>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <br>
      <p align="right"><a href="aasf/gal.php" class="probootstrap-custom-link">See More</a>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</p>
    </section>

    <section class="probootstrap-section-bg overlay" style="background-image: url(aasf/img/abhisharback3.jpg);"  data-stellar-background-ratio="0.5"  data-section="abhishar">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Happy</h2>
              <h3 class="secondary-heading">Reading!</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

 <section class="probootstrap-section probootstrap-bg-white" data-section="abhishar">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading dark">
              
              <span class="seperator">* * *</span>
            </div>
            <p><b>“Abhishar”</b>, the annual magazine of AASF, contains articles by students, alumni and the institute’s faculty and serves as a medium to exchange ones thoughts and experiences. The highlights of the happenings at the institute and insight on techno- managerial topics are the baits of the magazine. </p>
            <p><a href="aasf/abhishar.php" class="probootstrap-custom-link">Read More</a></p>
          </div>
          
        <!-- END row -->
      </div>
    </section>



    <section class="probootstrap-section-bg overlay" style="background-image: url(aasf/img/blogback.jpg);"  data-stellar-background-ratio="0.5" data-section="blog">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Have a look</h2>
              <h3 class="secondary-heading">At our blog</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="probootstrap-section">
      <div class="container">
        <div class="row">

<?php
while($row = $result->fetch_assoc()){
  echo '<div class="col-md-4 col-sm-4 probootstrap-animate">
            <div class="probootstrap-block-image" style="height:500px">
              <figure><img height=260px src="';
              echo $row['post_image'];

             echo '"></figure>
              <div class="text">
                <span class="date">';
  echo $row['post_time'];
  echo '</span><h3><a href="aasf/postdetails.php?link=' . $row['post_id'] . '">';
  echo $row['post_title'];
  echo '</a></h3><p>';
  echo $row['organiser_name'];
  echo '</p>
                <p class=""><a href="aasf/postdetails.php?link=' . $row['post_id'] . '" class="probootstrap-custom-link link-sm">Read More</a></p>
              </div>
            </div>
          </div>';
}



?>

        </div>
      </div>

      <br>
      <div class="row">
        <div class="col-md-6">
          <p align="left">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
     <a href="aasf/login.php" class="probootstrap-custom-link">LOGIN: For Authors Only</a></p>
     </div>
  <div class="row">
        <div class="col-md-6">
          <p align="right">
     <a href="aasf/posts.php" class="probootstrap-custom-link">Read More</a>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</p>
     </div>
      </div>
    </section>

    <section class="probootstrap-section probootstrap-bg-white" data-section="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-5 text-center probootstrap-animate">
            <div class="probootstrap-heading dark">
              <h1 class="primary-heading">Drop Us</h1>
              <h3 class="secondary-heading">A Message</h3>
            </div>
            <span class="seperator">* * *</span>
            <p>Share with us your valuable feedback or any other queries </p>
          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            <form method="post" class="probootstrap-form">
              <div class="form-group">
                <label for="c_name">Your Name</label>
                <div class="form-field">
                  <input type="text" name="c_name" id="c_name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="c_email">Your Email</label>
                <div class="form-field">
                  <input type="text" name="c_email" id="c_email" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="c_message">Your Message</label>
                <div class="form-field">
                  <textarea name="c_message" id="c_message" cols="30" rows="10" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" name="c_submit" id="c_submit" value="Send Message" class="btn btn-primary btn-lg">
              </div>
            </form>
          </div>
        </div>
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

    <script src="aasf/js/scripts.min.js"></script>
    <script src="aasf/js/custom.min.js"></script>

  </body>
</html>
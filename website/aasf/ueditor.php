<!DOCTYPE html>

 <?php

  include("config.php");
  $a=$_GET['link'];
  //echo $a;
  $disp = "select * from post_table where post_id='".$a."'" ;
  $res = $db->query($disp);
 
  while ($r=$res->fetch_assoc()) {
    # code...
    $t= $r['post_title'];
    $img=$r['post_image'];
    $org=$r['organiser_name'];
    $txt=$r['post'];
    $catg=$r['category'];
    //echo $catg;
  }
  session_start();

  error_reporting(0);

  $user=$_SESSION['login_user'];
  $id=$_SESSION['login_id'];
 
 
  date_default_timezone_set('Asia/Kolkata');
  $date = date('m/d/Y');
  $time = date('h:i:s a');

  //echo $date;
  
  if(isset($_POST["submit"])){
    $pst=$_POST["text"];
    $date1 = date('Y-m-d H:i:s');

    $title=$_POST["title"];
    $category=$_POST["category"];
    $organiser=$_POST["org_name"];
    $img=$_POST["image"];

    if($img!=""){
      $img=$_POST["image"];
    }else{
      if($category=="Technical"){
        $img="https://prince2pm.files.wordpress.com/2011/07/technical.jpg";
      }else if($category=="Coding"){
        $img="https://assets.entrepreneur.com/content/3x2/1300/20150708172005-coding-working-workspace-apple-macintosh.jpeg";
      }else{
        $img="https://images.techhive.com/images/article/2015/02/project_leaders_skills-100567532-primary.idge.jpg";
      }
    }

    $sql = "UPDATE post_table SET post_title='" .$title. "',category='" .$category. "',organiser_name='" .$organiser. "',post_image='" .$img. "',author_id='" .$id. "',author_username='" .$user. "',post_time='" .$date1. "',post='" .$pst. "' WHERE post_id='" .$a. "'";

    $result = $db->prepare($sql);

    if($db->query($sql)==TRUE) {
      echo "<script type= 'text/javascript'>alert('Post Updated!');</script>";
      echo '<script> window.location = "postdetails.php?link=' .$a. '";</script>';

    }else{
      echo mysql_error();
    }
    
  }

?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog | AASF</title>
    <meta name="description" content="Free Bootstrap Theme by ProBootstrap.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    

  <script src="https://cdn.ckeditor.com/4.7.3/standard-all/ckeditor.js"></script>


  </head>
  <body>
    

   
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
            <li><a href="logout.php" class="external">Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="flexslider">
      <ul class="slides">
        <li style="background-image: url(img/blog_bg.jpeg)" class="overlay" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading">Welcome</h1>
                  <h3 class="secondary-heading"><?php echo $user;  ?></h3>
                  
                </div>
              </div>
            </div>
          </div>
        </li>
        
      </ul>
    </section>


    <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-12 probootstrap-animate">
            <div class="container1" id="dekho">
 
  <form action="" method="post" class="form-horizontal">
    <div class="con2">
      <div class="form-group">
      <label class="control-label col-sm-2" for="email">Post Title:</label>
      
      <div class="col-sm-10">
        <input type="text" placeholder="Post Title" name="title" value="<?php echo $t?>" required>
      </div>
    </div>
  <div class="form-group">
      <label class="control-label col-sm-2" for="email">Category:</label>
      <div class="col-sm-10">
        <table border="0">
                            <td>
                            <td>

              <?php
if($catg=="Technical"){
  echo '<input type="radio" name="category" value="Technical" checked="checked">Technical</input>';
}
else{
  echo '<input type="radio" name="category" value="Technical">Technical</input>';
}
              ?>

                                
                                <br>
                                <br>
                                <?php
if($catg=="Coding"){
  echo '<input type="radio" name="category" value="Coding" checked="checked">Coding</input>';
}
else{
  echo '<input type="radio" name="category" value="Coding">Coding</input>';
}
              ?> 

                                
                                <br>
                                <br>
                                 <?php
if($catg=="Managerial"){
  echo '<input type="radio" name="category" value="Managerial"checked="checked">Managerial</input>';
}
else{
  echo '<input type="radio" name="category" value="Managerial">Managerial</input>';
}
              ?> 
                              
                                <br>
                                <br>
                            </td>
                            </td>
                          </table>
      </div>
    </div> 

    
      <div class="form-group">
      <label class="control-label col-sm-2" for="email">Organisers:</label>
      <div class="col-sm-10">
        <input type="text" placeholder="Organiser Name" name="org_name" value="<?php echo $org?>" required>
      </div>
    </div>
      
    
      <div class="form-group">
      <label class="control-label col-sm-2" for="email">Image URL:</label>
      <div class="col-sm-10">
        <input type="text" placeholder="Image(Optional)" name="image" value="<?php echo $img?>" >
      </div>
    </div>
    
</div>

<br>
<br>
<br>
  <textarea id="editor1" name="text">
    <?php echo $txt?>
  </textarea><br>
  <p align="right">
  <input type="submit" name="submit" value="save" class="btn btn-primary btn-lg">
  </p>
</form>



<script>
  CKEDITOR.replace( 'editor1', {
      toolbar: [
      { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
      { name: 'styles', items: [ 'Styles', 'Format' ] },
      { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
      { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
      { name: 'links', items: [ 'Link', 'Unlink' ] },
      { name: 'insert', items: [ 'Image', 'EmbedSemantic', 'Table' ] },
      { name: 'tools', items: [ 'Maximize' ] },
      { name: 'editing', items: [ 'Scayt' ] }
    ],

    customConfig: '',

    
    extraPlugins: 'autoembed,embedsemantic,image2,uploadimage,uploadfile',

    removePlugins: 'image',

    // Make the editing area bigger than default.
    height: 600,

    contentsCss: [ 'https://cdn.ckeditor.com/4.7.3/standard-all/contents.css', 'mystyles.css' ],

    // This is optional, but will let us define multiple different styles for multiple editors using the same CSS file.
    bodyClass: 'article-editor',

    // Reduce the list of block elements listed in the Format dropdown to the most commonly used.
    format_tags: 'p;h1;h2;h3;pre',

    // Simplify the Image and Link dialog windows. The "Advanced" tab is not needed in most cases.
    removeDialogTabs: 'image:advanced;link:advanced',

    // Define the list of styles which should be available in the Styles dropdown list.
    // If the "class" attribute is used to style an element, make sure to define the style for the class in "mystyles.css"
    // (and on your website so that it rendered in the same way).
    // Note: by default CKEditor looks for styles.js file. Defining stylesSet inline (as below) stops CKEditor from loading
    // that file, which means one HTTP request less (and a faster startup).
    // For more information see http://docs.ckeditor.com/#!/guide/dev_styles
    stylesSet: [
      /* Inline Styles */
      { name: 'Marker',     element: 'span', attributes: { 'class': 'marker' } },
      { name: 'Cited Work',   element: 'cite' },
      { name: 'Inline Quotation', element: 'q' },

      /* Object Styles */
      {
        name: 'Special Container',
        element: 'div',
        styles: {
          padding: '5px 10px',
          background: '#eee',
          border: '1px solid #ccc'
        }
      },
      {
        name: 'Compact table',
        element: 'table',
        attributes: {
          cellpadding: '5',
          cellspacing: '0',
          border: '1',
          bordercolor: '#ccc'
        },
        styles: {
          'border-collapse': 'collapse'
        }
      },
      { name: 'Borderless Table',   element: 'table', styles: { 'border-style': 'hidden', 'background-color': '#E6E6FA' } },
      { name: 'Square Bulleted List', element: 'ul',    styles: { 'list-style-type': 'square' } },

      /* Widget Styles */
      // We use this one to style the brownie picture.
      { name: 'Illustration', type: 'widget', widget: 'image', attributes: { 'class': 'image-illustration' } },
      // Media embed
      { name: '240p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-240p' } },
      { name: '360p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-360p' } },
      { name: '480p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-480p' } },
      { name: '720p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-720p' } },
      { name: '1080p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-1080p' } }
    ]
  } );
</script>


</div>
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

    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>

  </body>
</html>
<?php

    include("config.php");
   

    error_reporting(0);

    if(isset($_POST["login"])){  
  
if(!empty($_POST['user']) && !empty($_POST['pass1'])) {  
    $user = mysqli_real_escape_string($db,$_POST['user']);
    $pass = mysqli_real_escape_string($db,$_POST['pass1']);

      $query="SELECT * FROM author WHERE username='".$user."'";  
      $result = $db->query($query);
   $numrows = mysqli_num_rows($result);  
    if($numrows>0){
$row = $result->fetch_assoc();

$db_pass = $row['password'];

if(password_verify($pass, $db_pass)){
session_start();  
$_SESSION['login_id']=$row["author_id"]; 
$_SESSION['login_usereditor']=$user;
header("Location: editor.php");
}

else {  
   //   echo "yeah";
      echo "<script type= 'text/javascript'>alert('Invalid username or password!');</script>";
    
    }  
    }
    else {  
   //   echo "yeah";
      echo "<script type= 'text/javascript'>alert('Invalid username!');</script>";
    
    }   
    
    
  
} else { 
    echo "<script type= 'text/javascript'>alert('All fields are required!');</script>";
    
}  
}  
   
   ?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Author Login | AASF</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  <link href="ckeditor/plugins/codesnippet/lib/highlight/styles/default.css" rel="stylesheet">
    <script src="ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

/* Add a right margin to each icon */

</style>
      <link rel="stylesheet" href="css/style3.css">








  
</head>

<body>
  <div class="cont">
  <div class="demo">
    <div class="login">
      <div class="login__check"></div>
      <div class="login__form">
        <form method="post" action="">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input name" placeholder="Username" name="user" />
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" class="login__input pass" placeholder="Password" name="pass1" />
        </div>

     <!--  <button type="button" class="login__submit" onclick="fun()">Sign in</button>-->
        <button class="buttonload" name="login">Login</button>
        </form>
      </div>
    </div>
   
  </div>


 <div class="app">
           <div class="app__logout">
        <svg class="app__logout-icon svg-icon" viewBox="0 0 20 20">
          <path d="M6,3 a8,8 0 1,0 8,0 M10,0 10,12"/>
        </svg>
      </div>
    </div>




  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>

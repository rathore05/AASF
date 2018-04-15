<?php
session_start();


include 'dbConfig.php';


if (isset($_POST["chg_psw"])) {
  
$sql = "UPDATE stud_details SET password='".$_POST['newPassword']."' WHERE user_name='".$_SESSION['login_user']."'";


if ($conn->query($sql) === TRUE) {
    echo "<script type= 'text/javascript'>alert('Password Changed!');</script>";
} else {
    echo "Error updating record: " . $conn->error;
}

     
}
$pic;
               $sql = "SELECT * FROM stud_details WHERE user_name ='".$_SESSION['login_user']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $pic=$row["pic"];
      
   
        
    }
}
?>


<!doctype html>
<html lang="en-gb" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/da-slider.css" />

    <link href="font/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
<script type="text/javascript">
    function loadSubmitResults() {
        $(function() {
            $('#menu1').load('index.html');
        });
    }


</script>

<style type="text/css">
    
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

   .button {

            background-color: Transparent;
            background-repeat:no-repeat;
            border: none;
            cursor:pointer;
            overflow: hidden;
            outline:none;

        }

</style>



</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand scroll-top logo"><b><?php echo $_SESSION['name'];?></b></a>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav" id="mainNav">
                        <li ><a class="scroll-link"><button id="myBtn" class="button">CHANGE PASSWORD</button></a></li>
                        <li><a class="scroll-link"><button id="myBtn2" class="button">Change PROFILE IMAGE</button></a></li>
                        <li><a href="#skills" class="scroll-link">Logout</a></li>
           
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>


        <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
    <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><b>Change Password</b></h4>
                </div>
            <div class="modal-body">
                
                    <div style="width:300px;">
                        <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
                        <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">

                         
                            <tr>
                                <td><label> New Password</label></td>
                                <td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
                            </tr>
                            <td><label> Confirm Password</label></td>
                            <td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"> </span></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                        </table>
                    </div>
               
           
        </div>
        <div class="modal-footer">
<input type="submit" name="chg_psw" value="Submit" class="btn btn-primary" >
        </div>
        </form>
    </div>
    </div>
      <div id="myModal2" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
    <form action="picUpload.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><b>Change Profile Image</b></h4>
                </div>
            <div class="modal-body">
                
                 
    <label for="file">Filename: </label>
    <input type="file" name="file" id="file"/>
    <br />
 

                    </div>
               
           
       
        <div class="modal-footer">
<input type="submit" name="submit" value="Submit" class="btn btn-primary" >
        </div>
         </div>
        </form>
    </div>
    </div>


<script>

    function validatePassword() {
        var currentPassword,newPassword,confirmPassword,output = true;

        newPassword = document.frmChange.newPassword;
        confirmPassword = document.frmChange.confirmPassword;

       
       if(!newPassword.value) {
            newPassword.focus();
            document.getElementById("newPassword").innerHTML = "required";
            output = false;
        }
        else if(!confirmPassword.value) {
            confirmPassword.focus();
            document.getElementById("confirmPassword").innerHTML = "required";
            output = false;
        }
        if(newPassword.value != confirmPassword.value) {
            newPassword.value="";
            confirmPassword.value="";
            newPassword.focus();
            alert('Passwords do not match');
            output = false;
        }
        return output;
    }
</script>
     

</div>

        <!--/.container-->
    </header>


 <div id="bigpic">
    <div id="overlay">
       
        <?php
echo '<img class="img-circle" height=300 width =300 src="';
echo 'upload/';
echo $pic;
echo '"/>';

        ?>
    </div>
    <div id="base">
        



<?php
echo '<img class ="bgblur" width=100% height= 540 src="';
echo 'upload/';
echo $pic;
echo '"/>';

        ?>
            


            <!-- http://lorempixel.com/850/280/people/9/ -->
       
    </div>
  </div>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<!-- The Modal -->


<div class="container2">

  <ul class="nav nav-pills nav-justified" >
 
    <li class="active"><a data-toggle="pill" href="#menu1"><span class="glyphicon glyphicon-th-list"></span><br>EVENTS</a></li>
    <li><a data-toggle="pill" href="#menu2"><span class="glyphicon glyphicon-user"></span><br>YOUR STATISTICS</a></li>
    <li><a data-toggle="pill" href="#menu3"><span class="glyphicon glyphicon-star"></span><br>LEADERBOARD</a></li>
  </ul>
  
  <div class="tab-content">
   
    <div id="menu1" class="tab-pane fade in active">
    <br><br><br>
<script type="text/javascript">loadSubmitResults();</script>
    </div>
    <div id="menu2" class="tab-pane fade"><br><Br><br>
      <center>
      <p>
          
<?php
               $sql = "SELECT * FROM stud_events WHERE user_name='".$_SESSION['login_user']."'";

$result = $conn->query($sql);

$score;
$tech;
$mangerial;
$oratory;

if ($result->num_rows > 0) {
    // output data of each row


    while($row = $result->fetch_assoc()) {
        $score=$row["score"];
        $tech=$row["tech"];
        $mangerial=$row["managerial"];
        $oratory=$row["literary"];
        
    }
echo " <b> TOTAL SCORE: </b>";
echo $score; 
echo "<br>";
echo "<b>TECHNICAL SCORE: </b>";
echo $tech;
echo "<br>";
echo "<b>MANAGERIAL SCORE: </b>";
echo $mangerial;
echo "<br>";
echo "<b> ORATORY AND LITERARY SCORE: </b>";
 echo $oratory;
echo "<br>";
} 


$sql2="SELECT FIND_IN_SET( score, (    
SELECT GROUP_CONCAT(DISTINCT score
ORDER BY score DESC ) 
FROM stud_events )
) AS rank
FROM stud_events
WHERE user_name = '".$_SESSION['login_user']."'";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $score=$row["rank"];
       
        
    }
}
echo " <b> CURRENT RANK: </b>";
echo $score; 
echo "<hr><b>";

$first="";
$second="";
$third="";

               $sql = "SELECT * FROM events WHERE first LIKE '%".$_SESSION['login_user']."%'";
$result = $conn->query($sql);
echo "FIRST IN:</b>";
echo "<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $first=$row["name"];
        echo $first;
        echo "<br>";
   
        
    }
}
if($first==""){
    echo "Yet to come";
}
echo "<hr><b>";
echo "SECOND IN:</b>";
echo "<br>";
               $sql = "SELECT * FROM events WHERE second LIKE '%".$_SESSION['login_user']."%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $second=$row["name"];
        echo $second;
       echo "<br>";
   
        
    }
}
if($second==""){
    echo "Yet to come";
}
echo "<hr><b>";
echo "THIRD IN:</b>";
echo "<br>";
               $sql = "SELECT * FROM events WHERE third LIKE '%".$_SESSION['login_user']."%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $third=$row["name"];
       echo $third;
   echo "<br>";
        
    }
}
if($third==""){
    echo "Yet to come";
}



              ?>


</center>


      </p>
    </div>
    <div id="menu3" class="tab-pane fade">
   
      <p>
          
              
<?php
$prev=0;
echo "<table class=\"table table-hover\"><tr><th> RANK </th><th>NAME</th><th>SCORE</th></tr>";

$sql="SELECT stud_events.user_name, stud_events.score, @prev := @curr, @curr := score, @rank := IF(@prev = @curr, @rank, @rank +1) AS rank FROM stud_events , (SELECT @curr := null, @prev := null, @rank := 0) tmp_tbl  ORDER BY stud_events.score DESC";
              // $sql = "SELECT * FROM stud_events ORDER BY score DESC LIMIT 3";
$result = $conn->query($sql);
$i=1;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     echo "<tr><td>";
     echo $row['rank'];
     //if($row['score']==$prev)
     //echo --$i;
// else echo $i;
     echo "</td><td>";
     echo '<img src="https://scontent.fbho1-1.fna.fbcdn.net/v/t1.0-9/25659599_391882027917052_6140930497815328324_n.jpg?oh=7fc95750ee7908eb9e0c4931c50143bf&oe=5AF5AD82" class="img-circle" width=70 height=70>';
     echo $row['user_name'];
     echo "</td><td>";
     echo $row['score'];
     $prev=$row['score'];
     echo "</td></tr>";
      
        $i++;
    }
    echo "</table>";
}

?>







      </p>
    </div>
  </div>
</div>
<script type="text/javascript">
    

    var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script type="text/javascript">
    

    var modal2 = document.getElementById('myModal2');

// Get the button that opens the modal
var btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close")[1];

// When the user clicks on the button, open the modal 
btn2.onclick = function() {
    modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
    modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}
</script>
    <!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]-->
    <script src="js/modernizr-latest.js"></script>
    <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.isotope.min.js" type="text/javascript"></script>
    <script src="js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="js/jquery.nav.js" type="text/javascript"></script>
    <script src="js/jquery.cslider.js" type="text/javascript"></script>
    <script src="js/custom.js" type="text/javascript"></script>
    <script src="js/owl-carousel/owl.carousel.js"></script>
</body>
</html>

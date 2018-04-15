<!DOCTYPE html>
<html>
<head>
  <title></title>

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript" src="scripts.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


<style type="text/css">
body{
  margin-top: 15px;
  margin-left: 15px;
  padding-left: 20px;
}
</style>


<script type="text/javascript">
    function loadSubmitResults() {
        $(function() {
            $('#menu1').load('index.html');
        });
    }

</script>

</head>
<body>





 <div class="row">

<div class="col-md-6" id="bla">
<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Events:</button>
  <div id="demo" class="collapse">
  <form action="importData.php" method="post" enctype="multipart/form-data" id="importFrm">
  <label for="pwd">Event Name:</label>
  <input type="text" class="form-control" name="event_name" required>
  <br>
  <label for="birthdate">Date:</label>
 <input type="text" name="birthdate" value="10/24/2017" />
 

 
<br>
  <label class="control-label" for="email">Category:</label>

        <table border="0">
                            <td>
                            <td>
                                <input type="radio" name="category" value="Technical"> Technical</input>
                                <br>
                                <br>
                              <input type="radio" name="category" value="Managerial"> Managerial </input>
                                <br>
                                <br>
                                <input type="radio" name="category" value="Oratory"> Oratory </input>
                                <br>
                                <br>
                            </td>
                            </td>
        </table>
        <br>


  <label for="pwd">Points:</label>
  <input type="text" class="form-control" name="pnt" required>
  <label for="pwd">First:</label>
  <label for="pwd">Points:</label>
  <input type="text" class="form-control" name="pnt1" required>
      <label for="pwd">Winners:</label>
  <div id="first">

  <input type="text" class="form-control" name="first[]">
  <br>
  </div>
  <br>
  <input type="button" id="more_fields" onclick="add_fields1();" value="+" />
  <br>
  <label for="pwd">Second:</label>
  <label for="pwd">Points:</label>
  <input type="text" class="form-control" name="pnt2" required>
  <label for="pwd">Winners:</label>
  <div id="second">

  <input type="text" class="form-control" name="second[]">
  <br>
  </div>
  <br>
  <input type="button" id="more_fields" onclick="add_fields2();" value="+" />
  <br>
  <label for="pwd">Third:</label>
  <label for="pwd">Points:</label>

  <input type="text" class="form-control" name="pnt3" required>
        <label for="pwd">Winners:</label>
  <div id="third">
  <input type="text" class="form-control" name="third[]">
  <br>
  </div>
  <br>
  <input type="button" id="more_fields" onclick="add_fields3();" value="+" />


      <br>
      <br>
           
       
                <input type="file" name="file" />
                <br>
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
  </div>
  


</div>

<div class="col-md-6">
  <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo3">hIQs</button>
  <div id="demo3" class="collapse">
 <form action="importData.php" method="post" enctype="multipart/form-data" id="importFrm">
 <label for="pwd">Event Name:</label>
  <input type="text" class="form-control" name="hiq_name" required>
  <br>
  <label for="birthdate">Date:</label>
 <input type="text" name="birthdate" value="10/24/2017" />
 

 
<br>
<br>
  <label class="control-label" for="email">Category:</label>

        <table border="0">
                            <td>
                            <td>
                                <input type="radio" name="category" value="Technical"> Technical</input>
                                <br>
                              
                               
                                <input type="radio" name="category" value="Managerial"> Managerial </input>
                                <br>
                                <br>
                            </td>
                            </td>
        </table><br>
  <label for="pwd">Points:</label>
  <input type="text" class="form-control" name="apnt" required>
  <label for="pwd"> Goodies Points:</label>
  <input type="text" class="form-control" name="gpnt" required>
<label>Winners:</label>
   <div id="hiq">
  <input type="text" class="form-control" name="hiqpnt[]">
  <br>
  </div>
  <br>
  <input type="button" id="more_fields" onclick="add_fieldshiq();" value="+" />

<br>
<br>
      
           
       
                <input type="file" name="file" />
                <br>
                <input type="submit" class="btn btn-primary" name="importhiqSubmit" value="IMPORT">
            </form>
  

  
</div>



 </div>


    <br><br><br><br><br><br>
   <div id="menu1" >

<script type="text/javascript">loadSubmitResults();</script>
    </div>

  </div>


  <div class="container">

  <a target="_blank" href="../email/sr.php"><button text="logout">Send Email</button></a>

  <a href="logout.php"><button text="logout">Logout</button></a>
</div>

</body>
</html>
<?php
//load the database configuration file
include 'dbConfig.php';
if(isset($_POST['importSubmit'])){


$id;
$category=$_POST["category"];
 $sql2="INSERT INTO events(name,date) VALUES('".$_POST['event_name']."','".$_POST['birthdate']."')";
    if ($conn->query($sql2) === TRUE) {
    echo "Record updated successfully";

    $sql = "SELECT id FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id=$row["id"];
        
    }


} 
}
 $myInputs = $_POST["first"];
foreach ($myInputs as $eachInput) {
    //$sql2="UPDATE stud_events SET tech= tech+'".$_POST['pnt1']."' WHERE user_name='".$eachInput."'";
   
$sql2="UPDATE events SET first=concat(first,'".$eachInput."') WHERE id='".$id."'";
    if ($conn->query($sql2) === TRUE) {
    //echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}


if($category=="Technical"){
     $sql2="UPDATE stud_events SET  tech=tech+'".$_POST['pnt1']."', score=score+ '".$_POST['pnt1']."' WHERE user_name='".$eachInput."'";
 
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
        echo "first point updated";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
if($category=="Managerial"){
     $sql2="UPDATE stud_events SET managerial= managerial+'".$_POST['pnt1']."',score=score+ '".$_POST['pnt1']."' WHERE user_name='".$eachInput."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
if($category=="Oratory"){
     $sql2="UPDATE stud_events SET literary= literary+'".$_POST['pnt1']."',score=score+ '".$_POST['pnt1']."' WHERE user_name='".$eachInput."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
    // echo $eachInput;
}
$myInputs2 = $_POST["second"];
foreach ($myInputs2 as $eachInput) {
    $sql2="UPDATE events SET second=concat(second,'".$eachInput."') WHERE id='".$id."'";
    if ($conn->query($sql2) === TRUE) {
    echo "second events updated";
} else {
    echo "Error updating record: " . $conn->error;
}



if($category=="Technical"){
     $sql2="UPDATE stud_events SET  tech=tech+'".$_POST['pnt2']."', score=score+ '".$_POST['pnt2']."' WHERE user_name='".$eachInput."'";
  
    if ($conn->query($sql2) === TRUE) {
    echo "second point updated";
    echo $_POST['pnt2'];
} else {
    echo "Error updating record: " . $conn->error;
} 
}
if($category=="Managerial"){
     $sql2="UPDATE stud_events SET managerial= managerial+'".$_POST['pnt2']."',score=score+ '".$_POST['pnt2']."' WHERE user_name='".$eachInput."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
if($category=="Oratory"){
     $sql2="UPDATE stud_events SET literary= literary+'".$_POST['pnt2']."',score=score+ '".$_POST['pnt2']."' WHERE user_name='".$eachInput."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
    
}
$myInputs3 = $_POST["third"];
foreach ($myInputs3 as $eachInput) {
    $sql2="UPDATE events SET third=concat(third,'".$eachInput."') WHERE id='".$id."'";
    if ($conn->query($sql2) === TRUE) {
  //  echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
   


if($category=="Technical"){
     $sql2="UPDATE stud_events SET  tech=tech+'".$_POST['pnt3']."', score=score+ '".$_POST['pnt3']."' WHERE user_name='".$eachInput."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
if($category=="Managerial"){
     $sql2="UPDATE stud_events SET managerial= managerial+'".$_POST['pnt3']."',score=score+ '".$_POST['pnt3']."' WHERE user_name='".$eachInput."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
if($category=="Oratory"){
     $sql2="UPDATE stud_events SET literary= literary+'".$_POST['pnt3']."',score=score+ '".$_POST['pnt3']."' WHERE user_name='".$eachInput."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
}
if($category=="Technical"){
     $sql2="UPDATE events_points SET technical_points= technical_points+'".$_POST['pnt1']."'  + '".$_POST['pnt']."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
if($category=="Managerial"){
     $sql2="UPDATE events_points SET managerial_points= managerial_points+'".$_POST['pnt1']."'  + '".$_POST['pnt']."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
if($category=="Oratory"){
     $sql2="UPDATE events_points SET oratory_points= oratory_points+'".$_POST['pnt1']."'  + '".$_POST['pnt']."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}



    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            $cnt=0;
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email
              $sql = "UPDATE stud_events SET score= score+'".$line[1]."' * '".$_POST['pnt']."' WHERE user_name='".$line[0]."'";
             
          //  $sql2="UPDATE stud_events SET score= score+'".$line[1]."' * '".$_POST['pnt']."' WHERE user_name='".$line[0]."'";
if ($conn->query($sql) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

if($line[1]==1){
    $cnt++;
}

              if($category=="Technical"){
     $sql2="UPDATE stud_events SET  tech=tech+'".$line[1]."' * '".$_POST['pnt']."'  WHERE user_name='".$line[0]."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
if($category=="Managerial"){
     $sql2="UPDATE stud_events SET managerial= managerial+'".$line[1]."' * '".$_POST['pnt']."'  WHERE user_name='".$line[0]."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}}
if($category=="Oratory"){
     $sql2="UPDATE stud_events SET literary= literary+'".$line[1]."' * '".$_POST['pnt']."'  WHERE user_name='".$line[0]."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}}

                
            }
            $sql2="UPDATE events SET attendance='".$cnt."' WHERE id='".$id."'";
    if ($conn->query($sql2) === TRUE) {
  //  echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
            
           
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}



if(isset($_POST['importhiqSubmit'])){




  /*
     $myInputs = $_POST["first"];
foreach ($myInputs as $eachInput) {
     echo $eachInput . "<br>";
}*/
    //validate whether uploaded file is a csv file

 $myInputs = $_POST["hiqpnt"];
 $category=$_POST['category'];
 $c=0;
foreach ($myInputs as $eachInput) {
    $sql2="UPDATE stud_events SET score= score+'".$_POST['gpnt']."' WHERE user_name='".$eachInput."'";
    $c++;
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}


if($category=="Technical"){
     $sql2="UPDATE stud_events SET  tech=tech+'".$_POST['gpnt']."'  WHERE user_name='".$eachInput."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
if($category=="Managerial"){
     $sql2="UPDATE stud_events SET managerial= managerial+'".$_POST['gpnt']."' WHERE user_name='".$eachInput."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}

   //  echo $eachInput;
}

if($category=="Technical"){
     $sql2="UPDATE events_points SET technical_points= technical_points+'".$_POST['gpnt']."' * $c + '".$_POST['apnt']."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
if($category=="Managerial"){
     $sql2="UPDATE events_points SET managerial_points= managerial_points+'".$_POST['gpnt']."' * $c + '".$_POST['apnt']."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}

    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            $cnt=0;
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email
              $sql = "UPDATE stud_events SET score= score+'".$line[1]."' * '".$_POST['apnt']."' WHERE user_name='".$line[0]."'";


             if($line[1]==1){
$cnt++;
             }

             //$sql2="INSERT INTO hiq(name,attendance) VALUES('".$_POST['hiq_name']."','".$cnt."')";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}


              if($category=="Technical"){
     $sql2="UPDATE stud_events SET  tech=tech+'".$line[1]."' * '".$_POST['apnt']."'  WHERE user_name='".$line[0]."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
}
if($category=="Managerial"){
     $sql2="UPDATE events_points SET managerial= managerial+'".$line[1]."' * '".$_POST['apnt']."'  WHERE user_name='".$line[0]."'";
  
    if ($conn->query($sql2) === TRUE) {
 //   echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}}

                    //insert member data into database
                   /* $db->query("INSERT INTO members (name, email, phone, created, modified, status) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[3]."','".$line[4]."')");*/
                
            }
            $sql2="INSERT INTO hiq(name,attendance,date) VALUES('".$_POST['hiq_name']."','".$cnt."','".$_POST['birthdate']."')";
if ($conn->query($sql2) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

            
            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}


//redirect to the listing page
//header("Location: index.php".$qstring);
?>
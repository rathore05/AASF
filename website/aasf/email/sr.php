<!DOCTYPE html>
<html>
	<head>
		<title>Admin | AASF</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<?php
//send_mail.php

  include("connect.php");

require 'class/class.phpmailer.php';


//if(isset($_POST["submit"]))
//{

$sql3="select * from stud_details ";

$res=$db->query($sql3);

	
	$output = '';
	//$user=' ';

	//foreach($_POST['email_data'] as $row)
	while($row=$res->fetch_assoc()){
		$username=$row["user_name"];

		$sql = "SELECT * FROM stud_events WHERE user_name='".$username."'";

$result = $db->query($sql);

while($row1=$result->fetch_assoc()){

$score=$row1["score"];
$tech=$row1["tech"];
$mangerial=$row1["managerial"];
$oratory=$row1["literary"];

$total=$tech+$mangerial+$oratory;
}

$sql2="SELECT FIND_IN_SET( score, (    
SELECT GROUP_CONCAT(DISTINCT score
ORDER BY score DESC ) 
FROM stud_events )
) AS rank
FROM stud_events
WHERE user_name='".$username."'";


$result2 = $db->query($sql2);

    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
       $rank=$row2["rank"];
       
        
    }

    echo $rank;

$message = "
<html>
<head>
<style>
th, td {
   
    border: 1px solid black;
    border-collapse: collapse;
}
table {
    width: 100%;
    border: 0px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
    text-align: left;    
}
</style>
</head>
<body>

<h2>Your Ward Report:</h2>
<table >
  <tr>
    <th>Technical Score:</th>
    <td>$tech</td>
  </tr>
  <tr>
    <th>Managerial Score</th>
    <td>$mangerial</td>
  </tr>
  <tr>
    <th>Oratory Score</th>
    <td>$oratory</td>
  </tr>  
  <tr>
    <th>Your Total Score</th>
    <td>$total</td>
  </tr>
  <tr>
    <th>Complete Total Score</th>
    <td>$score</td>
  </tr>
  <tr>
    <th>Current Rank</th>
    <td>$rank</td>
  </tr>  


</table>

<br><br>

</body>
</html>

";


		$mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '465';								//Sets the default SMTP server port
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'rathoreshivam904@gmail.com';					//Sets SMTP username
		$mail->Password = 'shivam123!@#';					//Sets SMTP password
		$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = 'rathoreshivam904@gmail.com';			//Sets the From email address for the message
		$mail->FromName = 'Abhigyan Abhikaushalam';					//Sets the From name of the message
		$mail->AddAddress($row["parent_email"], $row["display_name"]);	//Adds a "To" address
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
								//Sets message type to HTML
		$mail->Subject = 'Progress Report'; //Sets the Subject of the message
		//An HTML or plain text message body
		//$text=$row["info"];
		//echo $text;
		$mail->Body=$message;
		//echo $mail->Body;


		$mail->AltBody = '';
		$mail->IsHTML(true);	

		$result = $mail->Send();     //Send an Email. Return true on success or false on error

		if (!$result) {
									# code...
			echo "Message cant be send";
		}						
		if($result["code"] == '400')
		{
			$output .= html_entity_decode($result['full_error']);
		}

	
	if($output == '')
	{
		echo 'ok';
	}
	else
	{
		echo $output;
	}
		$mail->clearAllRecipients();
	}




?>

	</head>
	<body>


</body>
</html>
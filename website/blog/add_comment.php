<?php
 
require("config.php");
require("helper.php");
 
if (isset($_POST)) {
error_reporting(0);
    $parent_id = ($_POST['reply_id'] == NULL || $_POST['reply_id'] == '') ? 0 : $_POST['reply_id'];
    $email = $_POST['comment_email'];
    $name = $_POST['comment_name'];
    session_start();
    $a=$_SESSION['li'];
   // echo $a;
    $comment_text = $_POST['comment_text'];
    $depth_level = $_POST['depth_level'];
    $sql = "INSERT INTO comment(post_id,comment_text, parent_id, ip_address, email_address, created_by) VALUES('".$a."','$comment_text', $parent_id, '" . $_SERVER['REMOTE_ADDR'] . "', '$email', '$name')";
   // sendmail('shivamrathore307@gmail.com', 'Shivam', 'Shivam Commented on post', 'I have a doubt');
    $query = dbQuery($sql);
    $inserted_id = dbInsertId();
    $sql = "SELECT * FROM comment WHERE post_id ='".$a."' AND comment_id=" . $inserted_id;
    $results = dbQuery($sql);
    if ($results) {
        while ($row = dbFetchAssoc($results)) {
            if ($depth_level < 3) {
                $reply_link = "<a href=\"#\" class=\"reply_button\" id=\"{$row['comment_id']}\">reply</a><br/>";
            } else {
                $reply_link = '';
            }
            $depth = $depth_level + 1;
            $name = strlen($row['created_by']) ? $row['created_by'] : 'anonymous user';
            echo "<li id=\"li_comment_{$row['comment_id']}\" data-depth-level=\"{$depth}\">" .
            "<div style='background-color:#FFA500;'><span class=\"commenter\">{$name} says</span>&nbsp;<span class=\"comment_date\">,  {$row['created_date']}</span></div>" .
            "<div style=\"margin-top:4px;\">{$row['comment_text']}</div>" .
            $reply_link . "</li>";
        }
        echo '<div class="success">Comment successfully posted</div>';
    } else {
        echo '<div class="error">Error in adding comment</div>';
    }

} else {
    echo '<div class="error">Please enter required fields</div>';
}

/*function sendmail($to_email,$name,  $subj, $msg){




		$mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '465';								//Sets the default SMTP server port
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'rathoreshivam904@gmail.com';					//Sets SMTP username
		$mail->Password = 'shivam123!@#';					//Sets SMTP password
		$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = 'rathoreshivam904@gmail.com';			//Sets the From email address for the message
		$mail->FromName = 'Shivam Rathore';					//Sets the From name of the message
		$mail->AddAddress($to_email, $name);	//Adds a "To" address
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
								//Sets message type to HTML
		$mail->Subject = $subj; //Sets the Subject of the message
		//An HTML or plain text message body
		//$text=$row["info"];
		//echo $text;
		$mail->Body=$msg;
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


}*/
?>

<?php

session_start();


include 'dbConfig.php';
    if((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    && ($_FILES["file"]["size"] < 50000)))

    {
        $doc_path = realpath(dirname(__FILE__));
        $upload_dir = "/upload";
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return code: " . $_FILES["file"]["error"] . "<br/>";
        }
        else
        {
           

            if(file_exists("upload/" . $_FILES["file"]["name"]))
            {
                                move_uploaded_file($_FILES["file"]["tmp_name"],
                $doc_path.$upload_dir.'/'. $_FILES["file"]["name"]);
        
                $sql = "UPDATE stud_details SET pic='".$_FILES["file"]["name"]."' WHERE user_name='".$_SESSION['login_user']."'";


if ($conn->query($sql) === TRUE) {
    echo "<script type= 'text/javascript'>alert('Password Changed!');</script>";
} else {
    echo "Error updating record: " . $conn->error;
}
            }
            else
            {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                $doc_path.$upload_dir.'/'. $_FILES["file"]["name"]);
           
                $sql = "UPDATE stud_details SET pic='".$_FILES["file"]["name"]."' WHERE user_name='".$_SESSION['login_user']."'";


if ($conn->query($sql) === TRUE) {
    echo "<script type= 'text/javascript'>alert('Password Changed!');</script>";

} else {
    echo "Error updating record: " . $conn->error;
}
            }
         }
     }
    else
     {
         echo "Invalid file!";
     }
       header('Location:profile.php');
?>
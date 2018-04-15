<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comments</title>
        <link rel="stylesheet" href="comments.css">
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery-ui-1.10.3-custom.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.js"></script>
        <script src="js/jquery.blockUI.js"></script>
        <script src="comments_blog.js"></script>
<style type="text/css">
    #comment_form_wrapper{
background-color: #FFA500;
    }

</style>
    </head>
    <body>
        <?php
        error_reporting(0);
        session_start();
        $b=$_GET['link'];
        $_SESSION['li']=$b;
        
        class links{
            public static $a;
          //  $a=$_GET['link'];
        }
       links::$a=$_GET['link'];
       require("comments.php");
      
        ?>
        <div style="width: 1200px;">
            <div id="comment_wrapper" >
                <div id="comment_form_wrapper" style="">
                    <div id="comment_resp"></div>
                    <h4>Post a comment!<a href="javascript:void(0);" id="cancel-comment-reply-link">Cancel Reply</a></h4>
                    <form id="comment_form" name="comment_form" action="" method="post">
                        <div>
                            Name<input type="text" name="comment_name" id="comment_name" size="54"/>
                        </div>
                        <div>
                            Email<input type="text" name="comment_email" id="comment_email" size="54"/>
                        </div>
                        <div>
                            <input type="text" name="comment_web" id="comment_web" size="54" style="display: none"   />
                        </div>
                        <div>
                            Comment<textarea name="comment_text" id="comment_text" rows="6"></textarea>
                        </div>
                        <div>
                            <input type="hidden" name="reply_id" id="reply_id" value=""/>
                            <input type="hidden" name="depth_level" id="depth_level" value=""/>
                            <input type="submit" name="comment_submit" id="comment_submit" value="Post Comment" class="button" style="background-color:     #FFA500;border-color: #fff; height: 40px;" />
                        </div>
                    </form>
                </div>
                <?php
                echo $comments;
                

                ?>
            </div>
        </div>
    </body>
</html>
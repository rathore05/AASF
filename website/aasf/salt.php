<!DOCTYPE html>
<html>
<head>
    <?php

      if(isset($_POST["password"])){
     
        $psw=$_POST["psw"];
        $hashAndSalt = password_hash($psw, PASSWORD_BCRYPT);

      }

    ?>
    
</head>

<body>
    <div class="container">
        <form method="post" action="">
            <input type="text" placeholder="Type Password" name="psw" required>
<br><br>
            <input type="submit" name="password" id="submit" value="Convert">
<br><br>
            <?php
              echo $hashAndSalt;
            ?>

            
        </form>
    </div>
</body>
</html>
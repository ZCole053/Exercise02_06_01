<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PostGuest</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
<!-- title -->
<h1>Guest sign up</h1>
    <?php
        if(isset($_POST['submit'])){
            $fName = stripslashes($_POST['fName']);
            $lName = stripslashes($_POST['lName']);
            $email = stripslashes($_POST['email']);
            $fName = str_replace(";",":",$fName);
            $lName = str_replace(";",":",$lName);
            $email = str_replace(";",":",$email);
            $messageRecord =  "$fName;$lName;$email\n";
            if(file_exists("Guest.txt") && filesize("Guest.txt") > 0){
                $guestArray = file("Guest.txt");
                $count = count($guestArray);
                for ($i=0; $i < $count ; $i++) { 
                    $msg = explode(";",$guestArray[$i]);
                   $getFName[]= $msg[0];
                   $getLName[] = $msg[1];
                }
            }
            $filehandle = fopen("Guest.txt", "ab");
            if(!$filehandle){
                echo "Error: Could not append to the file.\n";
            }else{
                fwrite($filehandle,$messageRecord);
                fclose($filehandle);
                echo "Your spot has been made\n";
                $fName = "";
                $lName = "";
                $email = "";
            }
        }else{
            $fName = "";
            $lName = "";
            $email = "";
        }
    ?>
    <!-- form -->
    <form action="PostGuest.php" method="post">
    <span> First Name:<input type="text" name="fName" value="<?php echo $fName; ?>" ></span><br>
    <span> Last Name:<input type="text" name="lName" value="<?php echo $lName; ?>"></span><br>
    <span> Email Address:<input type="text" name="email" value="<?php echo $email; ?>"></span><br>
    <input type="reset" name="reset" value="Reset Form">
    <input type="submit" name="submit" value"Post Guest">
    </form>
    <hr>
    <p>
        Please Click here to <a href="GuestBook.php">view Guest Book</a>.
    </p>
</body>
</html>
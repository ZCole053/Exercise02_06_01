<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Post New Message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <?php
    //entry did we get in with a submit
    if(isset($_POST['submit'])){
        $subject = stripslashes($_POST['subject']);
        $name = stripslashes($_POST['name']);
        $message = stripslashes($_POST['message']);
        $subject = str_replace("~","-",$subject);//replaces character
        $name = str_replace("~","-",$name);
        $message = str_replace("~","-",$message);
        $existingSubjects = array();
        //if the file exist function
        if(file_exists("messages.txt") && filesize("messages.txt") > 0){
            $messageArray = file("messages.txt");
            //counts the amount in the array
            $count = count($messageArray);
            //loops through and puts the subject into a seperate array
            for($i = 0;$i < $count; $i++){
                $currMsg = explode("~", $messageArray[$i]);
                //subject array
                $existingSubjects[] = $currMsg[0];
            }
        }
        //checks for a certain value in the array
        if(in_array($subject,$existingSubjects)){
            //displays error message
            echo "<p>The subject <em>\"$subject\"</em> you entered already exist!<br>\n";
            echo "Please enter a new subject and try again<br>\n";
            echo "Your message was not saved.<p>\n";
        }else{
            $messageRecord =  "$subject~$name~$message\n";//delimitated data
            $filehandle = fopen("messages.txt", "ab");//opens file and appends in binary
            //if file handle open
            if (!$filehandle){
                //error message
                echo "There was an error saving your message!\n";
             }else{
                //writes to the text file
                fwrite($filehandle, $messageRecord);
                fclose($filehandle);
                echo "Your message has been saved.\n";
        } 
     }


    }
    ?>
    <h1>Post New Message</h1>
    <hr>
    <form action="PostMessage.php" method="post">
        <span style="font-weight:bold">Subject: <input type="text" name="subject"></span>
        <span style="font-weight:bold">Name: <input type="text" name="name"></span><br>
        <textarea name="message" cols="80" rows="6" style="margin: 10px 5px 5px"></textarea> <br>
        <input type="reset" name="reset" value="Reset Form">
        <input type="submit" name="submit" value"Post Message">
    </form>
    <hr>
    <p>
        <a href="MessageBoard.php">View Message</a>
    </p>
</body>

</html>
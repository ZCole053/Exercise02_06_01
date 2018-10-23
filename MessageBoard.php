<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Message Board</title>
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
<h1>Message Board</h1>
<?php
if (isset($_GET['action'])){
    if(file_exists("messages.txt") || filesize("messages.txt") != 0){ 
        //opens the file
        $messageArray = file("messages.txt");
        switch($_GET['action']){
            case 'Delete First':
                //function to delete the first thing in an array
                array_shift($messageArray);
                break;
            case 'Delete Last':
                //function to delete the last thing in an array
                array_pop($messageArray);
                break;
            case 'Delete Message':
            if(isset($_GET['message'])){
                array_splice($messageArray, $_GET['message'],1);
            // $index = $_GET['message'];
            // unset($messageArray[$index]);
            // $messageArray = array_values($messageArray);
            }
                break;
            case 'Remove Duplicates':
                $messageArray = array_unique($messageArray);
                $messageArray = array_values($messageArray);
                break;
        //checks to see if there is anything in the array
        }if(count($messageArray) > 0){
            $newMessages = implode($messageArray);
            $filehandle = fopen("messages.txt", "wb");
            // if the file was written too yay if not
            if(!$filehandle){
                echo "There was an error updating the message file.\n";
            }else{
                fwrite($filehandle, $newMessages);
                fclose($filehandle);
            }
            echo "There are remaining messages in the array.<br>";//debug
        }else{
            //function to uncreate the file
            unlink("messages.txt");
        } 
    }
}
//interperator will short circut
if(!file_exists("messages.txt") || filesize("messages.txt") == 0){
    echo "<p>There are no messages posted</p>\n";
}else{
    //file array
    $messageArray = file("messages.txt");
    echo "<table style=\"background-color:lightgrey\" border=\"1\" width=\"100%\">\n";
    $count = count($messageArray);
    //associative array
    for($i=0 ; $i < $count; $i++){
        $currMsg = explode("~",$messageArray[$i]);
        $keMessageArray[$currMsg[0]] = $currMsg[1] . "~". $currMsg[2];

    }
    $index = 1;
    $key = key($key);
    foreach($keMessageArray as $message) { 
        $currMsg = explode("~",$message);
        echo "<tr>\n";
        echo "<td width =\"5%\" style=\"text-align:center; font-weight:bold\">". $index . "</td>\n";
        echo "<td width=\"85%\"><span style=\"font-weight: bold\">Subject: </span>" . htmlentities($key) . "<br>\n";
        echo "<span style=\"font-weight: bold\">Name: </span>" . htmlentities($currMsg[0]) . "<br>\n";
        echo "<span style=\"text-decoration: underline; font-weight: bold\">Message: </span><br>\n" . htmlentities($currMsg[1]) . "</td>\n";
        echo "<td width=\"10%\" style=\"text-align:center\">". "<a href='MessageBoard.php?". "action=Delete%20Message&". "message=". ($index-1). "'>" . "Delete this Message</a></td>";
        echo "</tr>\n";
        ++$index;
        next($keMessageArray);
        $key = key($keMessageArray);
    }
    echo "</table>\n";
}

?>
<p>
<a href="PostMessage.php">Post New Message </a><br>
<!-- query string passes data as name value pair -->
<a href="MessageBoard.php?action=Delete%20First">Delete first Message</a><br>
<a href="MessageBoard.php?action=Delete%20Last">Delete Last Message</a><br>
<a href="MessageBoard.php?action=Remove%20Duplicates">Remove duplicates</a><br>
</p>

</body>

</html>
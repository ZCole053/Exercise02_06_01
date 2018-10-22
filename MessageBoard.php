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
                //checks to see if there is anything in the array
        }if(count($messageArray) > 0){
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
    for ($i=0; $i < $count; $i++) { 
        $currMsg = explode("~",$messageArray[$i]);
        echo "<tr>\n";
        echo "<td width =\"5%\" style=\"text-align:center; font-weight:bold\">". ($i + 1) . "</td>\n";
        echo "<td width=\"95%\"><span style=\"font-weight: bold\">Subject: </span>" . htmlentities($currMsg[0]) . "<br>\n";
        echo "<span style=\"font-weight: bold\">Name: </span>" . htmlentities($currMsg[1]) . "<br>\n";
        echo "<span style=\"text-decoration: underline; font-weight: bold\">Message: </span><br>\n" . htmlentities($currMsg[2]) . "</td>\n";
        echo "</tr>\n";
    }
    echo "</table>\n";
}

?>
<p>
<a href="PostMessage.php">Post New Message </a><br>
<!-- query string passes data as name value pair -->
<a href="MessageBoard.php?action=Delete%20First">Delete first Message</a>
</p>

</body>

</html>
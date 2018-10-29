<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Guest Book</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>Guest Book</h2>
    <?php

if(isset($_GET['action'])){
    $guestArray= file("Guest.txt");
    switch($_GET['action']){
        case 'Delete First':
            array_shift($guestArray);
            break;
        case 'Delete Last':
            array_pop($guestArray);
            break;
        case 'Sort Ascending':
            sort($guestArray);
            break;
        case 'Sort Decending':
            rsort($guestArray);
            break;
            
    }if(count($guestArray) > 0){
        $newMessages = implode($guestArray);
        $filehandle = fopen("Guest.txt", "wb");
        if(!$filehandle){
            echo "There was an error updating the message file.\n";
        }else{
            fwrite($filehandle, $newMessages);
            fclose($filehandle);
        }
    }
}

    $filehandle = fopen("Guest.txt", "rb" );
    //success
    if(file_exists("Guest.txt")){
        $displayArray = file("Guest.txt");
        echo "<table style=\"background-color:lightgrey\" border=\"1\" width=\"50%\">\n"; 
        $count = count($displayArray); 
        for ($i=0; $i < $count; $i++) {  
            $currMsg = explode(";",$displayArray[$i]); 
            echo "<tr>\n"; 
            echo "<td width=\"10%\" style=\"text-align:center\">". ($i +1). "</td>\n";
            echo "<td width=\"90%\"><span>First Name:</span>".htmlentities($currMsg[0]). "<br>\n"; 
            echo "<span>Last Name: </span>" . htmlentities($currMsg[1]) . "<br>\n"; 
            echo "<span>E-mail: </span>" . htmlentities($currMsg[2]) . "</td>\n"; 
            echo "<td width=\"10%\" style=\"text-align:center\">". "<a href='GuestBook.php?". "action=Delete%20Message'>Delete this Message</a></td>";
            echo "</tr>\n"; 
        }
        echo "</table>\n"; 
    //fail  
    }else{
        echo "Error: File doesn't exist";
    }
    fclose($filehandle);
    ?>

    <p>
    
    <a href="PostGuest.php"><button href="PostGuest.php">Back to Sign up</button></a> <br>
    <a href="GuestBook.php?action=Sort%20Ascending"><button href="GuestBook.php">Sort Subject A-Z</button></a><br>
    <a href="GuestBook.php?action=Sort%20Decending"><button href="GuestBook.php">Sort Subject Z-A</button></a><br>
    <a href="GuestBook.php?action=Delete%20First"><button href="GuestBook.php">Delete first Message</button></a><br>
    <a href="GuestBook.php?action=Delete%20Last"><button href="GuestBook.php">Delete Last Message</button></a><br>
    </p>

    <?php

    ?>
</body>
</html>